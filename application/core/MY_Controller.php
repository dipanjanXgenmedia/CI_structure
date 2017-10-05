<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data =array();

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model("admin_model");
		$this->data['site_name'] ="BlueMason";
		$this->data['site_title'] ="BlueMason | Admin";

		/****** Pagination Start ************/
		$this->data['paginationTotalRecord'] = 10;
		$this->data['paginationStart'] = 0;
		//====== Login Check =================
				// creare an array
					 $exception_uri =array(
					 	    'admin',
					 		'admin/login',
					 		'admin/login/logout',
					 		);
				 // if uri is not present in this array
					 if(in_array(uri_string(),$exception_uri) == FALSE) {
					 	     // if user is not loged in
							 if($this->admin_model->loggedin()==FALSE) {
							 	// rediredt to login page
							 	redirect('admin/login','refresh');
							 }
							 
					 }
	}

}


include_once APPPATH."/libraries/Frontend_Lib.php";