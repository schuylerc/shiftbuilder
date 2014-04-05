<?php

class users_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}
	
	
	public function get_all_users(){
		$query = $this->db->get_where('users');
		return $query->result_object();
	}
	
	public function get_eligible_users($job_type_id){
		//TODO - FINISH THIS
		//initiate call
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('jobs', 'survey_surveys.owner_id = users.id');
		$this->db->where('survey_surveys.org_id', $this->user->org_id);
		$this->db->where('trash', '0');
		$query = $this->db->get();
		return $query->result_array();
	}

}