<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobdesk_m extends Base_m {

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
	public $table = 'jobdesk';
	
	public function read_full(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('user','user.id_user = '.$this->table.'.kepada');
		$this->db->order_by('id_user','desc');
		return $this->db->get();
	}

	public function read_full_where($where){
		$this->db->select('*, jobdesk.created_at as created_at_tugas, us1.nama as kepada, us2.nama as dari');
		$this->db->from($this->table);
		$this->db->join('user as us1','us1.id_user = '.$this->table.'.kepada');
		$this->db->join('user as us2','us2.id_user = '.$this->table.'.dari');
		$this->db->where($where);
		$this->db->order_by('jobdesk.created_at','desc');
		$this->db->order_by('us1.id_user','desc');
		return $this->db->get();
	}
}
