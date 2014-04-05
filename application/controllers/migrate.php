<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->library('migration');
		if ( ! $this->migration->current()){
			show_error($this->migration->error_string());
		}
		else{
			echo "The databse is up to date!";
		}
	}
}