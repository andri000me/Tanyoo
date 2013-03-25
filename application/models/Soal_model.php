<?php
class Soal_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}
	
	function selectAll(){
			$this->db->order_by("id_soal", "desc"); 
			return $this->db->get('soal')->result(); //nama tabelnya soal
	}
	
	
	//mengambil soal-soal berdasarkan user tertentu
	function selectByUser($user){
		$data = $this->db->get_where('soal', array('username' => $user));
		return $data->result();
	}

	//return semua isi soal dalam bentuk array
	public function get_info_soal($id_soal){

	}

	//menambah soal baru
	public function add_soal($data){
		$this->db->insert('soal', $data); //insert ke tabel soal
		//return $this->db->insert_id();
	}

	//mengedit soal
	public function edit_soal(){
		
	}
	
	function selectsoal ($id_soal){
			$data = $this->db->get_where('soal', array('id_soal' => $id_soal));
			return $data;
	}	
	
	function simpan_ubah($id_soal, $data){
		//$this->db->where("id_soal",$_POST['id_soal']);
		//$this->db->update("soal",$_POST);
		$this->db->where("id_soal",$id_soal);
		$this->db->update("soal",$data);
		//redirect('','refresh');
	}
	
	function proses_cari_soal($cari){
		$data = $this->db->get_where('soal', array('tag' => $cari));
		return $data->result();
	}

	//menambah flag
	public function add_flag($id_soal){

	}

	//mengurangi flag
	public function decrease_flag($id_soal){

	}

	//memberi lock
	public function set_lock(){

	}

	//melepaskan lock
	public function unset_lock(){

	}

}