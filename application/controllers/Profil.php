<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profil_model','profil');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('profil/profil_view');
	}

	public function ajax_list()
	{
		$status=$this->session->userdata('user_status');
		$user_id=$this->session->userdata('id_user');
		if($status=="3"){
			$list = $this->user->get_datatables_id_user();			
			$no = 0;
		}else{
			$list = $this->user->get_datatables();	
			$no = $_POST['start'];
		}
		$data = array();
		foreach ($list as $profil) {
			$no++;
			$row = array();
			$row[] = $profil->id_user;
			$row[] = $profil->nama;
			$row[] = $profil->umur;
			$row[] = $profil->alamat;
			$row[] = $profil->email;
			$row[] = $profil->url_dok_ktp;
			$row[] = $profil->url_dok_ijazah;
			$row[] = $profil->time_creation;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit_profil('."'".$profil->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_profil('."'".$profil->id."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->profil->count_all(),
						"recordsFiltered" => $this->profil->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->profil->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'id_user' => $this->input->post('id_user'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'url_dok_ktp' => $this->input->post('url_dok_ktp'),
				'url_dok_ijazah' => $this->input->post('url_dok_ijazah'),
				'time_creation' => $this->input->post('time_creation'),
			);
		$insert = $this->profil->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'id_user' => $this->input->post('id_user'),
				'nama' => $this->input->post('nama'),
				'umur' => $this->input->post('umur'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'url_dok_ktp' => $this->input->post('url_dok_ktp'),
				'url_dok_ijazah' => $this->input->post('url_dok_ijazah'),
				'time_creation' => $this->input->post('time_creation'),
			);
		$this->profil->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->profil->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
