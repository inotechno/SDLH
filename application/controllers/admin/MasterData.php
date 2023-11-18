<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MasterData extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
			$this->load->helper('upload');
			if ($this->session->userdata('logged') == false || $this->session->userdata('level') != 1) {
				redirect('Auth','refresh');
			}
		}
	
	// Controller Petugas
		public function datapetugas()
		{
			$def['title'] = 'SISRES | Data Petugas';
			$def['breadcrumb'] = 'Data Petugas';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/datapetugas');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/datapetugas');
		}

		public function getPetugasById()
		{
			$id = $this->input->get('id');
			$data = $this->MasterModel->getPetugasById($id)->row();
			echo json_encode($data);
		}

		public function get_petugas()
		{
			$list = $this->MasterModel->get_petugas();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				if ($ls->foto == NULL) {
					$foto = site_url('assets/assets/img/users/default.png');
				}else{
					$foto = site_url('assets/assets/img/users/petugas/'.$ls->foto);
				}

				$no++;
				$row = array();
				$row[] = $no;
				$row[] = '<a href="'.$foto.'" target="_blank"><img src="'.$foto.'" width="20" height="20"></a>';
				$row[] = $ls->username;
				$row[] = $ls->nama_lengkap;
				$row[] = $ls->email;
				$row[] = $ls->hp;
				$row[] = $ls->jenis_kelamin;
				$row[] = $ls->tempat_lahir.', '.$ls->tanggal_lahir;

				$row[] = '
					<div class="btn-group">
						<button class="btn btn-default btn-sm edit-data" data-username="'.$ls->username.'" data-nama="'.$ls->nama_lengkap.'" data-id="'.$ls->id.'"><span class="fas fa-users-cog"></span></button>
						<button data-id="'.$ls->id.'" data-nama="'.$ls->nama_lengkap.'" data-foto="'.$ls->foto.'" class="btn btn-danger delete-data btn-sm"><span class="fas fa-times"></span></button>
					</div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->MasterModel->count_all_petugas(),
	            "recordsFiltered" => $this->MasterModel->count_filtered_petugas(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function addPetugas()
		{
			$data['username'] = $this->input->post('username');
			$data['password'] = hash('sha512', $this->input->post('password').config_item('encryption_key'));
			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');
			$data['level'] = 2;
			$data['status'] = 1;

			if (!empty($_FILES['foto']['name'])) {
				$upload = h_upload($data['username'], 'assets/assets/img/users/petugas', 'gif|jpg|png|jpeg', '1024', 'foto');
			
		        if($upload){
					$data['foto'] = $upload;
				}else{
					$data['foto'] = $foto_lama;
				}
			}

			$act = $this->MasterModel->addPetugas($data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data petugas berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Petugas gagal dikirim'
				);
			}

			echo json_encode($response);

		}

		public function updatePetugas()
		{
			$id = $this->input->post('id');
			$username = $this->input->post('username');
			$foto_lama = $this->input->post('foto_lama');

			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');

			if (!empty($_FILES['foto']['name'])) {
				$upload = h_upload($username, 'assets/assets/img/users/petugas', 'gif|jpg|png|jpeg', '1024', 'foto');
			
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
					'message' => 'Data petugas berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Petugas gagal dikirim'
				);
			}

			echo json_encode($response);

		}

		public function deletePetugas()
		{
			$id = $this->input->post('id');
			$foto = $this->input->post('foto');

			$act = $this->MasterModel->deletePetugas($id);

			if ($act) {
	        	@unlink('./assets/assets/img/users/petugas/'.$foto);
				$response = array(
					'type' => 'success',
					'message' => 'Data petugas berhasil dihapus'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Petugas gagal dihapus'
				);
			}

			echo json_encode($response);
		}
	// Controller Petugas

	// Controller Pelanggan
		public function datapelanggan()
		{
			$def['title'] = 'SISRES | Data Pelanggan';
			$def['breadcrumb'] = 'Data Pelanggan';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/datapelanggan');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/datapelanggan');
		}

		public function getPelangganById()
		{
			$id = $this->input->get('id');
			$data = $this->MasterModel->getPelangganById($id)->row();
			echo json_encode($data);
		}

		public function create_qrcode($username)
		{
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = './assets/assets/img/'; //string, the default is application/cache/
	        $config['errorlog']     = './assets/assets/img/'; //string, the default is application/logs/
	        $config['imagedir']     = './assets/assets/img/qrcode/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '1024'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	 
	        $image_name=$username.'.png'; //buat name dari qr code sesuai dengan username
	 
	        $params['data'] = base_url('scanQRcode/'.$username); //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params);

	        return $image_name;
		}

		public function get_pelanggan()
		{
			$list = $this->MasterModel->get_pelanggan();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				if ($ls->foto == NULL) {
					$foto = site_url('assets/assets/img/users/default.png');
				}else{
					$foto = site_url('assets/assets/img/users/pelanggan/'.$ls->foto);
				}

				if ($ls->qrcode == NULL) {
					$qrcode = '';
				}else{
					$qrcode = site_url('assets/assets/img/qrcode/'.$ls->qrcode);
				}

				$no++;
				$row = array();
				$row[] = $no;
				$row[] = '<a href="'.$qrcode.'" target="_blank"><img src="'.$qrcode.'" width="20" height="20"></a> | <a href="'.$foto.'" target="_blank"><img src="'.$foto.'" width="20" height="20"></a>';
				$row[] = $ls->username;
				$row[] = $ls->nama_lengkap;
				$row[] = $ls->email;
				$row[] = $ls->hp;
				$row[] = $ls->jenis_kelamin;
				$row[] = $ls->tempat_lahir.', '.$ls->tanggal_lahir;

				$row[] = '
					<div class="btn-group">
						<button class="btn btn-warning btn-sm view-data" data-username="'.$ls->username.'" data-nama="'.$ls->nama_lengkap.'" data-id="'.$ls->id.'"><span class="fas fa-eye"></span></button>
						<button class="btn btn-default btn-sm edit-data" data-username="'.$ls->username.'" data-nama="'.$ls->nama_lengkap.'" data-id="'.$ls->id.'"><span class="fas fa-users-cog"></span></button>
						<button data-id="'.$ls->id.'" data-nama="'.$ls->nama_lengkap.'" data-foto="'.$ls->foto.'" data-file_mou="'.$ls->file_mou.'" class="btn btn-danger delete-data btn-sm"><span class="fas fa-times"></span></button>
					</div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->MasterModel->count_all_pelanggan(),
	            "recordsFiltered" => $this->MasterModel->count_filtered_pelanggan(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function addPelanggan()
		{
			$data['username'] = $this->input->post('username');
			$data['password'] = hash('sha512', $this->input->post('password').config_item('encryption_key'));
			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');
			$data['qrcode'] = $this->create_qrcode($data['username']);
			$data['level'] = 3;
			$data['status'] = 1;

			$validate = $this->MasterModel->getPelangganByUsername($data['username']);
			if ($validate->num_rows() > 0) {
				$response = array(
					'type' => 'danger',
					'message' => 'Username sudah tersedia silahkan coba lagi !!'
				);
			}else{
				if (!empty($_FILES['foto']['name'])) {
					$foto = h_upload($data['username'], 'assets/assets/img/users/pelanggan', 'gif|jpg|png|jpeg', '1024', 'foto');
				
			        if($foto){
						$data['foto'] = $foto;
					} else {
						$data['foto'] = NULL;
					}
				}

				$act = $this->MasterModel->addPelanggan($data);

				if ($act) {
					$response = array(
						'type' => 'success',
						'message' => 'Data petugas berhasil dikirim'
					);
				}else{
					$response = array(
						'type' => 'danger',
						'message' => 'Data Petugas gagal dikirim'
					);
				}
			}
			

			echo json_encode($response);

		}

		public function updatePelanggan()
		{
			$id = $this->input->post('id');
			$username = $this->input->post('username');
			$foto_lama = $this->input->post('foto_lama');

			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');

			if (!empty($_FILES['foto']['name'])) {
				$foto = h_upload($username, 'assets/assets/img/users/pelanggan', 'gif|jpg|png|jpeg', '1024', 'foto');

		        if($foto){
					$data['foto'] = $foto;
		        	@unlink('./assets/assets/img/users/pelanggan/'.$foto_lama);
				} else {
					$data['foto'] = NULL;
				}
			}

			$act = $this->MasterModel->updatePelanggan($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data petugas berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Petugas gagal dikirim'
				);
			}

			echo json_encode($response);

		}

		public function deletePelanggan()
		{
			$id = $this->input->post('id');
			$data['status'] = 0;

			$act = $this->MasterModel->updatePelanggan($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data petugas berhasil dihapus'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Petugas gagal dihapus'
				);
			}

			echo json_encode($response);
		}

		public function updateFileMOU()
		{
			$id 					= $this->input->post('id');
			$data['id_kategori'] 	= $this->input->post('id_kategori');
			$data['tanggal_mou'] 	= $this->input->post('tanggal_mou');
			$file_mou_lama			= $this->input->post('file_mou_lama');
			$username 				= $this->input->post('username');
			
			if (!empty($_FILES['file_mou']['name'])) {
				$file = h_upload($username, 'assets/assets/file', 'pdf|doc|docx', '1024', 'file_mou');

		        if($file){
					$data['file_mou'] = $file;
					@unlink('./assets/assets/file/'.$file_mou_lama);
				} else {
					$data['file_mou'] = NULL;
				}
			}

			$act = $this->MasterModel->updatePelanggan($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data MOU berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data MOU gagal dikirim'
				);
			}

			echo json_encode($response);

		}
	// Controller Pelanggan

	// Controller Kategori
		public function kategori()
		{
			$def['title'] = 'SISRES | Data Kategori';
			$def['breadcrumb'] = 'Kategori Pelanggan';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/kategori');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/kategori');
		}

		public function get_kategori()
		{
			$list = $this->MasterModel->get_kategori();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $ls->nama_kategori;
				$row[] = $ls->nominal;
				$row[] = $ls->jenis_kategori;

				$row[] = '
					<div class="btn-group">
						<button class="btn btn-default btn-sm edit-data" data-nama="'.$ls->nama_kategori.'" data-id="'.$ls->id_kategori.'"><span class="fas fa-cog"></span></button>
						<button data-id="'.$ls->id_kategori.'" data-nama="'.$ls->nama_kategori.'" class="btn btn-danger delete-data btn-sm"><span class="fas fa-times"></span></button>
					</div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->MasterModel->count_all_kategori(),
	            "recordsFiltered" => $this->MasterModel->count_filtered_kategori(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function getKategoriById()
		{
			$id_kategori = $this->input->get('id_kategori');
			$data = $this->MasterModel->getKategoriById($id_kategori)->row();
			echo json_encode($data);
		}

		public function addKategori()
		{
			$data['nama_kategori'] = $this->input->post('nama_kategori');
			$data['nominal'] = $this->input->post('nominal');
			$data['jenis_kategori'] = $this->input->post('jenis_kategori');

			$act = $this->MasterModel->addKategori($data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Kategori berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Kategori gagal dikirim'
				);
			}

			echo json_encode($response);
		}

		public function updateKategori()
		{
			$id_kategori = $this->input->post('id_kategori');
			$data['nama_kategori'] = $this->input->post('nama_kategori');
			$data['nominal'] = $this->input->post('nominal');
			$data['jenis_kategori'] = $this->input->post('jenis_kategori');

			$act = $this->MasterModel->updateKategori($id_kategori, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Kategori berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Kategori gagal dikirim'
				);
			}

			echo json_encode($response);
		}

		public function deleteKategori()
		{
			$id_kategori = $this->input->post('id_kategori');
			$act = $this->MasterModel->deleteKategori($id_kategori);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Kategori berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Kategori gagal dikirim'
				);
			}

			echo json_encode($response);
		}

		public function showSelectKategori()
		{
			$list = $this->MasterModel->showSelectKategori()->result();
			echo json_encode($list);
		}
	// Controller Kategori
	
	}
	
	/* End of file MasterData.php */
	/* Location: ./application/controllers/admin/MasterData.php */
?>