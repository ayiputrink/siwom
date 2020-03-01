<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$sesi = $this->session->userdata('id_user');
		if($sesi != null) {
			redirect(base_url().'home','refresh');
		} else {
			$this->load->view('user/login');
		}
		
	}

	public function lupa_password(){
		$this->load->view('user/lupa_password');
	}

	public function aksi_login(){
		$this->load->model('user_m');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$data = array(
			'email' => $email,
			'password' => $password
		);
		$result = $this->user_m->read_where($data);
		if($result->num_rows() > 0) {
			$user = $result->row();
			$user->password = null;
			$sesi = array('user' => $user);
			if($user->status == 'unverified') {
				$this->session->set_userdata($sesi);
				redirect(base_url('home'),'refresh');
			} else if ($user->status == 'active') {	
				$this->session->set_userdata($sesi);
				$this->ouput->cache(10080);
				$this->load->view('home');
			} else {
				$this->session->set_flashdata('status_login_gagal', 'Maaf Akun anda telah diblokir');
				$this->load->view('login');	
			}
		} else {
			$this->session->set_flashdata('status_login_gagal', 'Maaf Email atau Password anda salah');
			redirect('login','refresh');
		}
	}

	public function aksi_logout(){
		$this->session->sess_destroy();
		$this->output->delete_cache('cachecontroller'); 
		redirect('login','refresh');
	}
}
