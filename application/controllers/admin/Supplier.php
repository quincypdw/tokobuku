<?php
defined('BASEPATH') or exit('No direct script access allowed');

class supplier extends CI_Controller {
	public function __construct()
	{
		parent ::__construct();
		#Load model, helper dan library
		$this->load->model('supplier_model');
	}
	public function index()
	{
		$data['supplier'] = $this->supplier_model->supplier_getAll();
		$this->load->view('admin/supplier/v_supplier',$data);
	}

	public function supplier_insert($table,$data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function supplier_update($id,$table,$data)
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

	public function add()
	{
		$name =  strip_tags($this->input->post('i_name'));
		$email = strip_tags($this->input->post('i_email'));
		$phone =  strip_tags($this->input->post('i_phone'));
		$address =  strip_tags($this->input->post('i_address'));

		//Input Array
		$data = array(
			'name' 	=> $name, 
			'email' 	=> $email,
			'phone'  => $phone,
			'address'  => $address
		);

		//Insert ke Database
		$x = $this->supplier_model->supplier_cek($email);
		if ($x == Null) {
			$this->supplier_model->supplier_insert('supplier', $data);
			echo '<script language=JavaScript>alert("Input Berhasil"); onclick=location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Author telah tersimpan sebelumnya"); onclick=history.go(-1)</script>';
		}
	}

	public function edit($id)
	{
		$data['supplier'] = $this->supplier_model->supplier_getById($id);
		$name =  strip_tags($this->input->post('i_name'));
		$email = strip_tags($this->input->post('i_email'));
		$phone =  strip_tags($this->input->post('i_phone'));
		$address =  strip_tags($this->input->post('i_address'));

		//Input Array
		$data = array(
			'name' 	=> $name, 
			'email' 	=> $email,
			'phone'  => $phone,
			'address'  => $address
		);

		//Insert ke Database
		$x = $this->supplier_model->supplier_cek($email);
		if ($x == Null) {
			$this->supplier_model->supplier_update($id,'supplier',$data);
			echo '<script language=JavaScript>alert("Update Berhasil"); onclick=location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Author telah tersimpan sebelumnya"); onclick=history.go(-1)</script>';
		}
	}

	public function delete($id)
	{
		$this->supplier_model->supplier_delete('supplier',$id);
		echo '<script language=JavaScript>alert("Delete Berhasil!"); onclick=history.go(-1)</script>';
	}

}

?>