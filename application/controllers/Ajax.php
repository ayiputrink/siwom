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

	 public function test(){
		 $this->load->model('user_m');
		 $user = $this->user_m->read_beban()->result_array();
		 echo json_encode($user);
	 }

	public function get_all_beban($id_bagian){
		$this->load->model('user_m');
		$where = array(
			'id_jabatan' => 1,
			'id_bagian' => $id_bagian
		);
		 $user = $this->user_m->read_beban_where($where)->result_array();
		 echo json_encode($user);
	}

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

	public function update_tugas(){
		$this->load->model('tugas_m');
		$id_tugas = $this->input->post('id_tugas');
		$where = array('id_tugas' => $id_tugas); 
		$deadline = $this->input->post('deadline');
		$deadline = explode('/',$deadline);
		$deadline = "$deadline[2]-$deadline[0]-$deadline[1]";
		$data = $this->input->post();
		$data['deadline'] = $deadline;
		unset($data['id_tugas']);
		if($this->upload_file('tugas','lampiran','lampiran/') != null) {
			$data['lampiran'] = $this->upload_file('tugas','lampiran','lampiran/');
		} else {
			unset($data['lampiran']);
		}
		$tugas = $this->tugas_m->update($data,$where);
		echo json_encode($tugas);
	}

	public function insert_tugas(){
		$this->load->model('tugas_m');
		$data = $this->input->post();
		$tanggal = explode('/',$data['deadline']);
		$tanggal = "$tanggal[2]-$tanggal[0]-$tanggal[1]";
		$data['deadline'] = $tanggal;
		$data['dari'] = $this->session->userdata('user')->id_user;
		unset($data['id_tugas']);
		if($this->upload_file('tugas','lampiran','lampiran/') != null) {
			$data['lampiran'] = $this->upload_file('tugas','lampiran','lampiran/');
		}
		$tugas = $this->tugas_m->create($data);
		//notifikasi
		$this->load->model('notifikasi_m');
		$nama_user = $this->session->userdata('user')->nama;
		$judul = $data['judul'];
		$data_notifikasi = array(
			'id_user' => $data['kepada'],
			'jenis_notifikasi' => 'tugas',
			'isi_notifikasi' => "$nama_user memberi anda tugas $judul",
			'id_link' => $this->db->insert_id()
		);
		$this->notifikasi_m->create($data_notifikasi);
		echo json_encode($tugas);
	}

	public function get_all_tugas($id_bagian){
		$this->load->model('tugas_m');
		$tugas = $this->tugas_m->read_full_where(array('us1.id_bagian' => $id_bagian))->result_array();
		echo json_encode($tugas);
	}

	public function get_tugas_masuk(){
		$this->load->model('tugas_m');
		$id_user = $this->session->userdata('user')->id_user;
		$tugas = $this->tugas_m->read_full_where(array('us1.id_user' => $id_user))->result_array();
		echo json_encode($tugas);
	}

	public function get_tugas_belum($id_bagian){
		$this->load->model('tugas_m');
		$tugas = $this->tugas_m->read_full_where(array('us1.id_bagian' => $id_bagian,'status_tugas' => 'belum selesai'))->result_array();
		echo json_encode($tugas);
	}

	public function get_tugas_selesai($id_bagian){
		$this->load->model('tugas_m');
		$tugas = $this->tugas_m->read_full_where(array('id_bagian' => $id_bagian,'status_tugas' => 'selesai'))->result_array();
		echo json_encode($tugas);
	}

	public function get_tugas_detail(){
		$this->load->model('tugas_m');
		$id_tugas = $this->input->post('id_tugas');
		$tugas = $this->tugas_m->read_full_where(array('id_tugas' => $id_tugas))->result_array();
		echo json_encode($tugas);
	}

	public function delete_tugas(){
		$this->load->model('tugas_m');
		$where = array('id_tugas' => $this->input->post('id_tugas'));
		$tugas = $this->tugas_m->delete($where);
		echo json_encode($tugas);
	}

	public function delete_item_tugas(){
		$this->load->model('item_tugas_m');
		$where = array('id_item_tugas' => $this->input->post('id_item_tugas'));
		$tugas = $this->item_tugas_m->delete($where);
		echo json_encode($tugas);
	}

	public function delete_assign_tugas(){
		$this->load->model('assign_tugas_m');
		$where = array('id_assign' => $this->input->post('id_assign'));
		$assignment = $this->assign_tugas_m->delete($where);
		echo json_encode($assignment);
	}

	public function delete_komentar(){
		$this->load->model('komentar_tugas_m');
		$where = array('id_komentar' => $this->input->post('id_komentar'));
		$komentar = $this->komentar_tugas_m->delete($where);
		echo json_encode($komentar);
	}

	public function update_item_tugas(){
		$this->load->model('item_tugas_m');
		$where = array('id_item_tugas' => $this->input->post('id_item_tugas'));
		$data = $this->input->post();
		$tugas = $this->item_tugas_m->update($data,$where);
		echo json_encode($tugas);
	}

	public function update_user(){
		$this->load->model('user_m');
		//echo var_dump($this->input->post());
		//die();
		$id_user = $this->input->post('id_user');
		$data = array(
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'status_perkawinan' => $this->input->post('status_perkawinan'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'id_jabatan' => $this->input->post('id_jabatan'),
			'id_divisi' => $this->input->post('id_divisi'),
			'id_bagian' => $this->input->post('id_bagian')
		);
		if($this->upload_foto('nametag_'.$id_user,'nametag','user/') != null) {
			$data['nametag'] = $this->upload_foto('nametag_'.$id_user,'nametag','user/');
		}
		$user = $this->user_m->update($data,array('id_user' => $id_user));
		echo json_encode($user);
	}

	public function insert_user(){
		$this->load->model('user_m');
		$data = array(
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'status_perkawinan' => $this->input->post('status_perkawinan'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'id_jabatan' => $this->input->post('id_jabatan'),
			'id_divisi' => $this->input->post('id_divisi'),
			'id_bagian' => $this->input->post('id_bagian')
		);
		if($this->upload_foto('nametag_','nametag','user/') != null) {
			$data['nametag'] = $this->upload_foto('nametag_','nametag','user/');
		}
		$user = $this->user_m->create($data);
		echo json_encode($user);
	}

	public function get_all_user(){
		$this->load->model('user_m');
		$user = $this->user_m->read()->result_array();
		echo json_encode($user);
	}

	public function datatables_user(){
		$this->load->model('user_m');
		$data = array();
		foreach ($this->user_m->read()->result_array() as $key => $value) {
			array_push($data,array_values($value));
		}
		$user = array('data' => $data);
		echo json_encode($user);
	}

	public function delete_user(){
		$this->load->model('user_m');
		$where = array('id_user' => $this->input->post('id_user'));
		$user = $this->user_m->delete($where);
		echo json_encode($user);
	}

	public function insert_assignment(){
		$this->load->model('assign_tugas_m');
		$data = $this->input->post();
		if($this->upload_file('assign','lampiran','lampiran_assignment/') != null) {
			$data['lampiran'] = $this->upload_file('assign','lampiran','lampiran_assignment/');
		}
		$assignment = $this->assign_tugas_m->create($data);

		$this->load->model('tugas_m');
		$data_tugas = $this->tugas_m->read_where(array('id_tugas' => $data['id_tugas']))->result_array();
		//notifikasi
		$this->load->model('notifikasi_m');
		$nama_user = $this->session->userdata('user')->nama;
		$judul = $data_tugas[0]['judul'];
		$data_notifikasi = array(
			'id_user' => $data_tugas[0]['dari'],
			'jenis_notifikasi' => 'tugas',
			'isi_notifikasi' => "$nama_user menyerahkan tugas $judul",
			'id_link' => $data['id_tugas']
		);
		$this->notifikasi_m->create($data_notifikasi);
		echo json_encode($assignment);
	}

	public function get_assign(){
		$this->load->model('assign_tugas_m');
		$assignment = $this->assign_tugas_m->read()->result_array();
		echo json_encode($assignment);
	}

	public function get_assign_where($id_tugas){
		$this->load->model('assign_tugas_m');
		$assignment = $this->assign_tugas_m->read_where(array('assign_tugas.id_tugas' => $id_tugas))->result_array();
		echo json_encode($assignment);
	}

	public function insert_komentar(){
		$this->load->model('komentar_tugas_m');
		$this->load->model('notifikasi_m');
		$this->load->model('tugas_m');
		$data = $this->input->post();
		$tugas = $this->tugas_m->read_where(array('id_tugas' => $data['id_tugas']))->result_array();
		if($this->session->userdata('user')->id_jabatan == 1) {
			$user_tujuan = $tugas[0]['dari'];
		} else if ($this->session->userdata('user')->id_jabatan == 2) {
			$user_tujuan = $tugas[0]['kepada'];
		}
		$komentar = $this->komentar_tugas_m->create($data);
		$nama = $this->session->userdata('user')->nama;
		$judul = $tugas[0]['judul'];
		$data_notifikasi = array(
			'id_user' => $user_tujuan,
			'jenis_notifikasi' => 'komentar',
			'isi_notifikasi' => "$nama memberikan komentar pada tugas $judul",
			'id_link' => $data['id_tugas']
		);
		$this->notifikasi_m->create($data_notifikasi);
		echo json_encode($komentar);
	}

	public function get_komentar(){
		$this->load->model('komentar_tugas_m');
		$id_tugas = $this->input->post('id_tugas');
		$komentar = $this->komentar_tugas_m->read_full_where(array('id_tugas' => $id_tugas))->result_array();
		echo json_encode($komentar);
	}

	public function insert_item_tugas(){
		$this->load->model('item_tugas_m');
		$data = $this->input->post();
		$item = $this->item_tugas_m->create($data);
		echo json_encode($item);
	}

	public function get_item_tugas(){
		$this->load->model('item_tugas_m');
		$id_tugas = $this->input->post('id_tugas');
		$item = $this->item_tugas_m->read_where(array('id_tugas' => $id_tugas))->result_array();
		echo json_encode($item);
	}

	public function get_notifikasi(){
		$this->load->model('notifikasi_m');
		$id_user = $this->session->userdata('user')->id_user;
		$notifikasi = $this->notifikasi_m->read_where_reverse(array('id_user' => $id_user,'status_notifikasi' => 'diterima'))->result_array();
		echo json_encode($notifikasi);
	}

	private function upload_file($nama,$form,$direktori){
        $config['upload_path']          = './upload/'.$direktori;
        $config['allowed_types']        = 'zip|doc|xls|pdf|rar|gif|jpg|png|jpeg';
        $config['file_name']            = $nama;
        $config['overwrite']			= true;
        $config['max_size']             = 20000; // 1MB
        $config['encrypt_name'] = TRUE;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($form)) {
            return $this->upload->data("file_name");
        }
        
        return null;
    }

	private function upload_foto($nama,$form,$direktori){
        $config['upload_path']          = './upload/'.$direktori;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $nama;
        $config['overwrite']			= true;
        $config['max_size']             = 2048; // 1MB
        $config['encrypt_name'] = TRUE;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($form)) {
            return $this->upload->data("file_name");
        }
        
        return null;
    }
}
