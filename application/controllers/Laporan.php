<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan_model','user');
		$this->load->library('dompdf_gen');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('laporan/v_laporan_diklat');
	}

	public function ajax_list()
	{
		$list = $this->user->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $user) {
			$no++;
			$row = array();
			$row[] = $user->nama;
			$row[] = $user->keterangan;
			$row[] = $user->tgl_mulai;
			$row[] = $user->tgl_selesai;
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
	
	// fungsi cetak pdf
    public function cetakpdf(){
        $data['title'] = 'Laporan Diklat'; //judul title
        $data['qbarang'] = $this->user->getAllItem(); //query model semua barang
		
        $this->load->view('laporan/v_cetak_laporan_diklat', $data);
 
        $paper_size  = 'A4'; //paper size
        $orientation = 'landscape'; //tipe format kertas
        $html = $this->output->get_output();
 
		$this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_diklat.pdf", array('Attachment'=>0));
    }



}
