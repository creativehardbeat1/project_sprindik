<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('peserta_model','peserta');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('peserta/v_peserta');
	}

	public function ajax_list()
	{
		$list = $this->peserta->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $peserta) {
			$no++;
			$row = array();
			//$row[] = $peserta->id;
			//$row[] = $peserta->id_user;
			$row[] = $peserta->id_diklat;
			$row[] = $peserta->nama;
			$row[] = $peserta->umur;
			$row[] = $peserta->alamat;
			$row[] = $peserta->email;
			//$row[] = $peserta->url_dok_ktp;
			//$row[] = $peserta->url_dok_ijazah; 	
			//$row[] = $peserta->time_creation; 

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_peserta('."'".$peserta->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Lihat Detail</a>';
				 // <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_peserta('."'".$peserta->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
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
		$insert = $this->peserta->save($data);
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
		$this->peserta->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->peserta->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
