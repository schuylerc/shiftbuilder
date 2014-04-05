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


}