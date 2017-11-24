<?php
class Profil_model extends CI_Model {
	
    var $tabel = 'oltp_profil'; //buat variabel tabel
 
    function __construct() {
        parent::__construct();
		$this->load->database();
    }
	
	public function get_profil(){
		$user_id=$this->session->userdata('id_user');
		$query= $this->db->where('id_user',$user_id)->get('oltp_profil');
		return $query->row();
		
	
	}
     
    //fungsi untuk menampilkan semua data dari tabel database
    function get_allimage() {
		$user_id=$this->session->userdata('id_user');
        $this->db->from($this->tabel);
		$this->db->where('id_user',$user_id);
        $query = $this->db->get();
 
        //cek apakah ada data
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
 
    //fungsi insert ke database
    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }
	public function edit_profil($data1){
		
		
		
		$dktp=$data1 ["dktp"];
		$dnama=$data1 ["dnama"];
		$dumur=$data1 ["dumur"];
		$dalamat=$data1 ["dalamat"];
		$demail=$data1 ["demail"];
		$dno_mobile=$data1 ["dno_mobile"];
		//var_dump($dnama);
		//echo $dktp;
		//var_dump($data1);
		$user_id=$this->session->userdata('id_user');
		
		
		
		
		$data = array(
               'nama' => $dnama,
               'umur' => $dumur,
			   'alamat' => $dalamat,
               'email' => $demail,
			   'url_dok_ktp' => $dktp,
               'no_mobile' => $dno_mobile		  
            );
$this->db->where('id_user', $user_id);
$this->db->update('oltp_profil', $data); 

// Produces:
// UPDATE mytable 
// SET title = '{$title}', name = '{$name}', date = '{$date}'
// WHERE id = $id


		
	}
}
?>