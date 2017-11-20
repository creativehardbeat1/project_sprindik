<?php

class Auth extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('auth_model');
        $this->load->library('session');
		$this->load->library('form_validation');

}

public function index()
{
//$this->load->view("index.php");
}

public function register_user(){
	$this->form_validation->set_rules('user_name', 'Username', 'required|min_length[4]|max_length[15]');
	$this->form_validation->set_rules('user_password', 'Password', 'required');
	if ($this->form_validation->run() == TRUE) {
		$user=array(
      'username'=>$this->input->post('user_name'),
	  'password'=>md5($this->input->post('user_password')),
      'email'=>$this->input->post('user_email'),
      'no_mobile'=>$this->input->post('user_mobile')
        );
		
		
        print_r($user);
		$nama_check=$this->auth_model->nama_check($user['username']);
		$email_check=$this->auth_model->email_check($user['email']);
		if($nama_check&&$email_check){
		  $this->auth_model->register_user($user);
		  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
		  redirect('Welcome/login_view');
		}else{
			
		  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
		  redirect('Welcome/login_view');
		}
		
	} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('Auth');
	}



 
}

}

?>
