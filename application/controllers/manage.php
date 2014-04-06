<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->checkLogin();
		
	}
	
	public function index(){
		
		$this->beginView();
		echo "<p>Please select an option from the menu above.</p>";
		$this->endView();
	
	}
	public function employees(){
		$data['users'] = $this->users_model->get_all_users();
		$this->beginView();
		$this->load->view('manage/employees', $data);
		$this->endView();
	}
	public function jobs(){
		$this->beginView();
		$this->load->view('manage/jobs');
		$this->endView();
	}
	public function shifts(){
		$this->beginView();
		$this->load->view('manage/shifts');
		$this->endView();
	}
	public function schedules(){
		$this->beginView();
		$this->load->view('manage/schedules');
		$this->endView();
	}
	
}