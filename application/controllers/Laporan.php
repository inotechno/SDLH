<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Laporan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('LaporanModel');
		}
	
		public function index()
		{
			$def['title'] = 'SISRES | Laporan';
			$def['breadcrumb'] = 'Laporan';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('laporan');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/laporan');
		}

		public function getPelanggan()
		{
			$get = $this->db->get('pelanggan')->result();
			echo json_encode($get);
		}

		public function getPetugas()
		{
			$get = $this->db->get('petugas')->result();
			echo json_encode($get);
		}

		public function getLaporan()
		{
			$list = $this->LaporanModel->get_datatables();
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
	            "recordsTotal" => $this->LaporanModel->count_all(),
	            "recordsFiltered" => $this->LaporanModel->count_filtered(),
	            "data" => $data
			);

			echo json_encode($output);
		}
	
	}
	
	/* End of file Laporan.php */
	/* Location: ./application/controllers/admin/Laporan.php */
?>