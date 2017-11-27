<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
 
	
	function hasil_survey() {
      $sql = "SELECT a.status, COUNT(a.kode_status) AS jumlah
					FROM ref_status a 
					RIGHT JOIN oltp_calon_peserta b
					ON a.kode_status = b.kode_status
					WHERE b.kode_status IN ('2','3','4','98','99')
					GROUP BY a.status";
      return $this->db->query($sql);
  	}

  	function jumlah_daftar() {
      $sql = "SELECT DATE_FORMAT(time_creation,'%b %Y') AS bulan, COUNT(*) jumlah
				FROM oltp_user
				GROUP BY bulan";
      return $this->db->query($sql);
  	}

  	function diklat_fav() {
      $sql = "SELECT b.keterangan AS nama_diklat, COUNT(a.id_diklat) AS jumlah
				FROM oltp_calon_peserta a 
				LEFT JOIN ref_diklat b
				ON a.id_diklat = b.id_diklat
				GROUP BY a.id_diklat
				ORDER BY jumlah DESC 
				LIMIT 5";
      return $this->db->query($sql);
  	}
  
  
		
  
 
}