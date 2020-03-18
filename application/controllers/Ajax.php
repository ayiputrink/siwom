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

	public function hapus_user(){
		$this->load->model('user_m');
		$where = array('id_user' => $this->input->post('id_user'));
		$user = $this->user_m->delete();
		echo json_encode($user);
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
