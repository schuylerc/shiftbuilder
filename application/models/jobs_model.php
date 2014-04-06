<?php

class jobs_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}
		
	public function get_all_jobs(){
		$query = $this->db->get('job_types');
		return $query->result_object();
	}
}