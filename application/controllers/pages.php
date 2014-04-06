<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

	}
	
	public function index(){
		$this->home();
	}
	public function home(){
		$this->load->view('pages/home');
	}
	public function request_access(){
		$this->load->model('users_model');
		$this->users_model->request_access($_POST['email']);
		$data['message'] = "Request has been sent";
		$this->load->view('auth/login', $data);
	}


}