<?php

class shifts_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}
	
	// $this->shifts_model->get_all_shifts();	
	/**
	 * return an array of all shifts that need to be filled(shift table)
	 * @return result object
	 * @access public
	 * @author Schuyler Cumbie
	 */
	public function get_needed_shifts(){
		$query = $this->db->get_where('shifts', array('taken' => 0));
		return $query->result_object();
	}
	
	public function get_all_shifts(){
		$query = $this->db->get_where('users');
		return $query->result_object();
	}
	
	/**
	 * update a particular shift in the database as taken by a particular user
	 * 
	 * @param id of shift $shift_id
	 * @param if of user $user_id
	 * @return result object
	 * @access public
	 * @author Schuyer Cumbie
	 */
	public function update_taken_by($shift_id, $user_id){
		
	}
	
	/**
	 * return an array of all the shifts that the specified user already has taken
	 * 
	 * @param user id of user $user_id
	 * @return result object
	 * @author Schuyler Cumbie
	 * @access public
	 */
	public function get_taken_shifts($user_id){
		$query = $this->db->get_where('shifts', array('taken_by' => $user_id));
		return $query->result_object();
	}
}