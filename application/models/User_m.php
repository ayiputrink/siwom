<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends Base_m {

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
	public $table = 'user';

	public function read_full(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jabatan','jabatan.id_jabatan = '.$this->table.'.id_jabatan');
		$this->db->join('divisi','divisi.id_divisi = '.$this->table.'.id_divisi');
		$this->db->join('bagian','bagian.id_bagian = '.$this->table.'.id_bagian');
		return $this->db->get();
	}

	public function read_full_where($where){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jabatan','jabatan.id_jabatan = '.$this->table.'.id_jabatan','left');
		$this->db->join('divisi','divisi.id_divisi = '.$this->table.'.id_divisi','left');
		$this->db->join('bagian','bagian.id_bagian = '.$this->table.'.id_bagian','left');
		$this->db->where($where);
		return $this->db->get();
	}
    
}
