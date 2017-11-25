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
	
	
	function survey_framework() {    
	 foreach($this->Home_model->hasil_survey()->result_array() as $row)
		{ 
	  $data[] = array(
	   'hasil' => $row['status'],
	   'total' => $row['jumlah']
			  );    
	  } 
	  echo json_encode($data);  
   }

 
}