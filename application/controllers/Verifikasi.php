<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

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
        if($this->session->userdata('user') == null){
            $this->session->set_flashdata('status_login', 'Anda harus verifikasi data terlebih dahulu');
            redirect(base_url('login'));
        }
        $id_user = $this->session->userdata('user')->id_user;
        $this->load->model('divisi_m');
        $this->load->model('jabatan_m');
        $this->load->model('user_m');
        $user = $this->user_m->read_where(array('id_user' => $id_user))->row();
        $divisi = $this->divisi_m->read()->result_array();
        $jabatan = $this->jabatan_m->read()->result_array();
        $data = array(
            'konten' => 'user/verify',
            'divisi' => $divisi,
            'jabatan' => $jabatan,
            'user' => $user,
            'js' => 'admin/js_kelola_user'
        );
        $this->load->view('_partials/template',$data);
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
    
    public function aksi_verifikasi(){
        $this->load->model('user_m');
        $id_user = $this->session->userdata('user')->id_user;
        $nik = $this->input->post('nik');
        $alamat = $this->input->post('alamat');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $status_perkawinan = $this->input->post('status_perkawinan');
        $id_jabatan = $this->input->post('id_jabatan');
        $id_divisi = $this->input->post('id_divisi');
        $id_bagian = $this->input->post('id_bagian');
        $nametag = $this->input->post('nametag');
        $foto = $this->input->post('foto');
        $data = array(
            'nik' => $nik,
            'alamat' => $alamat,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'status_perkawinan' => $status_perkawinan,
            'id_jabatan' => $id_jabatan,
            'id_divisi' => $id_divisi,
            'id_bagian' => $id_bagian
        );
        $where = array(
            'id_user' => $id_user
        );
        $data['nametag'] = $this->upload_foto('nametag_'.$id_user,'nametag','user/');
        //var_dump($data);
        //var_dump($where);
        $this->user_m->update($data,$where);
        redirect('verifikasi');
    }
}
