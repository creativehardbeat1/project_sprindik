<?php
class Auth_model extends CI_model{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function register_user($user){
	$this->db->insert('oltp_user', $user);
	}


	public function nama_check($nama){

	  $this->db->select('*');
	  $this->db->from('oltp_user');
	  $this->db->where('username',$nama);
	  $query=$this->db->get();
	  if($query->num_rows()>0){
		return false;
	  }else{
		return true;
	  }
	}
	public function email_check($email){

	  $this->db->select('*');
	  $this->db->from('oltp_user');
	  $this->db->where('email',$email);
	  $query=$this->db->get();

	  if($query->num_rows()>0){
		return false;
	  }else{
		return true;
	  }

	}
	public function login_user($user,$pass) {
		$this->db->select('*');
		$this->db->from('oltp_user');
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		$this->db->where('flag_status', '1');

		$data = $this->db->get();

		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}

}


?>
