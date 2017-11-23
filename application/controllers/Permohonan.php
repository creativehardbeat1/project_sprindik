<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('diklat_model','diklat');
		$this->load->model('calon_model','calon');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('diklat/permohonan_diklat_view');
	}

	public function ajax_list()
	{
		$list = $this->diklat->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $diklat) {
			$no++;
			$row = array();
			$row[] = $diklat->keterangan;
			$row[] = $diklat->tgl_mulai;
			$row[] = $diklat->tgl_selesai;
			$row[] = $diklat->status;

			//add html for action
			$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Daftar" onclick="edit_diklat('."'".$diklat->id_diklat."'".')"><i class="glyphicon glyphicon-pencil"></i> Daftar</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->diklat->count_all(),
						"recordsFiltered" => $this->diklat->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id_diklat)
	{
		$data = $this->diklat->get_by_id($id_diklat);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$user_id=$this->session->userdata('id_user');
		$data = array(
				'id_user' => $user_id,
				'id_diklat' => $this->input->post('id_diklat'),
				// 'keterangan' => $this->input->post('keterangan'),
				// 'tgl_mulai' => $this->input->post('tgl_mulai'),
				// 'tgl_selesai' => $this->input->post('tgl_selesai'),
				'status' => '0'
			);
		$insert = $this->calon->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'keterangan' => $this->input->post('keterangan'),
				'tgl_mulai' => $this->input->post('tgl_mulai'),
				'tgl_selesai' => $this->input->post('tgl_selesai'),
				'status' => $this->input->post('status'),
				'catatan' => $this->input->post('catatan'),
			);
		$this->diklat->update(array('id_diklat' => $this->input->post('id_diklat')), $data);
		echo json_encode(array("status" => TRUE));
	}

	// public function ajax_delete($id_diklat)
	// {
	// 	$this->diklat->delete_by_id($id_diklat);
	// 	echo json_encode(array("status" => TRUE));
	// }

}
