<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persetujuan_dokumen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('calon_model','calon');
		$this->load->model('user_diklat_model','udiklat');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('persetujuan/persetujuan_dokumen_view');
	}

	public function ajax_list()
	{
		$list = $this->udiklat->get_datatables_persetujuan_a();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $udiklat) {
			$no++;
			$row = array();
			$row[] = $udiklat->nama;
			$row[] = $udiklat->umur;
			$row[] = $udiklat->alamat;
			$row[] = $udiklat->email;
			$row[] = $udiklat->url_dok_ktp;
			$row[] = $udiklat->url_dok_ijazah;
			$row[] = $udiklat->no_mobile;
			$row[] = $udiklat->keterangan;
			$row[] = $udiklat->tgl_mulai;
			$row[] = $udiklat->tgl_selesai;
			$row[] = $udiklat->status_diklat;
			$row[] = $udiklat->status_permohonan;

			//add html for action
			// $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit_calon('."'".$calon->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
			// 	  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_calon('."'".$calon->id."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
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

	// public function ajax_edit($id)
	// {
	// 	$data = $this->calon->get_by_id($id);
	// 	echo json_encode($data);
	// }

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

	// public function ajax_update()
	// {
	// 	$data = array(
	// 			'id_user' => $this->input->post('id_user'),
	// 			'id_diklat' => $this->input->post('id_diklat'),
	// 			'status' => $this->input->post('status'),
	// 		);
	// 	$this->calon->update(array('id' => $this->input->post('id')), $data);
	// 	echo json_encode(array("status" => TRUE));
	// }

	// public function ajax_delete($id)
	// {
	// 	$this->calon->delete_by_id($id);
	// 	echo json_encode(array("status" => TRUE));
	// }

}
