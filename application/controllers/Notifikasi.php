<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

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
		$this->load->model('notifikasi_m');
		$data = array(
			'konten' => 'user/notifikasi'
		);
		if(isset($this->session->userdata('user')->id_user)){
			$id_user = $this->session->userdata('user')->id_user;
			$notifikasi = $this->notifikasi_m->read_where_reverse(array('id_user' => $id_user));
			$data['parsing'] = $notifikasi;
		}
        $this->load->view('_partials/template',$data);
	}

	public function detail($jenis_notifikasi,$id_notifiksi,$id_link){
		$this->load->model('notifikasi_m');
		$data = array(
			'status_notifikasi' => 'dibaca'
		);
		$where = array(
			'id_notifikasi' => $id_notifiksi
		);
		$this->notifikasi_m->update($data,$where);
		redirect(base_url("tugas/detail/$id_link"));
	}
}
