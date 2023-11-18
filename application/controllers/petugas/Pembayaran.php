<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pembayaran extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
			$this->load->model('PembayaranModel');
			if ($this->session->userdata('logged') == false || $this->session->userdata('level') != 2) {
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
			$this->load->view('petugas/datapembayaran');
			$this->load->view('partials/footer');
			$this->load->view('petugas/plugins/datapembayaran');		
		}

		public function get_pembayaran()
		{
			$dt['id_petugas'] = $this->session->userdata('id');
			$list = $this->PembayaranModel->get_pembayaran($dt);
			// echo $this->db->last_query($list);
			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {
				
				$row = array();
				$row[] = $ls->no_invoice;
				$row[] = $ls->nama_pelanggan;
				$row[] = $ls->nama_kategori;
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

		public function scanToPayment()
		{
			$username = $this->uri->segment(2);

			$def['page_title'] = 'Data Bayar Pelanggan';

			$this->load->view('scanqrcode', $def);
		}

		public function getProfilePelangganByUsername()
		{
			$username = $this->input->post('username');
			$get = $this->MasterModel->getPelangganByUsername($username)->row();
			// echo $this->db->last_query($get);
			$tanggal = new DateTime(date('Y', strtotime($get->tanggal_lahir)));

			$today = new DateTime('today');
			$y = $today->diff($tanggal)->y;

				$data['id'] 			= $get->id;
				$data['nama_lengkap'] 	= $get->nama_lengkap;
				$data['foto'] 			= $get->foto;
				$data['level'] 			= $get->level;
				$data['nama_kategori']	= $get->nama_kategori;
				$data['status'] 		= $get->status;
				$data['tempat_lahir'] 	= $get->tempat_lahir;
				$data['tanggal_lahir'] 	= date('d-m-Y', strtotime($get->tanggal_lahir));
				$data['tanggal_lahir1'] = $get->tanggal_lahir;
				$data['jenis_kelamin'] 	= $get->jenis_kelamin;
				$data['email'] 			= $get->email;
				$data['hp'] 			= $get->hp;
				$data['username'] 		= $get->username;
				$data['alamat'] 		= $get->alamat;
				$data['umur'] 			= $y;
			
			echo json_encode($data);
		}

		public function getDataPembayaran()
		{
			$username = $this->input->post('username');
			$getId = $this->MasterModel->getPelangganByUsername($username)->row();

			$get = $this->PembayaranModel->getDataPembayaran($getId->id)->result();
			$html = '';
			$no = 1;
			foreach ($get as $gt) {

				$html .= '<li class="checklist-entry list-group-item flex-column align-items-start py-2 px-2">
		                  <div class="checklist-item checklist-item-success">
		                    <div class="checklist-info">
		                      <h5 class="checklist-title mb-0">Tagihan Ke - '.$no++.' | Invoice : '.$gt->no_invoice.'</h5>
		                      <small>'.date('d-m-Y', strtotime($gt->tanggal_bayar)).' | Petugas : '.$gt->nama_lengkap.'</small>
		                    </div>
		                    <div class="mr-2">
		                      <span class="fas fa-check text-success"></span>
		                    </div>
		                  </div>
		                </li>';
			}

			echo $html;
		}

		public function addPembayaran()
		{
			$data['id_pelanggan'] = $this->input->post('id_pelanggan');
			$data['id_petugas'] = $this->session->userdata('id');
			$data['no_invoice'] = $this->PembayaranModel->getInvoice();

			$act = $this->PembayaranModel->addPembayaran($data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Pembayaran Berhasil'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Pembayaran Gagal Silahkan Coba Lagi'
				);
			}

			echo json_encode($response);
		}
	
	}
	
	/* End of file Pembayaran.php */
	/* Location: ./application/controllers/admin/Pembayaran.php */
?>