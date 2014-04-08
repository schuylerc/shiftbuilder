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
	public function accept(){
		$shift = $this->shifts_model->get_requested_shift();
		$shift = $shift[0];
		//send response to both people and update the shift
		//text main person
		send_shift_taken(array($this->user_model->get_user_data($shift->taken_by)));
		//respond to other person
		$this->load->view('response');
		//update db
		$this->shifts_model->unmark_shift_coverage_request($shift->id);
	}


}