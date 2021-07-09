<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class book_category_model extends CI_Model
{
	public function book_category_getAll()
	{
		$query = $this->db->query("SELECT * FROM book_category");
		return $query;
	}

	public function book_category_getById($id)
	{
		$query = $this->db->query("SELECT * FROM book_category WHERE book_category_id=$id");
		return $query;
	}

	public function book_category_insert($table,$data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function book_category_update($id, $table, $data)
	{
		$query = $this->db->where('book_category_id', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function book_category_delete($table,$id)
	{
		$query = $this->db->where('book_category_id', $id);
		$query = $this->db->delete($table);
		return $query;
	}

	public function book_category_cek($name)
	{
		$query = $this->db->query("SELECT name FROM book_category where name='$name'");
		return $query->result_array();
	}
}
?>