<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persetujuan_peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_diklat_model','udiklat');
		$this->load->model('Calon_peserta_model','calon_peserta');
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
			$row[] = '<a href="http://localhost:83/project_sprindik/assets/uploads/'.$udiklat->url_dok_ktp.'"><i class="glyphicon glyphicon-pencil"></i>KTP</a>';			
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
		//$this->sendMail($email,$nama,$cek);
		
		echo json_encode(array("status" => TRUE));
		 
   
		
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
		//$this->sendMail($email,$nama,$cek);
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
		
/* 		user : notifikasi@ojo-lali.com
		pass : mustika2009
		host : mail.ojo-lali.com
 */        
        
        $ci->email->initialize($config);
 
        $ci->email->from('creativehardbeat1@gmail.com', 'Rifan');
		 if ($cek=="1") {
			 
			 $isipesan=$nama.' Anda telah terdaftar sebagai peserta';

		 } else {
			 $isipesan=$nama.' Anda telah ditolak sebagai peserta';
        }
	
		$email1='"'.$email.'"'.'<'.$email.'>'.'"';
		//echo $email1; */
		
		//$email1="creativehardbeat1@gmail.com<creativehardbeat1@gmail.com>";
  
        $list = array($email1);
		
        $ci->email->to($list);
        $ci->email->subject('Informasi Pendaftaran Peserta');
        $ci->email->message($isipesan);
        if ($this->email->send()) {
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }
	
	public function sendMail1($email,$nama,$cek) {
		//$email='creativehardbeat1@gmail.com';
		//var_dump($email);
		$this->load->library('phpmailer.php');
		if ($cek=="1") {
			$message = $nama.' Anda telah terdaftar sebagai peserta';
			
		}else{
			$message = $nama.' Anda telah ditolak sebagai peserta';
		}


		$mail = new PHPMailer;
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl';
		$mail->Host = gethostbyname('mail.ojo-lali.com');

		$mail->SMTPDebug = 0;
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->Username = "notifikasi@ojo-lali.com"; //user email yang sebelumnya anda buat
		$mail->Password = "mustika2009"; //password email yang sebelumnya anda buat
		$mail->SetFrom("notifikasi@ojo-lali.com","Admin Pendaftaran Diklat"); //set email pengirim
		$mail->Subject = "Notifikasi Aplikasi Sprindik"; //subyek email
		$mail->AddAddress($email,$nama);  //tujuan email
		$mail->MsgHTML($message);
		if($mail->Send()){

		echo "Email Notifikasi berhasil dikirim";

		}else {
				//echo $email.' dengan '.$nama." gagal pengiriman";
			}	
	}


}
