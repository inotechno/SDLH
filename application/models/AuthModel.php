<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{
	private $group = 'users_group';
	private $pk = 'id';

	public function __construct()
	{
		parent::__construct();
	}

	function login($username, $password, $level)
	{
		$this->db->select('*');
		$this->db->from($level);
		$this->db->join($this->group, $this->group . '.level = ' . $level . '.level', 'left');
		$this->db->where($level . '.username', $username);
		// $this->db->where($level.'.password', $password);
		$this->db->where($level . '.status', 1);
		$this->db->limit(1);
		return $this->db->get();
	}

	function update($data, $id, $level)
	{
		$this->db->where($this->pk, $id);
		$this->db->update($level, $data);
	}

	function get_by_cookie($cookie, $level)
	{
		$this->db->where('cookie', $cookie);
		return $this->db->get('admin', 'petugas', 'pelanggan');
	}
}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */
