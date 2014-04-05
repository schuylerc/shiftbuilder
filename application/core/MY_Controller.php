<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * My Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 */
class MY_Controller extends CI_Controller {

public function __construct()
{
	parent::__construct();

}

/**
*
* initalize the main theme
* 
* @access public
*
*/
public function beginView(){
	//TODO - load header items
	$data['user'] = $this->ion_auth->user()->row();
	$this->load->view('templates/header', $data);
}

/**
*
* End the theme
*
* @access public
*
*/
public function endView(){
	//TODO - load Footer items
	$this->load->view('templates/footer');
}

/**
*
* Check to see if the user is logged in
*
* @access public
*
*/
public function checkLogin(){
	//make sure the user is logged in, otherwise send them to the login screen
	if (!$this->ion_auth->logged_in()){
			//redirect user to the login and attach attempted page
			redirect('auth/login/'.uri_string());
		}

}
/**
*	display the error 404 page (in case it needs to be called independently)
*	function can be overloaded by controller if needed
*	
*	@access public
*
*/
public function e404(){
	//set header
	$this->output->set_status_header('404', 'Not Found');
	//TODO - display 404 error page

}
}
