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
	public function pengguna(){		
		$data['judul'] = "Referensi Pengguna";
		$this->load->view('template/v_header',$data);
		$this->load->view('user/v_user',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function person(){		
		$data['judul'] = "Referensi Pegawai";
		$this->load->view('template/v_header',$data);
		$this->load->view('person/v_person',$data);
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
		$data['judul'] = "Halaman Diklat";
		$this->load->view('template/v_header',$data);
		$this->load->view('diklat/v_diklat',$data);
		$this->load->view('template/v_footer',$data);
	}
	
	public function permohonan_diklat(){		
		$data['judul'] = "Halaman Permohonan Diklat";
		$this->load->view('template/v_header',$data);
		$this->load->view('diklat/v_permohonan_diklat',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function persetujuan_dokumen(){		
		$data['judul'] = "Halaman Pengguna";
		$this->load->view('template/v_header',$data);
		$this->load->view('persetujuan/v_persetujuan_dokumen',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function persetujuan_peserta(){		
		$data['judul'] = "Halaman Pegawai";
		$this->load->view('template/v_header',$data);
		$this->load->view('persetujuan/v_persetujuan_peserta',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function peserta(){		
		$data['judul'] = "Halaman Peserta";
		$this->load->view('template/v_header',$data);
		$this->load->view('peserta/v_peserta',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function peserta_diklat(){		
		$data['judul'] = "Halaman Peserta";
		$this->load->view('template/v_header',$data);
		$this->load->view('peserta/v_peserta_diklat',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function laporan_diklat(){		
		$data['judul'] = "Halaman Peserta";
		$this->load->view('template/v_header',$data);
		$this->load->view('laporan/v_laporan_diklat',$data);
		$this->load->view('template/v_footer',$data);
	}
}
?>