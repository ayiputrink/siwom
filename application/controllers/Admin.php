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
			redirect(base_url('admin/dashboard'));
		}
	}

	private function cek_login(){
		$sesi = $this->session->userdata('user');
		if($sesi == null) {
			redirect(base_url('admin'));
		}
	}

	public function dashboard(){
		$this->cek_login();
		$this->load->model('user_m');
		$this->load->model('tugas_m');
		$this->load->model('data_training_m');
		$total_user = $this->user_m->read()->num_rows();
		$data_training = $this->data_training_m->read()->num_rows();
		$unverified = $this->user_m->read_where(array('status' => 'unverified'))->num_rows();
		$blocked = $this->user_m->read_where(array('status' => 'suspend'))->num_rows();
		$tugas = $this->tugas_m->read()->num_rows();
		$data = array(
			'konten' => 'admin/home',
			'total_user' => $total_user,
			'unverified' => $unverified,
			'blocked' => $blocked,
			'tugas' => $tugas,
			'data_training' => $data_training
		);
		$this->load->view('_partials/template',$data);
	}

	public function lupa_password()
	{
		$this->load->view('admin/lupa_password');
	}

	public function kelola_user(){
		$this->cek_login();
		$this->load->model('user_m');
		$data_user = $this->user_m->read()->result_array();
		$data = array(
			'konten' => 'admin/kelola_user',
			'js' => 'admin/js_kelola_user',
			'data_user' => $data_user
		);
		$this->load->view('_partials/template',$data);
	}

}
