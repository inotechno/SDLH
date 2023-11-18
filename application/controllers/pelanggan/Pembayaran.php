<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pembayaran extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('PembayaranModel');
			if ($this->session->userdata('logged') == false || $this->session->userdata('level') != 3) {
				redirect('Auth','refresh');
			}
		}
	
		public function index()
		{
			$def['title'] = 'SISRES | Data Pembayaran';
			$def['breadcrumb'] = 'Data Pembayaran';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('pelanggan/datapembayaran');
			$this->load->view('partials/footer');
			$this->load->view('pelanggan/plugins/datapembayaran');		
		}

		public function get_pembayaran()
		{
			$dt['id_pelanggan'] = $this->session->userdata('id');
			$list = $this->PembayaranModel->get_pembayaran($dt);
			// echo $this->db->last_query($list);
			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {
				
				$no++;
				$row = array();
				$row[] = $ls->no_invoice;
				$row[] = $ls->nama_petugas;
				$row[] = $ls->tanggal_bayar;
				$row[] = '<button class="btn btn-warning btn-sm btn-rounded btn-cetak" data-no="'.$ls->no_invoice.'" data-nama="'.$ls->nama_pelanggan.'" data-nama-kategori="'.$ls->nama_kategori.'" data-nama-petugas="'.$ls->nama_petugas.'" data-tanggal="'.$ls->tanggal_bayar.'">Download</button>';


				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->PembayaranModel->count_all_pembayaran($dt),
	            "recordsFiltered" => $this->PembayaranModel->count_filtered_pembayaran($dt),
	            "data" => $data
			);

			echo json_encode($output);
		}

		
	
	}
	
	/* End of file Pembayaran.php */
	/* Location: ./application/controllers/admin/Pembayaran.php */
?>