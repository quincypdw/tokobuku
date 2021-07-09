<?php
defined('BASEPATH') or exit('No direct script access allowed');

class customer extends CI_Controller {
	public function __construct()
	{
		parent ::__construct();
		#Load model, helper dan library
		$this->load->model('customer_model');
	}
	public function index()
	{
		$data['customer'] = $this->customer_model->customer_getAll();
		$this->load->view('admin/customer/v_customer',$data);
	}

	public function customer_insert($table,$data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function customer_update($id,$table,$data)
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

	public function add()
	{
		$name =  strip_tags($this->input->post('i_name'));
		$email = strip_tags($this->input->post('i_email'));
		$no_member =  strip_tags($this->input->post('i_no_member'));
		$gender =  strip_tags($this->input->post('i_gender'));
		$phone =  strip_tags($this->input->post('i_phone'));
		$address =  strip_tags($this->input->post('i_address'));

		//Input Array
		$data = array(
			'name' 	=> $name, 
			'email' 	=> $email,
			'no_member' => $no_member,
			'gender'  => $gender,
			'phone'  => $phone,
			'address'  => $address
		);

		//Insert ke Database
		$x = $this->customer_model->customer_cek($email);
		if ($x == Null) {
			$this->customer_model->customer_insert('customer', $data);
			echo '<script language=JavaScript>alert("Input Berhasil"); onclick=location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Author telah tersimpan sebelumnya"); onclick=history.go(-1)</script>';
		}
	}

	public function edit($id)
	{
		$data['customer'] = $this->customer_model->customer_getById($id);
		$name =  strip_tags($this->input->post('i_name'));
		$email = strip_tags($this->input->post('i_email'));
		$no_member =  strip_tags($this->input->post('i_no_member'));
		$gender =  strip_tags($this->input->post('i_gender'));
		$phone =  strip_tags($this->input->post('i_phone'));
		$address =  strip_tags($this->input->post('i_address'));

		//Input Array
		$data = array(
			'name' 	=> $name, 
			'email' 	=> $email,
			'no_member' => $no_member,
			'gender'  => $gender,
			'phone'  => $phone,
			'address'  => $address
		);

		//Insert ke Database
		$x = $this->customer_model->customer_cek($email);
		if ($x == Null) {
			$this->customer_model->customer_update($id,'customer',$data);
			echo '<script language=JavaScript>alert("Update Berhasil"); onclick=location.href = document.referrer</script>';
		} else {
			echo '<script language=JavaScript>alert("Gagal!! Author telah tersimpan sebelumnya"); onclick=history.go(-1)</script>';
		}
	}

	public function delete($id)
	{
		$this->customer_model->customer_delete('customer',$id);
		echo '<script language=JavaScript>alert("Delete Berhasil!"); onclick=history.go(-1)</script>';
	}

}

?>