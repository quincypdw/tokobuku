<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class customer_model extends CI_Model
{
	public function customer_getAll()
	{
		$query = $this->db->query("SELECT * FROM customer");
		return $query;
	}

	public function customer_getById($id)
	{
		$query = $this->db->query("SELECT * FROM customer WHERE customer_id=$id");
		return $query;
	}

	public function customer_insert($table,$data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function customer_update($id, $table, $data)
	{
		$query = $this->db->where('customer_id', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function customer_delete($table,$id)
	{
		$query = $this->db->where('customer_id', $id);
		$query = $this->db->delete($table);
		return $query;
	}

	public function customer_cek($email)
	{
		$query = $this->db->query("SELECT email FROM customer where email='$email'");
		return $query->result_array();
	}
}
?>