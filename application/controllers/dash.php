<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dash extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

		//$this->checkLogin();
	}
	
	public function index(){
		$this->checkLogin();
		$this->beginView();

		$this->load->view('dash');

		$this->endView();
	
	}
	public function test_database(){
		//users
		$this->load->model('users_model');
		$users = $this->users_model->get_all_users();
		echo "<pre>";
		echo var_dump($users);
		echo "</pre>";
		//jobs
		
		//avail
	}


}