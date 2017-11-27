<?php
class Home extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->helper('url');
		
	}
	public function index()
	{
		$this->load->view('home/v_home');
		$this->survey_framework();
		
	}
 
	public function survey_framework()
	{
				foreach($this->Home_model->hasil_survey()->result_array() as $row)
			{ 
		  $data[] = array(
		   'hasil' => $row['status'],
		   'total' => $row['jumlah']
				  );    
		  } 
		  echo json_encode($data);  
	}

	public function survey_daftar_user()
	{
				foreach($this->Home_model->jumlah_daftar()->result_array() as $row)
			{ 
		  $data[] = array(
		   'bulan' => $row['bulan'],
		   'total' => $row['jumlah']
				  );    
		  } 
		  echo json_encode($data);  
	}
	
	public function survey_diklat_fav()
	{
				foreach($this->Home_model->diklat_fav()->result_array() as $row)
			{ 
		  $data[] = array(
		   'nama_diklat' => $row['nama_diklat'],
		   'jumlah' => $row['jumlah']
				  );    
		  } 
		  echo json_encode($data);  
	}
 
}