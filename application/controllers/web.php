<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Web extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Profil_model'); 		
		$this->load->helper('url');
        $this->load->library('session');
		$this->load->library('form_validation');

     }
 
	public function index(){		
		$data['judul'] = "Home";
		$this->load->view('template/v_header',$data);
		$this->load->view('home/v_home',$data);
		$this->load->view('template/v_footer',$data);
	}
	public function index_upload(){		
		$data['judul'] = "Profil User";
		
		$data['query'] = $this->Profil_model->get_profil(); //query dari model
		$this->load->view('template/v_header',$data);
		$this->load->view('profil/v_profil',$data);
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
		
		$data['query'] = $this->Profil_model->get_profil(); //query dari model
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
		$data['judul'] = "Pendaftaran Permohonan Diklat";
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
	public function insert_upload(){
		//var_dump("cek");
		

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('email','E-mail','required');
		$this->form_validation->set_rules('nomorhp','Nomor HP','required');
		if ($this->form_validation->run() == FALSE)
		{
			 $this->session->set_flashdata('error_msg', 'Mohon lengkapi isian.');
		  redirect('web/index_upload');
		}
		else
		{
			$dnama=$this->input->post('nama');
			$dumur=$this->input->post('umur');
			$dalamat=$this->input->post('alamat');
			$demail=$this->input->post('email');
			$dno_mobile=$this->input->post('nomorhp');
			$this->load->library('upload');
			$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './assets/uploads/'; //path folder
			//$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['allowed_types'] = '*';
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['max_width']  = '1288'; //lebar maksimum 1288 px
			$config['max_height']  = '768'; //tinggi maksimu 768 px
			$config['file_name'] = $nmfile; //nama yang terupload nantinya
	 
			$this->upload->initialize($config);
			 
			if($_FILES['ktp']['name'])
			{
				if ($this->upload->do_upload('ktp'))
				{
					$gbr = $this->upload->data();
					$dktp=$gbr['file_name'];
					$data1= array(
					'dktp' => $dktp,
					'dnama' => $this->input->post('nama'),
					'dumur' => $this->input->post('umur'),
					'dalamat' => $this->input->post('alamat'),
					'demail' => $this->input->post('email'),
					'dno_mobile' => $this->input->post('nomorhp')
					);
					//$this->mupload->get_insert($data); //akses model untuk menyimpan ke database
					//pesan yang muncul jika berhasil diupload pada session flashdata
					$data['query'] = $this->Profil_model->get_profil(); //query dari model
					$this->Profil_model->edit_profil($data1);
					$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
					redirect('web/index_upload'); //jika berhasil maka akan ditampilkan view vupload
				}
				
					
				}else{
					//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
					$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
					redirect('web/index_upload'); //jika gagal maka akan ditampilkan form upload
				}
		}
	 
		

    }
}
?>