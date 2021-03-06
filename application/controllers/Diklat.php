<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diklat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('diklat_model','diklat');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('diklat/v_diklat');
	}

	public function ajax_list()
	{
		$list = $this->diklat->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $diklat) {
			$no++;
			$row = array();
			$row[] = $diklat->id_diklat;
			$row[] = $diklat->keterangan;
			$row[] = $diklat->tgl_mulai;
			$row[] = $diklat->tgl_selesai;
			$row[] = $diklat->status;
			// $row[] = $diklat->catatan;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit_diklat('."'".$diklat->id_diklat."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_diklat('."'".$diklat->id_diklat."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
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

	public function ajax_edit($id)
	{
		$data = $this->diklat->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'id_diklat' => $this->input->post('id_diklat'),
				'keterangan' => $this->input->post('keterangan'),
				'tgl_mulai' => $this->input->post('tgl_mulai'),
				'tgl_selesai' => $this->input->post('tgl_selesai'),
				'status' => $this->input->post('status'),
				'catatan' => $this->input->post('catatan'),
				'flag_status' => $this->input->post('flag_status'),
			);
		$insert = $this->diklat->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id_diklat' => $this->input->post('id_diklat'),
				'keterangan' => $this->input->post('keterangan'),
				'tgl_mulai' => $this->input->post('tgl_mulai'),
				'tgl_selesai' => $this->input->post('tgl_selesai'),
				'status' => $this->input->post('status'),
				'catatan' => $this->input->post('catatan'),
				'flag_status' => $this->input->post('flag_status'),
			);
		$this->diklat->update(array('id_diklat' => $this->input->post('id_diklat')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->diklat->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
