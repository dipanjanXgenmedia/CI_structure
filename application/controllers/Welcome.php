<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Frontend_Lib {

	
	public function index()
	{



		
			//$this->load->view('welcome_message');
			$this->data['subview'] = "welcome/index";
			$this->load->view('__layout_main',$this->data);
	}
}
