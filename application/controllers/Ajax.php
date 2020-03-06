<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

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
	public function get_bagian(){
        $this->load->model('bagian_m');
        $id_divisi = $this->input->post('id_divisi');
        $where = array('id_divisi' => $id_divisi);
        $bagian = $this->bagian_m->read_where($where)->result_array();
        echo json_encode($bagian);
	}
	
	public function get_jabatan(){
        $this->load->model('jabatan_m');
        $jabatan = $this->jabatan_m->read()->result_array();
        echo json_encode($jabatan);
	}

	public function get_all_divisi(){
		$this->load->model('divisi_m');
		$divisi = $this->divisi_m->read()->result_array();
		echo json_encode($divisi);	
	}

	public function get_detail_user(){
		$this->load->model('user_m');
		$id_user = $this->input->post('id_user');
		$user = $this->user_m->read_full_where(array('user.id_user' => $id_user))->result_array();
		echo json_encode($user);
	}

	public function aktifkan_user(){
		$this->load->model('user_m');
		$id_user = $this->input->post('id_user');
		$user = $this->user_m->update(array('status' => 'active'),array('id_user' => $id_user));
		echo json_encode($user);
	}

	public function blokir_user(){
		$this->load->model('user_m');
		$id_user = $this->input->post('id_user');
		$user = $this->user_m->update(array('status' => 'suspend'),array('id_user' => $id_user));
		echo json_encode($user);
	}
}
