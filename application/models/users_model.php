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
	
	public function add_scheduled_hours($num_hours, $user_id){
		$query = $this->db->get_where('users', array('id' => $user_id));
		$user = $query->row();
		$update = array('hours_scheduled' => $user->hours_scheduled + $num_hours);
		$this->db->where('id', $user_id);
		$this->db->update('users', $update);
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
	
	public function update_user_avail($user_id, $sun_start, $mon_start, $tue_start, $wed_start, $thu_start, $fri_start, $sat_start, $sun_stop, $mon_stop, $tue_stop, $wed_stop, $thu_stop, $fri_stop, $sat_stop){
		$update = array(
				'sun_availability_start' => $sun,
				'mon_availability_start' => $mon,
				'tue_availability_start' => $tue,
				'wed_availability_start' => $wed,
				'thu_availability_start' => $thu,
				'fri_availability_start' => $fri,
				'sat_availability_start' => $sat,
				'sun_availability_stop' => $sun,
				'mon_availability_stop' => $mon,
				'tue_availability_stop' => $tue,
				'wed_availability_stop' => $wed,
				'thu_availability_stop' => $thu,
				'fri_availability_stop' => $fri,
				'sat_availability_stop' => $sat
		);
		$this->db->where('id', $user_id);
		$this->db->update('users', $update);
	}

}