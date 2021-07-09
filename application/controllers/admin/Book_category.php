<?php
defined('BASEPATH') or exit('No direct script access allowed');

class book_category extends CI_Controller {
	public function __construct()
	{
		parent ::__construct();
		#Load model, helper dan library
		$this->load->model('book_category_model');
	}
	public function index()
	{
		$data['book_category'] = $this->book_category_model->book_category_getAll();
		$this->load->view('admin/book_category/v_book_category',$data);
	}

	public function book_category_insert($table,$data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function book_category_update($id,$table,$data)
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

	public function add()
	{
		$name =  strip_tags($this->input->post('i_name'));

		//Input Array
		$data = array(
			'name' 	=> $name
		);

		//Insert ke Database
		$x = $this->book_category_model->book_category_cek($name);
		if ($x == Null) {
			$this->book_category_model->book_category_insert('book_category', $data);
			echo '<script language=JavaScript>alert("Input Berhasil"); onclick=location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Author telah tersimpan sebelumnya"); onclick=history.go(-1)</script>';
		}
	}

	public function edit($id)
	{
		$data['book_category'] = $this->book_category_model->book_category_getById($id);
		$name =  strip_tags($this->input->post('i_name'));

		//Input Array
		$data = array(
			'name' 	=> $name
		);

		//Insert ke Database
		$x = $this->book_category_model->book_category_cek($name);
		if ($x == Null) {
			$this->book_category_model->book_category_update($id,'book_category',$data);
			echo '<script language=JavaScript>alert("Update Berhasil"); onclick=location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Author telah tersimpan sebelumnya"); onclick=history.go(-1)</script>';
		}
	}

	public function delete($id)
	{
		$this->book_category_model->book_category_delete('book_category',$id);
		echo '<script language=JavaScript>alert("Delete Berhasil!"); onclick=history.go(-1)</script>';
	}
	
}

?>