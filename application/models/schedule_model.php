<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class schedule_model extends CI_Model
{

	public function __construct()
	{
		//$this->load->database();
	}

	/**
	* $this->users_model->get_eligible_users($shift->job_type);	returns an array of all users eligible for the specified job_type.
	* 
	* $this->shifts_model->get_needed_shifts();	return an array of all shifts that need to be filled(shift table)
	* $this->shifts_model->update_taken_by($shift->id, $user->id);	update a particular shift in the database as taken by a particular user
	* $this->shifts_model->get_taken_shifts($user->id) return an array of all the shifts that the specified user already has taken
	* 
	* $this->shifts_model->get_completed_shifts(); return an array of shifts that are filled and ready to go(I need this to print the schedule)
	* 
	* $this->users_model->add_scheduled_hours($shift_length, $user->id);	//add the given int from the given user's hours_scheduled
	* 
	*/
		
public function genSchedule($shifts){
	/**
	 * itterate through each shift
	 * 	find out who is available for given shift that can work the job type
	 * 	pick the person that prefers the given shift that is furthest from there hours per week preference
	 * 	after the person is selected for the shift, mark the shift as taken in the database by the given person
	 */

	foreach($shifts as $shift){
		$usersAvail = $this->whoisAvail($shift); 
		$bestCanidate = $this->bestCanidate($shift, $usersAvail);
		$this->shifts_model->update_taken_by($shift->id, $bestCanidate->id);
	}
}

public function whoisAvail($shift){
	/**
	 * returns a list of the people available to work a given shift
	 * takes into account there ability to work a certain job
	**/
	$usersEligible = $this->shifts_model->get_eligible_users($shift->job_type);
	$usersAvail = array();
	foreach($usersEligible as $user){
		if(isAvail($shift, $user)){
			$usersAvail[] = $user;
		}
	}
	
	return usersAvail;
}

public function bestCanidate($shift, $users){
	/**
	 * returns a user that is the best canidate for the shift
	**/
	$end_time = $shift->end_time;
	if ($end_time == 0){
		$end_time = 2400;
	}
	$shift_length = floor(((($end_time - $shift->start_time)/100) * 4) + .99)/4;	//how long the shift is in hours
	$shift = get_shift_type($shift); 	//what type the shift is, ie morning/afternoon
	
	//$sorted_users = scheduled_hours_sort($users);	//get the sorted list
	$users_points = array();
	foreach($users as $user) {
		//figure out the users preference for the shift
		//figure out how many hours this person has to be scheduled before meeting max
		$userpref = get_user_preference($user, $shift_type);
		$user_hours_left = ($user->max_hours - $user->hours_scheduled);
		$users_points[] = $user_hours_left/(.5*$userpref);
	}
	$index = array_search(max($array), $array);
	$this->users_model->add_hours_scheduled($shift_length, $users[index]->id);	
	return $users[index];
}

public function isAvail($shift, $user){
	/**
	 * returns true if the user is available for the shift, false otherwise
	 * 
	 * take the start and end times of a shift, and return an integer that represents the availability in binary
	 * take the two long integers and BITAND them together, if the result is exactly the same as the shift availability, then the user is available for that shift.
	 * also check to see if the user already has shifts that can conflict
	 * 
	**/
	
	$shiftAvail = createBinary($shift->start_time, $shift->end_time);
	if (noConflict($user, $shiftAvail)){
		switch ($shift->day) {
			case 'sun':
				$userAvail = createBinary($user->sun_availability_start, $user->sun_availability_stop);
				break;
			case 'mon':
				$userAvail = createBinary($user->mon_availability_start, $user->mon_availability_stop);
				break;
			case 'tue':
				$userAvail = createBinary($user->tue_availability_start, $user->tue_availability_stop);
				break;
			case 'wed':
				$userAvail = createBinary($user->wed_availability_start, $user->wed_availability_stop);
				break;
			case 'thu':
				$userAvail = createBinary($user->thu_availability_start, $user->thu_availability_stop);
				break;
			case 'fri':
				$userAvail = createBinary($user->fri_availability_start, $user->fri_availability_stop);
				break;
			case 'sat':
				$userAvail = createBinary($user->sat_availability_start, $user->sat_availability_stop);
				break;
			}
		if($userAvail & $shiftAvail == $shiftAvail){
			return true;
		}
	}
	return false;
}

public function createBinary($start_time, $end_time){
	//convert the start and end times to an integer that represents a long binary number, return that number
	//construct the middle part with all the 1's
	
	//calculate how many 1's we need and create a string
	if($end_time == 0){
		$repeat = floor((((2400-$start_time)/100) * 4)+.99);
	}
	else{
		$repeat = floor(((($end_time-$start_time)/100) * 4)+.99);
	}
	$string1 = str_repeat("1",$repeat);
	
	//calculate how many 0's we need
	if ($end_time != 0){
		$repeat = floor((((2400 - $end_time) / 100)* 4)+.99);
		$string0 = str_repeat("0",$repeat);
	}
	else{
		$string0 = "";
	}
	
	//combine the two strings
	$binary_value = $string1 . $string0;
	
	echo $binary_value;
	return bindec($binary_value);
}

public function noConflict($user, $shift){
	//returns true if there is no conflict with other shifts the user has, also, no double shifts
	$shift_start_time = $shift->start_time;
	$shift_end_time = $shift->end_time;
	$shift_binary = createBinary($shift_start_time, $shift_end_time);
	$user_shifts_taken = $this->shifts_model->get_taken_shifts($user->id);
	foreach ($user_shifts_taken as $taken_shift){
		$taken_start_time = $taken_shift->start_time;
		$taken_end_time = $taken_shift->end_time;
		$taken_binary = createBinary($shift_start_time, $shift_end_time);
		if($taken_binary & $shift_binary != 0){
			return false;
		}
		if ($shift->day == $taken_shift->day) {
			return false;
		}
	}
	return true;

/*
function scheduled_hours_sort($users){
	//returns a sorted list of users based on their scheduled hours, the most hours goes first
		//echo $users;
	usort($users, 'sortByHoursRemaining');
		//echo $users;
	return $users;
}

function sortByHoursRemaining($a, $b) {
	$a_hours_remain = ($a->max_hours - $a->hours_scheduled);
	$b_hours_remain = ($b->max_hours - $b->hours_scheduled);
	if ($a_hours_remain == $b_hours_remain){return 0;}
	if($a_hours_remain > $b_hours_remain){return 1;}
	if($a_hours_remain < $b_hours_remain){return -1;}
}
*/

public function get_shift_type($shift){
	//return the type of shift the shift is
	$start_time = $shift->start_time;
	$end_time = $shift->end_time;
	if ($start_time > 1800) {
		return "night";
	}
	if ($start_time > 1200) {
		return "evening";
	}
	if ($start_time >= 600) {
		return "morning";
	}
	if ($start_time >= 0) {
		return "graveyard";
	}

}

public function get_user_preference($user, $shift_type){
	//returns the integer that is the number representing the user preference
	//1 means highly preferred, 4 means hated
	switch ($shift_type) {
		case 'graveyard':
			$pref = 1;
			break;
		case 'morning':
			$pref = 2;
			break;
		case 'evening':
			$pref = 3;
 			break;
		case 'night':
			$pref = 4;
			break;
	}
	
	if(($user->pref_time_1) == $pref) {
		return 1;
	}
	if(($user->pref_time_2) == $pref) {
		return 2;
	}
	if(($user->pref_time_3) == $pref) {
		return 3;
	}
	if(($user->pref_time_4) == $pref) {
		return 4;
	}
	
	
}

}

?>