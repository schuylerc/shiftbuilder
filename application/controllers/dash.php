<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dash extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->checkLogin();
		
	}
	
	public function index(){
		
		$this->beginView();

		$this->load->view('dash');

		$this->endView();
	
	}
	public function prefs(){
		$user = $this->ion_auth->user()->row();
		//if changes need to be saved
		if(sizeof($_POST)!=0){
			//initiate save
			$this->users_model->update_user_with_post($user->id, $_POST['first_name'], $_POST['last_name'], $_POST['phone_number'], $_POST['email_address'], $_POST['get_email'], $_POST['get_texts'], $_POST['pref_time_1'], $_POST['pref_time_2'], $_POST['pref_time_3'], $_POST['pref_time_4']);
			$data['msg'] = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Changes</strong> have been saved</div>';
		}

		else{
			$data['msg'] = "";
		}
		
		
		$this->beginView();
		$this->load->view('dash/prefs', $data);
		$this->endView();
	}
	public function avail(){
		$this->beginView();
		$this->load->view('dash/avail');
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
	public function test_job_users($job_id){
		$this->load->model('users_model');
		$users = $this->users_model->get_eligible_users($job_id);
		echo "<pre>";
		echo var_dump($users);
		echo "</pre>";
	}


}