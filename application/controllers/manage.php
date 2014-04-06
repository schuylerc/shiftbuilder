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
		$this->load->model('jobs_model');
		$data['jobs'] = $this->jobs_model->get_all_jobs();
		$this->beginView();
		$this->load->view('manage/jobs', $data);
		$this->endView();
	}
	public function new_job(){
		
	}
	public function edit_job(){
		
	}
	public function shifts(){
		$data['shifts'] = $this->shifts_model->get_all_shifts();
		$this->beginView();
		$this->load->view('manage/shifts', $data);
		$this->endView();
	}
	public function schedules(){
		$data['number_unsched'] = count($this->shifts_model->get_needed_shifts());
		$this->beginView();
		$this->load->view('manage/schedules', $data);
		$this->endView();
	}
	
}