<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','user');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('user/v_user');
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
			$row[] = $user->username;
			$row[] = $user->email;
			$row[] = $user->no_mobile;
			$row[] = $user->status;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit_user('."'".$user->id_user."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
		  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$user->id_user."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
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
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'status' => $this->input->post('status'),
				'email' => $this->input->post('email'),
				'no_mobile' => $this->input->post('no_mobile'),
				'flag_status' => $this->input->post('flag_status'),
			);
		$insert = $this->user->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'username' => $this->input->post('username'),
				'password' => MD5($this->input->post('password')),
				'status' => $this->input->post('status'),
				'email' => $this->input->post('email'),
				'no_mobile' => $this->input->post('no_mobile'),
				'flag_status' => $this->input->post('flag_status'),
			);
		$this->user->update(array('id_user' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->user->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
