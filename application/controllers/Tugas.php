<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

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
	public function karyawan(){
        $data = array(
            'konten' => 'manajer/tugas',
            'js'=> 'manajer/js_tugas'
        );
        $this->load->view('_partials/template',$data);
	}
	
	public function detail($id_tugas){
		$this->load->model('tugas_m');
		$user = $this->session->userdata('user');
		$detail = $this->tugas_m->read_where(array('id_tugas' => $id_tugas))->result_array();
		if($detail[0]['dari'] != $user->id_user && $detail[0]['kepada'] != $user->id_user){
			redirect(base_url('tugas'));
		} else {
			$tugas = $this->tugas_m->read_full_where(array('id_tugas' => $id_tugas))->result_array();
			$data = array(
				'konten' => 'user/detail_tugas',
				'parsing' => $tugas,
				'js' => 'user/js_detail_tugas'
			);
			$this->load->view('_partials/template',$data);
		}
	}

	public function masuk(){
		$data = array(
			'konten' => 'karyawan/tugas_masuk',
			'js' => 'karyawan/js_tugas_masuk'
		);
		$this->load->view('_partials/template',$data);
	}


}
