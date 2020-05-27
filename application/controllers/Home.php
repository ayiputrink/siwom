<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Phpml\Classification\NaiveBayes;

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
					$data_karyawan_full = array();
					foreach ($data_karyawan as $k => $v) {
						$nama = $v['nama'];
						$jenis_kelamin = $v['jenis_kelamin'];
						$usia = $v['tanggal_lahir'];
						$status_perkawinan = $v['status_perkawinan'];
						$tugas_diterima = $this->tugas_m->read_where(array('kepada' => $v['id_user'],'status_tugas' => 'belum selesai', 'MONTH(created_at)' => 'MONTH(current_date())'))->num_rows();
						$tugas_selesai = $this->tugas_m->read_where(array('kepada' => $v['id_user'],'status_tugas' => 'selesai', 'MONTH(created_at)' => 'MONTH(current_date())'))->num_rows();
						array_push($data_karyawan_full,array(
							'id_user' => $v['id_user'],
							'nama' => $nama,
							'nik' => $v['nik'],
							'beban_kerja' => $this->cek_beban_kerja($jenis_kelamin,$usia,$status_perkawinan,$tugas_diterima,$tugas_selesai)
						));
					}
					$data = array(
						'konten' => 'manajer/home_manajer',
						'total_karyawan' => $total_karyawan,
						'tugas' => $tugas,
						'tugas_belum' => $tugas_belum,
						'tugas_selesai' => $tugas_selesai,
						'data_karyawan' => $data_karyawan_full,
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

	private function cek_beban_kerja($jenis_kelamin, $tanggal_lahir, $status_perkawinan, $tugas_diterima_cek, $tugas_selesai_cek)
	{
		$samples = [
			['L', '20-29', 'kawin', '11-20', '0-10'], //1 
			['P', '20-29', 'belum kawin', '0-10', '0-10'], //2 
			['P', '30-40', 'kawin', '11-20', '11-20'], //3
			['L', '20-29', 'belum kawin', '11-20', '0-10'], //4
			['L', '30-40', 'kawin', '0-10', '11-20'], //5
			['L', '20-29', 'belum kawin', '11-20', '11-20'], //6
			['L', '>40', 'kawin', '11-20', '0-10'], //7
			['L', '30-40', 'kawin', '11-20', '11-20'], //8
			['P', '20-29', 'kawin', '11-20', '11-20'], //9
			['L', '>40', 'Kkawin', '0-10', '11-20'], //10
			['P', '30-40', 'kawin', '0-10', '11-20'], //11
			['L', '20-29', 'belum', '11-20', '11-20'], //12
			['P', '30-40', 'belum kawin', '0-10', '0-10'], //13
			['P', '30-40', 'kawin', '11-20', '0-20'], //14
			['L', '20-29', 'belum kawin', '0-10', '11-20'] //15
		];
		
		$labels = [
			'berat', //1
			'sedang', //2
			'berat', //3
			'sedang', //4
			'berat', //5
			'berat', //6
			'tidak berat', //7
			'berat', //8
			'berat', //9
			'tidak berat', //10
			'berat', //11
			'tidak berat', //12
			'tidak berat', //13
			'berat', //14
			'berat' //15
		];

        $classifier = new NaiveBayes();
        $classifier->train($samples, $labels);

		//echo $classifier->predict(['L', '30-40', 'kawin', '11-20','11-20']);
		
		# object oriented
		$from = new DateTime($tanggal_lahir);
		$to   = new DateTime('today');
		$usia_cek = $from->diff($to)->y;
		if($usia_cek >= 20 && $usia_cek < 30){
			$usia = '20-29';
		} else if ($usia_cek >= 30 && $usia_cek < 40){
			$usia = '30-40';
		} else if($usia_cek >= 40){
			$usia = '>40';
		}

		$tugas_diterima_cek = (int) $tugas_diterima_cek;
 		if($tugas_diterima_cek >= 0 && $tugas_diterima_cek < 11){
			$tugas_diterima = '0-10';
		} else if($tugas_diterima_cek >= 11 && $tugas_diterima_cek < 21) {
			$tugas_diterima = '11-20';
		}

		$tugas_selesai_cek = (int) $tugas_selesai_cek;
		if($tugas_selesai_cek >= 0 && $tugas_selesai_cek < 11){
			$tugas_selesai = '0-10';
		} else if($tugas_selesai_cek >= 11 && $tugas_selesai_cek < 21) {
			$tugas_selesai = '11-20';
		}

		return $classifier->predict([$jenis_kelamin, $usia, $status_perkawinan, $tugas_diterima,$tugas_selesai]);
	}
	
    
}
