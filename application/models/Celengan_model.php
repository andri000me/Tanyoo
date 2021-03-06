<?php
class Celengan_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}


	//mendapatkan semua celengan dari username
	public function get_all_celengan_user($username){
		$data = $this->db->get_where('celengan', array('username'=>$username));
		return $data->result();
	}

	//menambah celengan baru
	public function add_celengan($data){
		$this->db->insert('celengan',$data);
	}

	//mendapatkan data celengan berdasarkan id
	public function get_celengan_by_id($id_celengan){
		$data = $this->db->get_where('celengan', array('id_celengan'=>$id_celengan));
		return $data->row();
	}

	//mendapatkan data celengan ada
	public function is_celengan_exist($id_celengan){
		$data = $this->db->get_where('celengan', array('id_celengan'=>$id_celengan));

		$num = $data->num_rows();

		if ($num > 0) {
			return true;
		}else{
			return false;
		}

	}

	//menghapus celengan berdasarkan id celengan
	public function delete_celengan($id){

		//hapus dulu isinya
		$query = $this->db->delete('isi_celengan', array('id_celengan' => $id));

		if ($query) {
			//baru hapus induknya
			$this->db->delete('celengan', array('id_celengan' => $id));
		}
		
	}

	//update nama celengan
	public function update_celengan($id_celengan, $nama_celengan){
		$this->db->where('id_celengan', $id_celengan);
		$query = $this->db->update('celengan', array('nama_celengan'=>$nama_celengan));
		return $query;
	}

	//mengecek user memiliki celengan dengan id tersebut
	public function is_user_have_celengan($username, $id_celengan){
		$query = $this->db->get_where("celengan", array('id_celengan'=>$id_celengan, 'username'=>$username));
		$num = $query->num_rows();

		//kalau ada
		if ($num > 0) {
			return true;
		}else{
			return false;
		}
	}

}