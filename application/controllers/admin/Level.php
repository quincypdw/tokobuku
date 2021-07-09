<?php
defined('BASEPATH') or exit('No direct script access allowed');

class level extends CI_Controller {
	public function __construct()
	{
		parent ::__construct();
		#Load model, helper dan library
		$this->load->model('level_model');
	}
	public function index()
	{
		$data['level'] = $this->level_model->level_getAll();
		$this->load->view('admin/level/v_level',$data);
	}

	public function level_insert($table,$data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function level_update($id,$table,$data)
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

	public function add()
	{
		$name =  strip_tags($this->input->post('i_name'));

		//Input Array
		$data = array(
			'name' 	=> $name
		);

		//Insert ke Database
		$x = $this->level_model->level_cek($name);
		if ($x == Null) {
			$this->level_model->level_insert('level', $data);
			echo '<script language=JavaScript>alert("Input Berhasil"); onclick=location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Author telah tersimpan sebelumnya"); onclick=history.go(-1)</script>';
		}
	}

	public function edit($id)
	{
		$data['level'] = $this->level_model->level_getById($id);
		$name =  strip_tags($this->input->post('i_name'));

		//Input Array
		$data = array(
			'name' 	=> $name
		);

		//Insert ke Database
		$x = $this->level_model->level_cek($email);
		if ($x == Null) {
			$this->level_model->level_update($id,'level',$data);
			echo '<script language=JavaScript>alert("Update Berhasil"); onclick=location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Author telah tersimpan sebelumnya"); onclick=history.go(-1)</script>';
		}
	}

	public function delete($id)
	{
		$this->level_model->level_delete('level',$id);
		echo '<script language=JavaScript>alert("Delete Berhasil!"); onclick=history.go(-1)</script>';
	}
	

}

?>