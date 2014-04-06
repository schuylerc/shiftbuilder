<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dash extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->checkLogin();
		
	}
	
	public function index(){
		//user info
		$user = $this->ion_auth->user()->row();
		//get all shifts
		$data['complete_shifts'] = $this->shifts_model->get_completed_shifts();
		$data['needed_shifts'] = $this->shifts_model->get_needed_shifts();
		//other vars
			//$data['stuff'] = "cool";
			//$data['stuff2'] = "cool";
		
		//begins the nav
		$this->beginView();
		//loads the other page and injects the data
		$this->load->view('dash', $data);
		//footer
		$this->endView();
	
	}
	public function prefs(){
		$user = $this->ion_auth->user()->row();
		//if changes need to be saved
		if(sizeof($_POST)!=0){
			//initiate save
			$this->users_model->update_user_with_post($user->id, $_POST['first_name'], $_POST['last_name'], $_POST['phone_number'], $_POST['email_address'], $_POST['get_email'], $_POST['get_texts'], $_POST['pref_time_1'], $_POST['pref_time_2'], $_POST['pref_time_3'], $_POST['pref_time_4'], $_POST['max_hours']);
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
		//get user data
		$user = $this->ion_auth->user()->row();
		//if changes need to be saved
		if(sizeof($_POST)!=0){
			//$mon_avail = calc th
			$data['msg'] = "Your availability has been updated";
			$this->users_model->update_user_avail($user->id, $sun_availability_start, $mon_availability_start, $tue_availability_start, $wed_availability_start, $thu_availability_start, $fri_availability_start, $sat_availability_start, $sun_availability_stop, $mon_availability_stop, $tue_availability_stop, $wed_availability_stop, $thu_availability_stop, $fri_availability_stop, $sat_availability_stop);
		}
		else{
			$data['msg'] = "";
		}
	//always load page		
		$this->beginView();
		$this->load->view('dash/avail', $data);
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