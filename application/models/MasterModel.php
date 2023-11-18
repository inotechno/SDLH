<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MasterModel extends CI_Model {
			
	    // Datatable
		private function _get_datatables_query($column_order, $column_search, $order, $table)
		{
			$this->db->select('a.*');
			$this->db->from($table.' as a');
	        $i = 0;
	     	
	        foreach ($column_search as $item) // looping awal
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
	 
	                if(count($column_search) - 1 == $i) 
	                    $this->db->group_end(); 
	            }
	            $i++;
	        }
	         
	        if(isset($_POST['order'])) { // here order processing
	            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	        }  else if(isset($order)) {
	            $order = $order;
	            $this->db->order_by(key($order), $order[key($order)]);
	        }
		}

	// Datatable Petugas

		function get_petugas()
		{
			$column_order = array(null, 'a.id', 'a.nama_lengkap','a.username','a.email', 'a.hp', 'a.jenis_kelamin', 'a.tempat_lahir', 'a.tanggal_lahir', 'a.alamat', 'a.foto', 'a.level', 'a.status', 'a.created_at'); 
		    $column_search = array('a.nama_lengkap','a.username','a.email', 'a.hp', 'a.jenis_kelamin', 'a.tempat_lahir', 'a.tanggal_lahir', 'a.alamat'); //field yang diizin untuk pencarian 
		    $order = array('a.nama_lengkap' => 'asc'); // default order 
		    $table = 'petugas';

			$this->_get_datatables_query($column_order, $column_search, $order, $table);
	        if($_POST['length'] != -1)
	        $this->db->limit($_POST['length'], $_POST['start']);

	        $query = $this->db->get();
	        return $query->result();
		}

		function count_filtered_petugas()
	    {
	    	$column_order = array(null, 'a.id', 'a.nama_lengkap','a.username','a.email', 'a.hp', 'a.jenis_kelamin', 'a.tempat_lahir', 'a.tanggal_lahir', 'a.alamat', 'a.foto', 'a.level', 'a.status', 'a.created_at'); 
		    $column_search = array('a.nama_lengkap','a.username','a.email', 'a.hp', 'a.jenis_kelamin', 'a.tempat_lahir', 'a.tanggal_lahir', 'a.alamat'); //field yang diizin untuk pencarian 
		    $order = array('a.nama_lengkap' => 'asc'); // default order 
		    $table = 'petugas';

	        $this->_get_datatables_query($column_order, $column_search, $order, $table);
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    function count_all_petugas()
	    {
	        $this->db->from('petugas');
	        return $this->db->count_all_results();
	    }
	// Datatable Petugas

	// Datatable Pelanggan

	    public function get_default_pelanggan()
	    {
	    	$this->db->select('pelanggan.*, kategori_pelanggan.nama_kategori');
	    	$this->db->join('kategori_pelanggan', 'kategori_pelanggan.id_kategori = pelanggan.id_kategori', 'left');
	    	return $this->db->get('pelanggan')->result();
	    }

		function get_pelanggan()
		{
			$column_order = array(null, 'a.id', 'a.nama_lengkap','a.username','a.email', 'a.hp', 'a.jenis_kelamin', 'a.tempat_lahir', 'a.tanggal_lahir', 'a.alamat', 'a.foto', 'a.level', 'a.status', 'a.created_at'); 
		    $column_search = array('a.nama_lengkap','a.username','a.email', 'a.hp', 'a.jenis_kelamin', 'a.tempat_lahir', 'a.tanggal_lahir', 'a.alamat'); //field yang diizin untuk pencarian 
		    $order = array('a.nama_lengkap' => 'asc'); // default order 
		    $table = 'pelanggan';

			$this->_get_datatables_query($column_order, $column_search, $order, $table);
	        if($_POST['length'] != -1)
	        $this->db->limit($_POST['length'], $_POST['start']);
	    	$this->db->where('status', 1);

	        $query = $this->db->get();
	        return $query->result();
		}

		function count_filtered_pelanggan()
	    {
	    	$column_order = array(null, 'a.id', 'a.nama_lengkap','a.username','a.email', 'a.hp', 'a.jenis_kelamin', 'a.tempat_lahir', 'a.tanggal_lahir', 'a.alamat', 'a.foto', 'a.level', 'a.status', 'a.created_at'); 
		    $column_search = array('a.nama_lengkap','a.username','a.email', 'a.hp', 'a.jenis_kelamin', 'a.tempat_lahir', 'a.tanggal_lahir', 'a.alamat'); //field yang diizin untuk pencarian 
		    $order = array('a.nama_lengkap' => 'asc'); // default order 
		    $table = 'pelanggan';

	        $this->_get_datatables_query($column_order, $column_search, $order, $table);
	    	$this->db->where('status', 1);
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    function count_all_pelanggan()
	    {
	        $this->db->from('pelanggan');
	    	$this->db->where('status', 1);
	        return $this->db->count_all_results();
	    }
	// Datatable Petugas

	// Datatable Kategori
	    function get_kategori()
		{
			$column_order = array(null, 'a.id_kategori', 'a.nama_kategori','a.jenis_kategori','a.nominal'); 
		    $column_search = array('a.nama_kategori','a.jenis_kategori'); //field yang diizin untuk pencarian 
		    $order = array('a.nama_kategori' => 'asc'); // default order 
		    $table = 'kategori_pelanggan';

			$this->_get_datatables_query($column_order, $column_search, $order, $table);
	        if($_POST['length'] != -1)
	        $this->db->limit($_POST['length'], $_POST['start']);

	        $query = $this->db->get();
	        return $query->result();
		}

		function count_filtered_kategori()
	    {
	    	$column_order = array(null, 'a.id_kategori', 'a.nama_kategori','a.jenis_kategori','a.nominal'); 
		    $column_search = array('a.nama_kategori','a.jenis_kategori'); //field yang diizin untuk pencarian 
		    $order = array('a.nama_kategori' => 'asc'); // default order 
		    $table = 'kategori_pelanggan';

	        $this->_get_datatables_query($column_order, $column_search, $order, $table);
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    function count_all_kategori()
	    {
	        $this->db->from('kategori_pelanggan');
	        return $this->db->count_all_results();
	    }
	// Datatable Kategori





	// Model Petugas
	    function getPetugasById($id)
	    {
	    	return $this->db->get_where('petugas', array('id' => $id));
	    }

	    function addPetugas($data)
	    {
	    	return $this->db->insert('petugas', $data);
	    }

	    function updatePetugas($id, $data)
	    {
	    	return $this->db->update('petugas', $data, array('id' => $id));
	    }

	    function deletePetugas($id)
	    {
	    	return $this->db->delete('petugas', array('id' => $id));
	    }

	// Model Petugas

	// Model Petugas

	    function getPelangganById($id)
	    {
	    	return $this->db->get_where('pelanggan', array('id' => $id));
	    }

	    function getPelangganByUsername($username)
	    {
	    	$this->db->select('*');
	    	$this->db->join('kategori_pelanggan', 'pelanggan.id_kategori = kategori_pelanggan.id_kategori', 'left');
	    	$this->db->where('username', $username);
	    	return $this->db->get('pelanggan');	
	    }

	    function addPelanggan($data)
	    {
	    	return $this->db->insert('pelanggan', $data);
	    }

	    function updatePelanggan($id, $data)
	    {
	    	return $this->db->update('pelanggan', $data, array('id' => $id));
	    }

	    function deletePelanggan($id)
	    {
	    	return $this->db->delete('pelanggan', array('id' => $id));
	    }

	// Model Petugas

	// Model Kategori
	    function getKategoriById($id_kategori)
	    {
	    	return $this->db->get_where('kategori_pelanggan', array('id_kategori' => $id_kategori));
	    }

	    function addKategori($data)
	    {
	    	return $this->db->insert('kategori_pelanggan', $data);
	    }

	    function updateKategori($id_kategori, $data)
	    {
	    	return $this->db->update('kategori_pelanggan', $data, array('id_kategori' => $id_kategori));
	    }

	    function deleteKategori($id_kategori)
	    {
	    	return $this->db->delete('kategori_pelanggan', array('id_kategori' => $id_kategori));
	    }

	    function showSelectKategori()
	    {
	    	return $this->db->get('kategori_pelanggan');
	    }

	// Model Kategori
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>