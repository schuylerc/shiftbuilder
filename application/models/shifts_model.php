<?php

class shifts_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}
		
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
	
	/**
	 * return an array of shifts that are filled and ready to go
	 * 
	 * @access public
	 * @author Schuyler Cumbie
	 * @return list of shifts that are ready to go
	 */
	public function get_completed_shifts(){
		$query = $this->db->get_where('shifts', array('taken' => 1));
		return $query->result_object();
	}
	/**
	 * get all of the shifts
	 * @access public
	 * @author Schuyler Cumbie
	 * @return result object
	 */
	public function get_all_shifts(){
		$query = $this->db->get('shifts');
		return $query->result_object();
	}
	
	/**
	 * update a particular shift in the database as taken by a particular user
	 * 
	 * @param id of shift $shift_id
	 * @param if of user $user_id
	 * @return success boolean
	 * @access public
	 * @author Schuyer Cumbie
	 */
	public function update_taken_by($shift_id, $user_id){
		$this->db->update('shifts', array('taken_by' => $user_id), array('id' => $shift_id));
		return true;
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