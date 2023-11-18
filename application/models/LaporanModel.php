<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class LaporanModel extends CI_Model {

		var $column_order = array(null, 'a.nama_lengkap','b.nama_lengkap','c.no_invoice', 'c.tanggal_bayar', 'd.nama_kategori'); 
	    var $column_search = array('a.nama_lengkap','b.nama_lengkap','c.no_invoice', 'c.tanggal_bayar', 'd.nama_kategori'); //field yang diizin untuk pencarian 
	    var $order = array('c.tanggal_bayar' => 'desc'); // default order 
	
	// Datatable
		private function _get_datatables_query()
		{
			$this->db->select('a.nama_lengkap as nama_pelanggan, b.nama_lengkap as nama_petugas, c.no_invoice, c.tanggal_bayar, d.nama_kategori');
			$this->db->from('pembayaran as c');
 			$this->db->join('pelanggan as a', 'a.id = c.id_pelanggan', 'left');
 			$this->db->join('petugas as b', 'b.id = c.id_petugas', 'left');
 			$this->db->join('kategori_pelanggan as d', 'a.id_kategori = d.id_kategori', 'left');
 			
 			if ($this->input->post('startDate')) {
 				$this->db->where('c.tanggal_bayar >= ', $this->input->post('startDate'));
 			}

 			if ($this->input->post('endDate')) {
 				$this->db->where('c.tanggal_bayar <= ', $this->input->post('endDate'));
 			}

 			if($this->input->post('pelanggan'))
	        {
	            $this->db->where('id_pelanggan', $this->input->post('pelanggan'));
	        }
	        
	        if($this->input->post('petugas'))
	        {
	            $this->db->like('id_petugas', $this->input->post('petugas'));
	        }

	        $i = 0;
	     	
	        foreach ($this->column_search as $item) // looping awal
	        {
	            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
	            {
	                 
	                if($i===0) // looping awal
	                {
	                    $this->db->group_start();
	                    $this->db->like($item, $_POST['search']['value']); 
	                }
	                else
	                {
	                    $this->db->or_like($item, $_POST['search']['value']);
	                }
	 
	                if(count($this->column_search) - 1 == $i) 
	                    $this->db->group_end(); 
	            }
	            $i++;
	        }
	         
	        if(isset($_POST['order'])) { // here order processing
	            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	        }  else if(isset($this->order)) {
	            $order = $this->order;
	            $this->db->order_by(key($order), $order[key($order)]);
	        }
		}

		function get_datatables()
		{
			$this->_get_datatables_query();
	        if($_POST['length'] != -1)
	        $this->db->limit($_POST['length'], $_POST['start']);

	        $query = $this->db->get();
	        return $query->result();
		}

		function count_filtered()
	    {
	        $this->_get_datatables_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    function count_all()
	    {
	        $this->db->from('pembayaran');
	        return $this->db->count_all_results();
	    }
	// Datatable
	
	}
	
	/* End of file LaporanModel.php */
	/* Location: ./application/models/LaporanModel.php */
?>