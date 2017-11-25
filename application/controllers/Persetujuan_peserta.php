<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persetujuan_peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Auth_model','peserta');
		$this->load->model('user_diklat_model','udiklat');
		$this->load->model('calon_peserta_model','calon_peserta');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('persetujuan/v_persetujuan_peserta');
	}

	public function ajax_list()
	{
		$list = $this->udiklat->get_datatables_persetujuan_b();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $udiklat) {
			$no++;
			$row = array();
			$row[] = $udiklat->nama;
			$row[] = $udiklat->umur;
			// $row[] = $udiklat->alamat;
			// $row[] = $udiklat->email;
			// $row[] = $udiklat->url_dok_ktp;
			$row[] = '<a href="http://localhost/project_sprindik/assets/uploads/'.$udiklat->url_dok_ktp.'"><i class="glyphicon glyphicon-pencil"></i>KTP</a>';			
			// $row[] = $udiklat->url_dok_ijazah;
			$row[] = $udiklat->no_mobile;
			$row[] = $udiklat->keterangan;
			// $row[] = $udiklat->tgl_mulai;
			// $row[] = $udiklat->tgl_selesai;
			$row[] = $udiklat->status_diklat;
			// $row[] = $udiklat->status_permohonan;

			//add html for action
			$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Persetujuan" onclick="edit_persetujuan_peserta('."'".$udiklat->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Persetujuan</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->udiklat->count_all(),
						"recordsFiltered" => $this->udiklat->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->udiklat->get_by_id($id);
		echo json_encode($data);
	}

	// public function ajax_add()
	// {
	// 	$data = array(
	// 			'id_user' => $this->input->post('id_user'),
	// 			'id_diklat' => $this->input->post('id_diklat'),
	// 			'status' => $this->input->post('status'),
	// 		);
	// 	$insert = $this->calon->save($data);
	// 	echo json_encode(array("status" => TRUE));
	// }

	public function ajax_update()
	{
		
		
		$email=$this->input->post('email');
		$nama=$this->input->post('nama');
		$cek='1';
		
		$data = array(
				'id_user' => $this->input->post('id_user'),
				'id_diklat' => $this->input->post('id_diklat'),
				'kode_status' => '4',
			);
			
		$this->calon_peserta->update(array('id_user' => $this->input->post('id_user'),'id_diklat' => $this->input->post('id_diklat')), $data);
		
		echo json_encode(array("status" => TRUE));
		//redirect('Persetujuan_peserta');
		$this->sendMail($email,$nama,$cek);
		 
   
		
	}

	public function ajax_update_tolakan()
	{
		$email=$this->input->post('email');
		$nama=$this->input->post('nama');
		$cek='2';

		$data = array(
				'id_user' => $this->input->post('id_user'),
				'id_diklat' => $this->input->post('id_diklat'),
				'kode_status' => '99',
			);
			
		$this->calon_peserta->update(array('id_user' => $this->input->post('id_user'),'id_diklat' => $this->input->post('id_diklat')), $data);
		$this->sendMail($email,$nama,$cek);
		echo json_encode(array("status" => TRUE));
	}
	function sendMail($email,$nama,$cek) {
		
		
		
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
		
        $config['smtp_host'] = gethostbyname("ssl://smtp.gmail.com");
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "blogiouss@gmail.com";
        $config['smtp_pass'] = "minang2009";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        
        $ci->email->initialize($config);
 
        $ci->email->from('creativehardbeat1@gmail.com', 'Rifan');
		 if ($cek=="1") {
			 
			 $isipesan=$nama.' Anda telah terdaftar sebagai peserta';

		 } else {
			 $isipesan=$nama.' Anda telah ditolak sebagai peserta';
        }
        $list = array($email);
        $ci->email->to($list);
        $ci->email->subject('Informasi Pendaftaran Peserta');
        $ci->email->message($isipesan);
        if ($this->email->send()) {
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }


}
