<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Web extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
 
	public function index(){		
		$data['judul'] = "Halaman depan";
		$this->load->view('template/v_header',$data);
		$this->load->view('v_index',$data);
		$this->load->view('template/v_footer',$data);
	}
 
	public function about(){		
		$data['judul'] = "Halaman about";
		$this->load->view('template/v_header',$data);
		$this->load->view('v_about',$data);
		$this->load->view('template/v_footer',$data);	}
	public function person(){		
		$data['judul'] = "Halaman Pegawai";
		$this->load->view('template/v_header',$data);
		$this->load->view('person/v_person',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function pengguna(){		
		$data['judul'] = "Halaman Pengguna";
		$this->load->view('template/v_header',$data);
		$this->load->view('user/v_user',$data);
		$this->load->view('template/v_footer',$data);
	}
}
?>