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
		$data['user'] = $user;
		//if changes need to be saved
		if(sizeof($_POST)!=0){
			$this->users_model->update_user_avail($user->id, $_POST['sun_start'], $_POST['mon_start'], $_POST['tue_start'], $_POST['wed_start'], $_POST['thu_start'], $_POST['fri_start'], $_POST['sat_start'], $_POST['sun_stop'], $_POST['mon_stop'], $_POST['tue_stop'], $_POST['wed_stop'], $_POST['thu_stop'], $_POST['fri_stop'], $_POST['sat_stop']);
			$data['msg'] = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Changes</strong> have been saved</div>';
			
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
	public function test_text(){
		$people = array(
			'+14127351721' => 'sun 1430-1630',
			'+15712457874' => 'sun 1430-1630'
		);
		$this->load->model('text_model');
		$this->text_model->send_job_opening($people);
	}


}