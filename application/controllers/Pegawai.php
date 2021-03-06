<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model','user');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('pegawai/v_pegawai');
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
		foreach ($list as $user) {
			$no++;
			$row = array();
			$row[] = $user->nip;
			$row[] = $user->nama_pegawai;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit_pegawai('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pegawai('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->user->count_all(),
						"recordsFiltered" => $this->user->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->user->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'nip' => $this->input->post('nip'),
				'nama_pegawai' => $this->input->post('nama_pegawai'),
			);
		$insert = $this->user->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		//var_dump($this->input->post('nama_pegawai'));
		$data = array(
				'nip' => $this->input->post('nip'),
				'nama_pegawai' => $this->input->post('nama_pegawai')
			);
		$this->user->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->user->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
