<?php

class users_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}
	
	//$this->users_model->get_all_users();	//return an array of all the users
	//$this->users_model->get_user_jobs($userID);	//return an array of all the eligable jobs that a specific user can do
	//$this->users_model->get_user_avail($userID);	//returns the availability of a user
	//the formatting for that is an array of 7 integers(one for each day) that I can convert to binary
	
	public function get_all_users(){
		$query = $this->db->get_where('users');
		return $query->result_object();
	}
	

}