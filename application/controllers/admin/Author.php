<?php
defined('BASEPATH') or exit('No direct script access allowed');

class author extends CI_Controller {
	public function __construct()
	{
		parent ::__construct();
		#Load model, helper dan library
		$this->load->model('author_model');
	}
	public function index()
	{
		$data['author'] = $this->author_model->author_getAll();
		$this->load->view('admin/author/v_Author',$data);
	}

	public function add()
	{
		$fullname =  strip_tags($this->input->post('i_fullname'));
		$email = strip_tags($this->input->post('i_email'));

		//Input Array
		$data = array(
			'fullname' 	=> $fullname, 
			'email' 	=> $email 
		);

		//Insert ke Database
		$x = $this->author_model->author_cek($email);
		if ($x == Null) {
			$this->author_model->author_insert('author', $data);
			echo '<script language=JavaScript>alert("Input Berhasil"); onclick=location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Author telah tersimpan sebelumnya"); onclick=history.go(-1)</script>';
		}
	}

	public function edit($id)
	{
		$data['author'] = $this->author_model->author_getById($id);
		$fullname = strip_tags($this->input->post('i_fullname'));
		$email = strip_tags($this->input->post('i_email'));

		//Input Array
		$data = array(
			'fullname' 	=> $fullname, 
			'email' 	=> $email,
		);

		//Insert ke Database
		$x = $this->author_model->author_cek($email);
		if ($x == Null) {
			$this->author_model->author_update($id,'author',$data);
			echo '<script language=JavaScript>alert("Update Berhasil"); onclick=location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Author telah tersimpan sebelumnya"); onclick=history.go(-1)</script>';
		}
	}

	public function delete($id)
	{
		$this->author_model->author_delete('author',$id);
		echo '<script language=JavaScript>alert("Delete Berhasil!"); onclick=history.go(-1)</script>';
	}

}

?>