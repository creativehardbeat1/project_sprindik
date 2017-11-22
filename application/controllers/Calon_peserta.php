<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class calon_peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('calon_peserta_model','calon_peserta');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('calon_peserta/calon_peserta_view');
	}

	public function ajax_list()
	{
		$list = $this->calon_peserta->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $calon_peserta) {
			$no++;
			$row = array();
			//$row[] = $calon_peserta->id_user;
			$row[] = $calon_peserta->id_diklat;
			$row[] = $calon_peserta->nama;
			$row[] = $calon_peserta->umur;
			$row[] = $calon_peserta->alamat;
			$row[] = $calon_peserta->email;
			$row[] = $calon_peserta->url_dok_ktp;
			$row[] = $calon_peserta->url_dok_ijazah;
			$row[] = $calon_peserta->time_creation;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit_calon_peserta('."'".$calon_peserta->id."'".')"> <i class="glyphicon glyphicon-pencil"></i> Ubah</a>';
				  // <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_calon_peserta('."'".$calon_peserta->id."'".')"> <!-- <i class="glyphicon glyphicon-trash"> --></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->calon_peserta->count_all(),
						"recordsFiltered" => $this->calon_peserta->count_filtered(),
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
