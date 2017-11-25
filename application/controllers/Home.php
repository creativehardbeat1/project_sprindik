<?php
class Home extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
	}
 
	public function index()
	{
		$this->load->helper('url');
		$data['graph'] = $this->Home_model->graph();
		$this->load->view('home/v_home', $data);
	}
 
}