<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$sesi = $this->session->userdata('user');
		if($sesi == null) {
			$this->load->view('admin/login');
		} else {
			redirect('admin/dashboard');
		}
	}

	public function dashboard(){
		$data = array(
			'konten' => 'admin/home'
		);
		$this->load->view('_partials/template',$data);
	}

	public function lupa_password()
	{
		$this->load->view('admin/lupa_password');
	}

	public function kelola_user(){
		$this->is_login();
		$this->load->model('user_m');
		$data_user = $this->user_m->read()->result_array();
		$data = array(
			'konten' => 'admin/kelola_user',
			'js' => 'admin/js_kelola_user',
			'data_user' => $data_user
		);
		$this->load->view('_partials/template',$data);
	}

	private function is_login() {
		$sesi = $this->session->userdata('user');
		if($sesi == null) {
			redirect('admin');
		}
	}
}
