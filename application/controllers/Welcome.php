<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->model('auth_model');
		$this->load->library('session');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login_register');
	}
	
	public function register_user(){

	    $user=array(
	    'user_name'=>$this->input->post('username'),
	    'user_email'=>$this->input->post('email'),
	   'user_password'=>md5($this->input->post('password')),
	   'user_mobile'=>$this->input->post('no_mobile')
		);
		print_r($user);

		$email_check=$this->auth_model->email_check($user['email']);

		if($email_check){
		  $this->auth_model->register_user($user);
		  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
		  redirect('Welcome/login_view');
		}else{
		  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
		  redirect('Welcome');
		}
	}

	public function login_view(){
		$this->load->view('login_register');
	}

	function login_user(){
	  $user_login=array(
	  'user_name'=>$this->input->post('form-username'),
	  'user_password'=>md5($this->input->post('form-password'))
		);
		$data=$this->auth_model->login_user($user_login['user_name'],$user_login['user_password']);
		
		  if($data){

			$this->session->set_userdata('id_user',$data->id_user);

			$this->session->set_userdata('user_email',$data->email);
			$this->session->set_userdata('user_name',$data->username);
			$this->session->set_userdata('user_mobile',$data->no_mobile);
			$xq=$this->session->set_userdata('id_user',$data->id_user);
			$this->load->view('template/v_header');
		  }else{
			$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
			$this->load->view('login_register');
			
		  }
	}

	function user_profile(){
		$this->load->view('dashboard1');
	}
	public function user_logout(){
	  $this->session->sess_destroy();
	  redirect('Welcome', 'refresh');
	}
}
