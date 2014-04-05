<?php	
	//$this->users_model->get_all_users();	//return an array of all the users
	//$this->users_model->get_user_jobs($userID);	//return an array of all the eligable jobs that a specific user can do
	//$this->users_model->get_user_avail($userID);	//returns the availability of a user
													//the formatting for that is an array of 7 integers(one for each day) that I can convert to binary
	
	//$this->shifts_model->get_all_shifts();	//return an array of all shifts that need to be filled
	//$this->shifts_model->update_taken_by($shiftID, $userID);	//update a particular shift in the database as taken by a particular user
	//$this->shifts_model->get_job_type($shiftID); //returns the job type of a given shift
		
function genSchedule(){
	$users = $this->users_model->get_all_users();
	$shifts = $this->shifts_model->get_all_shifts();
	//itterate through each shift
		//find out who is available for given shift that can work the job type(function for that)
		//pick the person that prefers the given shift that is furthest from there hours per week preference
		//after the person is selected for the shift, mark the shift as taken in the database by the given person
	foreach($shifts as $shift){
		//itterate through each shift
		$usersAvail = $this->whoisAvail($shift, $users); 
		$bestCanidate = $this->bestCanidate($shift, $usersAvail);
	}
}

function whoisAvail($shift, $users){
	//returns a list of the people available to work a given shift
	//takes into account there ability to work a certain job
	$jobtype = $this->shifts_model->get_job_type($shift->id);
	$usersAvail = array();
	foreach($users as $user){
		if(isEligable($jobtype, $user)){
			if(isAvail($user)){
				//add the user to $usersAvail
			}
		}
	}
}

function bestCanidate($shift, $users){
	//returns a user that is the best canidate for the shift
	
}

function isEligable($jobtype, $user){
	//returns true if the person is eligable to take a certain job, false otherwise
	foreach()
}

function isAvail($user){
	//returns true if the user is available for the shift, false otherwise
}

?>