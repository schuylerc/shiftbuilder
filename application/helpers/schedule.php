<?php	

	/**
	* $this->users_model->get_user_avail($user->id);	returns the availability of a specified user
														the formatting for that is an array of 7 integers(one for each day) that I can convert to binary like we discussed
	* $this->users_model->get_eligible_users($shift->job_type);	returns an array of all users eligible for the specified job_type.
	* 
	* 
	* $this->shifts_model->get_all_shifts();	return an array of all shifts that need to be filled(shift table)
	* $this->shifts_model->update_taken_by($shift->id, $user->id);	update a particular shift in the database as taken by a particular user
	* $this->shifts_model->get_taken_shifts($user->id) return an array of all the shifts that the specified user already has taken
	*/
		
function genSchedule(){
	/**
	 * itterate through each shift
	 * 	find out who is available for given shift that can work the job type
	 * 	pick the person that prefers the given shift that is furthest from there hours per week preference
	 * 	after the person is selected for the shift, mark the shift as taken in the database by the given person
	 */
	
	$shifts = $this->shifts_model->get_all_shifts();

	foreach($shifts as $shift){
		$usersAvail = $this->whoisAvail($shift); 
		$bestCanidate = $this->bestCanidate($shift, $usersAvail);
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

function isAvail($user){
	/**
	 * returns true if the user is available for the shift, false otherwise
	 * 
	 * take the start and end times of a shift, and return an integer that represents the availability in binary
	 * take the two long integers and BITAND them together, if the result is exactly the same as the shift availability, then the user is available for that shift.
	 * also check to see if the user already has shifts that can conflict
	 * 
	**/
	
	
}

?>