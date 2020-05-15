<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		// var_dump($sesi);
		// die();
        if($sesi == null) {
			$this->session->set_flashdata('status_login_gagal', 'Maaf Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        } else if($sesi->hak_akses == 'admin') {
			redirect('admin');
		} else {
			$this->load->model('user_m');
			$this->load->model('tugas_m');
			$this->load->model('bagian_m');
            $user = $this->session->userdata('user');
            if($user->status == 'active') {
				if($user->id_jabatan == 1){
					$tugas = $this->tugas_m->read_where(array('kepada' => $user->id_user))->num_rows();
					$tugas_belum = $this->tugas_m->read_where(array('status_tugas' => 'belum selesai','kepada' => $user->id_user))->num_rows();
					$tugas_selesai = $this->tugas_m->read_where(array('status_tugas' => 'selesai','kepada' => $user->id_user))->num_rows();
					$data_bagian = $this->bagian_m->read_where(array('id_bagian' => $this->session->userdata('user')->id_bagian))->result_array();
					$data = array(
						'konten' => 'karyawan/home_karyawan',
						'tugas' => $tugas,
						'tugas_belum' => $tugas_belum,
						'tugas_selesai' => $tugas_selesai,
						'data_bagian' => $data_bagian
					);
					$this->load->view('_partials/template',$data);
				} else if ($user->id_jabatan == 2) {
					$total_karyawan = $this->user_m->read_where(array('id_bagian' => $user->id_bagian,'id_jabatan' => 1))->num_rows();
					$tugas = $this->tugas_m->read_where(array('dari' => $user->id_user))->num_rows();
					$tugas_belum = $this->tugas_m->read_where(array('dari' => $user->id_user,'status_tugas' => 'belum selesai'))->num_rows();
					$tugas_selesai = $this->tugas_m->read_where(array('dari' => $user->id_user,'status_tugas' => 'selesai'))->num_rows();
					$data_karyawan = $this->user_m->read_full_where(array('user.id_bagian' => $user->id_bagian,'user.id_jabatan' => 1))->result_array();
					$data_bagian = $this->bagian_m->read_where(array('id_bagian' => $this->session->userdata('user')->id_bagian))->result_array(); 
					$data = array(
						'konten' => 'manajer/home_manajer',
						'total_karyawan' => $total_karyawan,
						'tugas' => $tugas,
						'tugas_belum' => $tugas_belum,
						'tugas_selesai' => $tugas_selesai,
						'data_karyawan' => $data_karyawan,
						'data_bagian' => $data_bagian
					);
					$this->load->view('_partials/template',$data);
				} 
            } else if ($user->status == 'unverified') {
                redirect('verifikasi');
            } else {
                $this->session->sess_destroy();
                $this->load->view('user/login');
            }
            
        }
		
	}
	
    
}
