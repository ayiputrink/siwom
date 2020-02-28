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
        $sesi = $this->session->userdata('id_user');
        if($sesi == null) {
            $this->load->view('user/login');
        } else {
            $this->load->model('user_m');
            $data = array('id_user' => $sesi);
            $result = $this->user_m->read_where($data);
            $user = $result->row();
            if($user->status == 'active') {
                $this->load->view('user/home');
            } else if ($user->status == 'unverified') {
                $this->session->set_flashdata('status_login', 'Anda harus verifikasi data terlebih dahulu');
                $this->load->model('divisi_m');
                $divisi = $this->divisi_m->read()->result_array();
                $data = array(
                    'konten' => 'user/verify',
                    'user' => $user,
                    'divisi' => $divisi
                );
                $this->load->view('_partials/template',$data);
            } else {
                $this->session->sess_destroy();
                $this->load->view('user/login');
            }
            
        }
		
    }
    
    public function aksi_verifikasi(){
        $this->load->model('user_m');
        $nik = $this->input->post('nik');
        $alamat = $this->input->post('alamat');
        $jabatan = $this->input->post('jabatan');
        $divisi = $this->input->post('divisi');
        $bagian = $this->input->post('bagian');
        $nametag = $this->input->post('nametag');
        $foto = $this->input->post('foto');
        $data = array(
            'nik' => $nik,
            'alamat' => $alamat,
            'jabatan' => $jabatan,
            'divisi' => $divisi,
            'bagian' => $bagian,
            'nametag' => $nametag,
            'foto' => $foto
        );
        $where = array(
            'id_user' => $this->session->userdata('id_user')
        );
        var_dump($data);
        var_dump($where);
        //$this->user_m->update($data,$where);
    }
}
