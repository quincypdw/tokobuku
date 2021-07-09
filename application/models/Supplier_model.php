<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class supplier_model extends CI_Model
{
	public function supplier_getAll()
	{
		$query = $this->db->query("SELECT * FROM supplier");
		return $query;
	}

	public function supplier_getById($id)
	{
		$query = $this->db->query("SELECT * FROM supplier WHERE supplier_id=$id");
		return $query;
	}

	public function supplier_insert($table,$data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function supplier_update($id, $table, $data)
	{
		$query = $this->db->where('supplier_id', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function supplier_delete($table,$id)
	{
		$query = $this->db->where('supplier_id', $id);
		$query = $this->db->delete($table);
		return $query;
	}

	public function supplier_cek($email)
	{
		$query = $this->db->query("SELECT email FROM supplier where email='$email'");
		return $query->result_array();
	}
}
?>