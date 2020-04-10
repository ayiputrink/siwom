<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobdesk extends CI_Controller {

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
            'konten' => 'manajer/jobdesk',
            'js'=> 'manajer/js_jobdesk'
        );
        $this->load->view('_partials/template',$data);
	}
	
	public function detail($id_jobdesk){
		$this->load->model('jobdesk_m');
		$user = $this->session->userdata('user');
		$detail = $this->jobdesk_m->read_where(array('id_jobdesk' => $id_jobdesk))->result_array();
		if($detail[0]['dari'] != $user->id_user && $detail[0]['kepada'] != $user->id_user){
			redirect(base_url('jobdesk'));
		} else {
			$jobdesk = $this->jobdesk_m->read_full_where(array('id_jobdesk' => $id_jobdesk))->result_array();
			$data = array(
				'konten' => 'user/detail_jobdesk',
				'parsing' => $jobdesk,
				'js' => 'user/js_detail_jobdesk'
			);
			$this->load->view('_partials/template',$data);
		}
	}

	public function masuk(){
		$data = array(
			'konten' => 'karyawan/jobdesk_masuk',
			'js' => 'karyawan/js_jobdesk_masuk'
		);
		$this->load->view('_partials/template',$data);
	}


}
