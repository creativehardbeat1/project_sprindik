<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('user/user_view');
	}

	public function ajax_list()
	{
		$list = $this->user->get_datatables();
		//var_dump($list);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $user) {
			$no++;
			$row = array();
			$row[] = $user->username;
			$row[] = $user->email;
			$row[] = $user->no_mobile;
			$row[] = $user->dob;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->user_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$user->user_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
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
				'password' => $this->input->post('password'),
				'gender' => $this->input->post('gender'),
				'email' => $this->input->post('email'),
				'no_mobile' => $this->input->post('no_mobile'),
				'dob' => $this->input->post('dob'),
			);
		$insert = $this->user->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'gender' => $this->input->post('gender'),
				'email' => $this->input->post('email'),
				'no_mobile' => $this->input->post('no_mobile'),
				'dob' => $this->input->post('dob'),
			);
		$this->user->update(array('user_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->user->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
