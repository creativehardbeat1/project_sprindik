<?php
// Penduduk.php
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
  
  
		
  
 
}