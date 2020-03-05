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
            $this->load->view('user/login');
        } else if($sesi->hak_akses == 'admin') {
			redirect('admin');
		} else {
            $this->load->model('user_m');
            $user = $this->session->userdata('user');
            if($user->status == 'active') {
                $data = array(
					'konten' => 'user/home'
				);
				$this->load->view('_partials/template',$data);
            } else if ($user->status == 'unverified') {
                redirect('verifikasi');
            } else {
                $this->session->sess_destroy();
                $this->load->view('user/login');
            }
            
        }
		
	}
	
	public function coba(){
		var_dump($this->session->userdata('user'));
	}
    
}
