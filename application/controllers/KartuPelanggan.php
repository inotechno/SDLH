<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class KartuPelanggan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
		}
	
		public function index()
		{
	        // title dari pdf
	        $data['title'] = 'Cetak Kartu Pelanggan';
	        $data['pelanggan'] = $this->MasterModel->get_default_pelanggan();
			$html = $this->load->view('kartupelanggan',$data, true);	    
	        
	        echo $html;
		}
	
	}
	
	/* End of file kartupelanggan.php */
	/* Location: ./application/controllers/kartupelanggan.php */
?>