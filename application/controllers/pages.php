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


}