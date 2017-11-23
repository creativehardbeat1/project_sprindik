<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Web extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
 
	public function index(){		
		$data['judul'] = "Home";
		$this->load->view('template/v_header',$data);
		$this->load->view('home/v_home',$data);
		$this->load->view('template/v_footer',$data);
	}
 
	public function about(){		
		$data['judul'] = "About";
		$this->load->view('template/v_header',$data);
		$this->load->view('about/v_about',$data);
		$this->load->view('template/v_footer',$data);	}
	public function pengguna(){		
		$data['judul'] = "Daftar Pengguna";
		$this->load->view('template/v_header',$data);
		$this->load->view('user/v_user',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function pegawai(){		
		$data['judul'] = "Referensi Pegawai";
		$this->load->view('template/v_header',$data);
		$this->load->view('pegawai/v_pegawai',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function profil(){		
		$data['judul'] = "Profil User";
		$this->load->view('template/v_header',$data);
		$this->load->view('profil/v_profil',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function calon_peserta(){		
		$data['judul'] = "Daftar Calon Peserta";
		$this->load->view('template/v_header',$data);
		$this->load->view('calon_peserta/v_calon_peserta',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function diklat(){		
		$data['judul'] = "Referensi Diklat";
		$this->load->view('template/v_header',$data);
		$this->load->view('diklat/v_diklat',$data);
		$this->load->view('template/v_footer',$data);
	}
	
	public function permohonan_diklat(){		
		$data['judul'] = "Daftar Permohonan Diklat";
		$this->load->view('template/v_header',$data);
		$this->load->view('diklat/v_permohonan_diklat',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function persetujuan_dokumen(){		
		$data['judul'] = "Daftar Persetujuan Dokumen";
		$this->load->view('template/v_header',$data);
		$this->load->view('persetujuan/v_persetujuan_dokumen',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function persetujuan_peserta(){		
		$data['judul'] = "Daftar Persetujuan Peserta ";
		$this->load->view('template/v_header',$data);
		$this->load->view('persetujuan/v_persetujuan_peserta',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function peserta(){		
		$data['judul'] = "Daftar Peserta";
		$this->load->view('template/v_header',$data);
		$this->load->view('peserta/v_peserta',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function peserta_diklat(){		
		$data['judul'] = "Daftar Peserta Diklat";
		$this->load->view('template/v_header',$data);
		$this->load->view('peserta_diklat/v_peserta_diklat',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function laporan_diklat(){		
		$data['judul'] = "Laporan Diklat";
		$this->load->view('template/v_header',$data);
		$this->load->view('laporan/v_laporan_diklat',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function person(){		
		$data['judul'] = "Referensi Pegawai";
		$this->load->view('template/v_header',$data);
		$this->load->view('person/v_person',$data);
		$this->load->view('template/v_footer',$data);
	}
}
?>