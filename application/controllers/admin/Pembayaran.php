<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pembayaran extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('PembayaranModel');
			if ($this->session->userdata('logged') == false || $this->session->userdata('level') != 1) {
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
			$this->load->view('admin/datapembayaran');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/datapembayaran');		
		}

		public function get_pembayaran()
		{
			$id = null;
			$list = $this->PembayaranModel->get_pembayaran($id);
			// echo $this->db->last_query($list);
			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {
				
				$row = array();
				$row[] = $ls->no_invoice;
				$row[] = $ls->nama_pelanggan;
				$row[] = $ls->nama_kategori;
				$row[] = $ls->nama_petugas;
				$row[] = $ls->tanggal_bayar;

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->PembayaranModel->count_all_pembayaran($id),
	            "recordsFiltered" => $this->PembayaranModel->count_filtered_pembayaran($id),
	            "data" => $data
			);

			echo json_encode($output);
		}
	
	}
	
	/* End of file Pembayaran.php */
	/* Location: ./application/controllers/admin/Pembayaran.php */
?>