<?php
defined('BASEPATH') or exit('No direct script access allowed');

class authemployee extends CI_Controller {
	public function __construct()
	{
		parent ::__construct();
		#Load model, helper dan library
		$this->load->library('form_validation');
		$this->load->model('level_model');
	}
	public function index()
	{
		// $this->form_validation->set_rules('name','Name','required|trim');
		// $this->form_validation->set_rules('nip','NIP','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		// $this->form_validation->set_rules('phone','Phone','required|trim');
		// $this->form_validation->set_rules('address','Address','required|trim');
		// $this->form_validation->set_rules('gender','Gender','required|trim');
		// $this->form_validation->set_rules('level','Level','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

		if ($this->form_validation->run() == false)
		{
			$data['title'] = 'Login Employee';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
        $password = $this->input->post('password');

        $employee = $this->db->get_where('employee', ['email' => $email])->row();

        if($employee){
        	if(password_verify($password,$employee->password)){
        		$data =[
        			'employee_id' => $employee->employee_id,
        			'email' => $employee->email,
        			'name' => $employee->name,
        			'level_id' => $employee->level_id,
        		];
        		$this->session->set_userdata($data);
        		redirect('admin/overview');
        	}else{
        		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah!!!</div>');
        		redirect('auth');
        	} 
        } else {
        	$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Login gagal!!!</div>');
        	redirect('auth');
        }
	}

	public function registration()
	{
		$this->form_validation->set_rules('name','Name','required|trim');
		// $this->form_validation->set_rules('nip','NIP','required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[employee.email]',['is_unique' => 'Email Sudah Terdaftar!']);
		// $this->form_validation->set_rules('phone','Phone','required|trim');
		// $this->form_validation->set_rules('address','Address','required|trim');
		// $this->form_validation->set_rules('gender','Gender','required|trim');
		// $this->form_validation->set_rules('level','Level','required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',['matches' => 'Password Tidak Sama!','min_length' => 'Password Terlalu Pendek!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false)
		{
			$data['title'] = 'Registrasi Employee';
			$data['level'] = $this->level_model->level_getAll();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/employee_registration');
			$this->load->view('templates/auth_footer');
		}
		else{
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'nip' => htmlspecialchars($this->input->post('nip', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'phone' => htmlspecialchars($this->input->post('phone', true)),
				'address' => htmlspecialchars($this->input->post('address', true)),
				'gender' => htmlspecialchars($this->input->post('gender', true)),
				'level_id' => htmlspecialchars($this->input->post('level_id', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			];

			$this->db->insert('employee', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Karyawan Telah Berhasil!!. Silahkan Login!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('employee_id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('level_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout Telah Berhasil!!. Silahkan Login!</div>');
		redirect('auth');
	}

}