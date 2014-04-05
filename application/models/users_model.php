<?php

class users_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}
	
	
	public function get_all_users(){
		$query = $this->db->get('users');
		return $query->result_object();
	}
	
	public function get_eligible_users($job_type_id){
		//initiate call
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('jobs_users', 'jobs_users.user_id = users.id', 'right');
		$this->db->where('job_id', $job_type_id);
		$query = $this->db->get();
		return $query->result_array();
	}

}