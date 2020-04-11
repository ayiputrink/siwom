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

	public function update_jobdesk(){
		$this->load->model('jobdesk_m');
		$id_jobdesk = $this->input->post('id_jobdesk');
		$where = array('id_jobdesk' => $id_jobdesk); 
		$deadline = $this->input->post('deadline');
		$deadline = explode('/',$deadline);
		$deadline = "$deadline[2]-$deadline[0]-$deadline[1]";
		$data = $this->input->post();
		$data['deadline'] = $deadline;
		unset($data['id_jobdesk']);
		if($this->upload_file('jobdesk','lampiran','lampiran/') != null) {
			$data['lampiran'] = $this->upload_file('jobdesk','lampiran','lampiran/');
		} else {
			unset($data['lampiran']);
		}
		$jobdesk = $this->jobdesk_m->update($data,$where);
		echo json_encode($jobdesk);
	}

	public function insert_jobdesk(){
		$this->load->model('jobdesk_m');
		$data = $this->input->post();
		$tanggal = explode('/',$data['deadline']);
		$tanggal = "$tanggal[2]-$tanggal[0]-$tanggal[1]";
		$data['deadline'] = $tanggal;
		$data['dari'] = $this->session->userdata('user')->id_user;
		unset($data['id_jobdesk']);
		if($this->upload_file('jobdesk','lampiran','lampiran/') != null) {
			$data['lampiran'] = $this->upload_file('jobdesk','lampiran','lampiran/');
		}
		$jobdesk = $this->jobdesk_m->create($data);
		echo json_encode($jobdesk);
	}

	public function get_all_jobdesk($id_bagian){
		$this->load->model('jobdesk_m');
		$jobdesk = $this->jobdesk_m->read_full_where(array('us1.id_bagian' => $id_bagian))->result_array();
		echo json_encode($jobdesk);
	}

	public function get_jobdesk_masuk(){
		$this->load->model('jobdesk_m');
		$id_user = $this->session->userdata('user')->id_user;
		$jobdesk = $this->jobdesk_m->read_full_where(array('us1.id_user' => $id_user))->result_array();
		echo json_encode($jobdesk);
	}

	public function get_jobdesk_belum($id_bagian){
		$this->load->model('jobdesk_m');
		$jobdesk = $this->jobdesk_m->read_full_where(array('us1.id_bagian' => $id_bagian,'status_jobdesk' => 'belum selesai'))->result_array();
		echo json_encode($jobdesk);
	}

	public function get_jobdesk_selesai($id_bagian){
		$this->load->model('jobdesk_m');
		$jobdesk = $this->jobdesk_m->read_full_where(array('id_bagian' => $id_bagian,'status_jobdesk' => 'selesai'))->result_array();
		echo json_encode($jobdesk);
	}

	public function get_jobdesk_detail(){
		$this->load->model('jobdesk_m');
		$id_jobdesk = $this->input->post('id_jobdesk');
		$jobdesk = $this->jobdesk_m->read_full_where(array('id_jobdesk' => $id_jobdesk))->result_array();
		echo json_encode($jobdesk);
	}

	public function delete_jobdesk(){
		$this->load->model('jobdesk_m');
		$where = array('id_jobdesk' => $this->input->post('id_jobdesk'));
		$jobdesk = $this->jobdesk_m->delete($where);
		echo json_encode($jobdesk);
	}

	public function delete_item_jobdesk(){
		$this->load->model('item_jobdesk_m');
		$where = array('id_item_jobdesk' => $this->input->post('id_item_jobdesk'));
		$jobdesk = $this->item_jobdesk_m->delete($where);
		echo json_encode($jobdesk);
	}

	public function delete_assign_jobdesk(){
		$this->load->model('assign_jobdesk_m');
		$where = array('id_assign' => $this->input->post('id_assign'));
		$assignment = $this->assign_jobdesk_m->delete($where);
		echo json_encode($assignment);
	}

	public function delete_komentar(){
		$this->load->model('komentar_jobdesk_m');
		$where = array('id_komentar' => $this->input->post('id_komentar'));
		$komentar = $this->komentar_jobdesk_m->delete($where);
		echo json_encode($komentar);
	}

	public function update_item_jobdesk(){
		$this->load->model('item_jobdesk_m');
		$where = array('id_item_jobdesk' => $this->input->post('id_item_jobdesk'));
		$data = $this->input->post();
		$jobdesk = $this->item_jobdesk_m->update($data,$where);
		echo json_encode($jobdesk);
	}

	public function update_user(){
		$this->load->model('user_m');
		//echo var_dump($this->input->post());
		//die();
		$id_user = $this->input->post('id_user');
		$data = array(
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
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
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
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
		$this->load->model('assign_jobdesk_m');
		$data = $this->input->post();
		if($this->upload_file('assign','lampiran','lampiran_assignment/') != null) {
			$data['lampiran'] = $this->upload_file('assign','lampiran','lampiran_assignment/');
		}
		$assignment = $this->assign_jobdesk_m->create($data);
		echo json_encode($assignment);
	}

	public function get_assign(){
		$this->load->model('assign_jobdesk_m');
		$assignment = $this->assign_jobdesk_m->read()->result_array();
		echo json_encode($assignment);
	}

	public function insert_komentar(){
		$this->load->model('komentar_jobdesk_m');
		$data = $this->input->post();
		$komentar = $this->komentar_jobdesk_m->create($data);
		echo json_encode($komentar);
	}

	public function get_komentar(){
		$this->load->model('komentar_jobdesk_m');
		$id_jobdesk = $this->input->post('id_jobdesk');
		$komentar = $this->komentar_jobdesk_m->read_full_where(array('id_jobdesk' => $id_jobdesk))->result_array();
		echo json_encode($komentar);
	}

	public function insert_item_jobdesk(){
		$this->load->model('item_jobdesk_m');
		$data = $this->input->post();
		$item = $this->item_jobdesk_m->create($data);
		echo json_encode($item);
	}

	public function get_item_jobdesk(){
		$this->load->model('item_jobdesk_m');
		$id_jobdesk = $this->input->post('id_jobdesk');
		$item = $this->item_jobdesk_m->read_where(array('id_jobdesk' => $id_jobdesk))->result_array();
		echo json_encode($item);
	}

	private function upload_file($nama,$form,$direktori){
        $config['upload_path']          = './upload/'.$direktori;
        $config['allowed_types']        = 'zip|doc|xls|pdf|rar';
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
        $config['allowed_types']        = 'gif|jpg|png';
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
