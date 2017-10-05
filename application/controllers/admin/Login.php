<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Login extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Check Form Validation
		if(count($_POST)) {
			redirect("admin/dashboard");
		}

		
		$this->data['subview'] = "admin/login/index";
		$this->load->view('admin/__layout_login',$this->data);
	}
}