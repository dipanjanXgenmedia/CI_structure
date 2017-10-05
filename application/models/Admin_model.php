<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Admin_model extends MY_Model
{
	
	protected $_table_name='admin';
	function __construct()
	{
		parent::__construct();
	}

	public function login() {
            $user = $this->get_by(
				array(
					'email'=>$this->input->post('email'),
					'password'=>$this->hash($this->input->post('password')),
                    'is_active'=>'Y',
					'is_delete'=>'N'
					),TRUE);
            if(count($user)){
			// create session array
				$data_session = array(
					 'id'=>$user->id,
					 'name'=>$user->name,
					 'email'=>$user->email,
					 'phone'=>$user->phone,
					 'loggedin'=>TRUE
				);
			// set session veriable
				$this->session->set_userdata($data_session);
				$this->fetch_rights($user->id, $user->group_id);
		}
	}

	public function logout() {
		$this->session->sess_destroy(); 
	}

	public function loggedin(){
		return (bool) $this->session->userdata('loggedin');
	}

	public function hash($string) {
		return hash('sha512',$string.config_item('encryption_key'));
	}

	
}