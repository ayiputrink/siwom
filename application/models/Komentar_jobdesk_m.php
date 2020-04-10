<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar_jobdesk_m extends Base_m {

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
    public $table = 'komentar_jobdesk';
	
	public function read_full_where($where){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('user','user.id_user = komentar_jobdesk.id_user');
		$this->db->where($where);
		$this->db->order_by('komentar_jobdesk.created_at','DESC');
		return $this->db->get();
	}
}
