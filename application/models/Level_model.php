<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class level_model extends CI_Model
{
	public function level_getAll()
	{
		$query = $this->db->query("SELECT * FROM level");
		return $query;
	}

	public function level_getById($id)
	{
		$query = $this->db->query("SELECT * FROM level where level_id = $id");
		return $query;
	}

	public function level_insert($table,$data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function level_update($id, $table, $data)
	{
		$query = $this->db->where('level_id', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function level_delete($table,$id)
	{
		$query = $this->db->where('level_id', $id);
		$query = $this->db->delete($table);
		return $query;
	}

	public function level_cek($name)
	{
		$query = $this->db->query("SELECT name FROM level where name='$name'");
		return $query->result_array();
	}
}
?>