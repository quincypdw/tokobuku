<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class author_model extends CI_Model
{
	public function author_getAll()
	{
		$query = $this->db->query("SELECT * FROM author");
		return $query;
	}

	public function author_getById($id)
	{
		$query = $this->db->query("SELECT * FROM author WHERE author_id=$id");
		return $query;
	}

	public function author_insert($table,$data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function author_update($id, $table, $data)
	{
		$query = $this->db->where('author_id', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function author_delete($table,$id)
	{
		$query = $this->db->where('author_id', $id);
		$query = $this->db->delete($table);
		return $query;
	}

	public function author_cek($email)
	{
		$query = $this->db->query("SELECT email FROM author where email='$email'");
		return $query->result_array();
	}
}
?>