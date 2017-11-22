<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_Diklat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Peserta_Diklat_model','peserta');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('peserta_diklat/v_peserta_diklat');
	}

	public function ajax_list()
	{
		$list = $this->peserta->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $peserta) {
			$no++;
			$row = array();
			$row[] = $peserta->id_peserta;
			$row[] = $peserta->id_daftar_diklat;
			$row[] = $peserta->flag_approval;
			$row[] = $peserta->time_creation;
			$row[] = $peserta->status_peserta;
			$row[] = $peserta->status_kegiatan;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_peserta('."'".$peserta->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Update</a>';
				 //<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_peserta('."'".$peserta->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->peserta->count_all(),
						"recordsFiltered" => $this->peserta->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->peserta->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'id_peserta' => $this->input->post('id_peserta'),
				'id_daftar_diklat' => $this->input->post('id_daftar_diklat'),
				'flag_approval' => $this->input->post('flag_approval'),
				'time_creation' => $this->input->post('time_creation'),
				'status_peserta' => $this->input->post('status_peserta'),
				'status_kegiatan' => $this->input->post('status_kegiatan'),
			);
		$insert = $this->peserta->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id_peserta' => $this->input->post('id_peserta'),
				'id_daftar_diklat' => $this->input->post('id_daftar_diklat'),
				'flag_approval' => $this->input->post('flag_approval'),
				'time_creation' => $this->input->post('time_creation'),
				'status_peserta' => $this->input->post('status_peserta'),
				'status_kegiatan' => $this->input->post('status_kegiatan'),
			);
		$this->peserta->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->peserta->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
