<?php	

	/**
	* $this->users_model->get_eligible_users($shift->job_type);	returns an array of all users eligible for the specified job_type.
	* 
	* $this->shifts_model->get_needed_shifts();	return an array of all shifts that need to be filled(shift table)
	* $this->shifts_model->update_taken_by($shift->id, $user->id);	update a particular shift in the database as taken by a particular user
	* $this->shifts_model->get_taken_shifts($user->id) return an array of all the shifts that the specified user already has taken
	* 
	* NEW FUNCTIONS I ADDED SINCE I LAST PUSHED
	* $this->shifts_model->get_completed_shifts(); return an array of shifts that are filled and ready to go(I need this to print the schedule)
	* 
	*/
		
function genSchedule(){
	/**
	 * itterate through each shift
	 * 	find out who is available for given shift that can work the job type
	 * 	pick the person that prefers the given shift that is furthest from there hours per week preference
	 * 	after the person is selected for the shift, mark the shift as taken in the database by the given person
	 */
	
	$shifts = $this->shifts_model->get_needed_shifts();

	foreach($shifts as $shift){
		$usersAvail = $this->whoisAvail($shift); 
		$bestCanidate = $this->bestCanidate($shift, $usersAvail);
		$this->shifts_model->update_taken_by($shift->id, $bestCanidate->id);
	}
}

function whoisAvail($shift){
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

function bestCanidate($shift, $users){
	/**
	 * returns a user that is the best canidate for the shift
	**/
}

function isAvail($shift, $user){
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
				$userAvail = $user->sun_availability;
				break;
			case 'mon':
				$userAvail = $user->mon_availability;
				break;
			case 'tue':
				$userAvail = $user->tue_availability;
				break;
			case 'wed':
				$userAvail = $user->wed_availability;
				break;
			case 'thu':
				$userAvail = $user->thu_availability;
				break;
			case 'fri':
				$userAvail = $user->fri_availability;
				break;
			case 'sat':
				$userAvail = $user->sat_availability;
				break;
			}
		if($userAvail & $shiftAvail == $shiftAvail){
			return true;
		}
	}
	return false;
}

function createBinary($start_time, $end_time){
	//convert the start and end times to an integer that represents a long binary number, return that number
	//construct the middle part with all the 1's
	
	//calculate how many 1's we need and create a string
	if(end_time == 0){
		$repeat = ((2400-$start_time)/100) * 4;
	}
	else{
		$repeat = (($end_time-$start_time)/100) * 4;
	}
	$string1 = str_repeat("1",$repeat);
	
	//calculate how many 0's we need
	$repeat = (2400 - $end_time) / 100;
	$string0 = str_repeat("0",$repeat);
	
	//combine the two strings
	$binary_value = $string1 . $string0;
	
	return bindec($binary_value);
}

function noConflict($user, $shift){
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
	
function printSchedule(){
	//this will take the list of shifts and print them all out.
	
	$shifts = $this->shifts_model->get_completed_shifts();
}

}

?>