<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_Diklat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('peserta_diklat_model','peserta_diklat');
		$this->load->model('user_diklat_model','udiklat');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('peserta_diklat/v_peserta_diklat');
	}

	public function ajax_list()
	{
		$status=$this->session->userdata('user_status');
		$user_id=$this->session->userdata('id_user');
		if($status=="3"){
			$list = $this->udiklat->get_datatables_peserta_diklat_by_id();			
			$no = 0;
		}else{
			$list = $this->udiklat->get_datatables_peserta_diklat();	
			$no = $_POST['start'];
		}
		$data = array();
		foreach ($list as $udiklat) {
			$no++;
			$row = array();
			$row[] = $udiklat->nama;
			$row[] = $udiklat->keterangan;
			$row[] = $udiklat->tgl_mulai;
			$row[] = $udiklat->tgl_selesai;
			$row[] = $udiklat->status_diklat;
			$row[] = $udiklat->status_peserta;
			$row[] = $udiklat->status_kegiatan;

			//add html for action
			$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Update" onclick="edit_peserta_diklat('."'".$udiklat->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Update</a>';
		
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

	public function ajax_add()
	{
		$data = array(
				//'id_user' => $this->input->post('id_user'),
				'id_diklat' => $this->input->post('id_diklat'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'url_dok_ktp' => $this->input->post('url_dok_ktp'),
				'url_dok_ijazah' => $this->input->post('url_dok_ijazah'),
				'time_creation' => $this->input->post('time_creation'),
			);
		$insert = $this->peserta_diklat->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id_user' => $this->input->post('id_user'),
				'id_diklat' => $this->input->post('id_diklat'),
				'status_peserta' => $this->input->post('status_peserta'),
				'status_kegiatan' => $this->input->post('status_kegiatan'),
			);
		$this->peserta_diklat->update(array('id_user' => $this->input->post('id_user'),'id_diklat' => $this->input->post('id_diklat')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->peserta_diklat->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
