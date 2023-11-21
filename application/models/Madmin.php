<?php

class Madmin extends CI_Model{

	public function cek_login($u, $p){
		$q = $this->db->get_where('admin', array('username'=>$u, 'admin_password'=>$p));
		return $q;
	}
	public function cek_login_user($u, $p){
		$q = $this->db->get_where('user', array('username'=>$u, 'user_password'=>$p));
		return $q;
	}
	// public function cek_toko($p){
	// 	$q = $this->db->get_where('tbl_toko', ['namaToko'=>$p]);
	// 	return $q; 
	// }

	public function get_all_data($tabel){
		$q=$this->db->get($tabel);
		return $q;
	}

	public function insert($tabel, $data){
		$this->db->insert($tabel, $data);
	}

	public function get_by_id($tabel, $id){
		return $this->db->get_where($tabel, $id);
	}

	public function update($tabel, $data, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}
	function get_user($user)
	{
	  $this->db->where('id_user',$user);
	  $get_user = $this->db->get('user');
	  return $get_user->row();
	  } 

	public function delete($tabel, $id, $val){
		$this->db->delete($tabel, array($id => $val));
	}
}
?>