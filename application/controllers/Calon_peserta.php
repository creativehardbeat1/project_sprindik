<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class calon_peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('calon_peserta_model','calon_peserta');
		$this->load->model('user_diklat_model','udiklat');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('calon_peserta/v_calon_peserta');
	}

	public function ajax_list()
	{
		$status=$this->session->userdata('user_status');
		$user_id=$this->session->userdata('id_user');
		if($status=="3"){
			$list = $this->udiklat->get_datatables_id_user();			
			$no = 0;
		}else{
			$list = $this->udiklat->get_datatables();	
			$no = $_POST['start'];
		}
		$data = array();
		foreach ($list as $udiklat) {
			$no++;
			$row = array();
			$row[] = $udiklat->keterangan;
			$row[] = $udiklat->tgl_mulai;
			$row[] = $udiklat->tgl_selesai;
			$row[] = $udiklat->status_diklat;
			$row[] = $udiklat->status_permohonan;

			
		
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
		$data = $this->calon_peserta->get_by_id($id);
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
		$insert = $this->calon_peserta->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id_user' => $this->input->post('id_user'),
				'id_diklat' => $this->input->post('id_diklat'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'url_dok_ktp' => $this->input->post('url_dok_ktp'),
				'url_dok_ijazah' => $this->input->post('url_dok_ijazah'),
				'time_creation' => $this->input->post('time_creation'),
			);
		$this->calon_peserta->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->calon_peserta->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
