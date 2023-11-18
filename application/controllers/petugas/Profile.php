<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profile extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
			$this->load->helper('upload');
			if ($this->session->userdata('logged') == false || $this->session->userdata('level') != 2) {
				redirect('Auth','refresh');
			}
		}
	
		public function index()
		{
			$def['title'] = 'SISRES | Data Profil';
			$def['breadcrumb'] = 'Data Profil Anda';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('petugas/profile');
			$this->load->view('partials/footer');
			$this->load->view('petugas/plugins/profile');
		}

		public function get_profile()
		{
			$id = $this->session->userdata('id');
			$get = $this->MasterModel->getPetugasById($id)->row();
			
			$tanggal = new DateTime(date('Y', strtotime($get->tanggal_lahir)));

			$today = new DateTime('today');
			$y = $today->diff($tanggal)->y;

				$data['nama_lengkap'] 	= $get->nama_lengkap;
				$data['foto'] 			= $get->foto;
				$data['level'] 			= $get->level;
				$data['status'] 		= $get->status;
				$data['tempat_lahir'] 	= $get->tempat_lahir;
				$data['tanggal_lahir'] 	= date('d-m-Y', strtotime($get->tanggal_lahir));
				$data['jenis_kelamin'] 	= $get->jenis_kelamin;
				$data['email'] 			= $get->email;
				$data['hp'] 			= $get->hp;
				$data['username'] 		= $get->username;
				$data['alamat'] 		= $get->alamat;
				$data['umur'] 			= $y;
				$data['nama_group'] 	= $this->session->userdata('nama_akses');
			
			echo json_encode($data);
		}

		public function updateProfile()
		{
			$id = $this->session->userdata('id');
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if (!empty($password)) {
				$data['password'] = hash('sha512', $this->input->post('password').config_item('encryption_key'));
			}

			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');

			$act = $this->MasterModel->updatePetugas($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data anda berhasil diubah, halaman ini akan direfresh'
				);

				$array = array(
					'email'			=> $data['email'],
					'nama_lengkap'	=> $data['nama_lengkap'],
				);
				
				$this->session->set_userdata($array);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data anda gagal diubah'
				);
			}

			echo json_encode($response);

		}

		public function updateFoto()
		{
			$id = $this->session->userdata('id');
			$foto_lama = $this->input->post('foto_lama');
			$username = $this->session->userdata('username');

			$upload = h_upload($username, 'assets/assets/img/users/petugas', 'gif|jpg|png|jpeg', '1024', 'foto');
			
			if (!empty($_FILES['foto']['name'])) {
		        if($upload){
					$data['foto'] = $upload;
		        	@unlink('./assets/assets/img/users/petugas/'.$foto_lama);
				}else{
					$data['foto'] = $foto_lama;
				}
			}

			$act = $this->MasterModel->updatePetugas($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Foto Berhasil Diganti, Halaman Akan di refresh'
				);
				
				$this->session->set_userdata('foto', $upload);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Foto gagal diganti, silahkan coba kembali'
				);
			}

			echo json_encode($response);
		}
	
	}
	
	/* End of file Profile.php */
	/* Location: ./application/controllers/petugas/Profile.php */
?>