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
		$config = array(
        		array(
		                'field' => 'email',
		                'label' => 'Email',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'pass',
		                'label' => 'Password',
		                'rules' => 'required',
		        )
		);

		$this->form_validation->set_rules($config);
		if($this->form_validation->run()) {
			$this->admin_model->login(); // Admin Model already loded in MY_Controller
			if(!$this->admin_model->loggedin()){
				redirect("admin/dashboard");
			}
		}

		
		$this->data['subview'] = "admin/login/index";
		$this->load->view('admin/__layout_login',$this->data);
	}
}