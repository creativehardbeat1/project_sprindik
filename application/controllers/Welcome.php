<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Auth_model');
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
	
	
	public function login_view(){
		$this->load->view('login_register');
	}

	function login_user(){
	  $user_login=array(
	  'user_name'=>$this->input->post('form-username'),
	  'user_password'=>md5($this->input->post('form-password'))
		);
		$data=$this->Auth_model->login_user($user_login['user_name'],$user_login['user_password']);
		
		  if($data){

			$this->session->set_userdata('id_user',$data->id_user);

			$this->session->set_userdata('user_email',$data->email);
			$this->session->set_userdata('user_name',$data->username);
			$this->session->set_userdata('user_mobile',$data->no_mobile);
			$this->session->set_userdata('user_status',$data->status);
			$this->load->view('template/v_header');
			//$this->load->view('home/v_home');
		  }else{
			$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
			$this->load->view('login_register');
			
		  }
	}

	
	public function user_logout(){
	  $this->session->sess_destroy();
	  redirect('Welcome', 'refresh');
	}
}
