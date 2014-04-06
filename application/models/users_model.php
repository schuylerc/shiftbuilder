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
	
	public function update_user_with_post($user_id, $first_name, $last_name, $phone, $email, $get_email, $get_texts, $pref_time_1, $pref_time_2, $pref_time_3, $pref_time_4){
		$update = array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'get_texts' => $get_texts,
				'phone' => $phone,
				'get_emails' => $get_email,
				'email' => $email,
				'pref_time_1' => $pref_time_1,
				'pref_time_2' => $pref_time_2,
				'pref_time_3' => $pref_time_3,
				'pref_time_4' => $pref_time_4
				
		);
		
		$this->db->where('id', $user_id);
		$this->db->update('users', $update);
	}

}