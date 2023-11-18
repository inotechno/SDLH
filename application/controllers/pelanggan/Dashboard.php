<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('logged') == false || $this->session->userdata('level') != 3) {
				redirect('Auth','refresh');
			}
		}
	
		public function index()
		{
			$def['title'] = 'SISRES | Dashboard';
			$def['breadcrumb'] = '';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('pelanggan/dashboard');
			$this->load->view('partials/footer');
			$this->load->view('pelanggan/plugins/dashboard');
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/pelanggan/Dashboard.php */
?>