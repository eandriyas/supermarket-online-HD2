<?php 
//membuat class model baru dengan nama m_admin
class m_admin extends CI_Model{

	//membuat fungsi untuk cek login
	public function can_log_in($user, $pass){
		$this->db->select('*');
		//membuat fungsi where didalam database dengan input username
		$this->db->where('username', $user);
		//$this->db->where('username', $this->input->post('username'));
		//membuat fungsi where didalam database dengan input password yang sudah dienkripsi
		$this->db->where('password',$pass);
		//$this->db->where('password', md5($this->input->post('password')));
		//$sql ="SELECT * FROM admin WHERE username=? AND password=?";
		//$query = $this->db->query($sql, $param);
		//eksekusi query ditabel admin
		$query = $this->db->get('admin');
		//jika hasilnya adalah 1 baris
		 if ($query->num_rows() > 0) {
            $g_result = $query->row_array();
            $query->free_result();
            return $g_result;
        } else {
            return array();
        }
	}

	//membuat sebuah fungsi baru add_barang untuk menambahkan barang dengan parameter $params
	public function add_barang($params=""){
		//membuat perintah sql yang dimasukkan kedalam variabel sql
		$sql = "INSERT INTO barang(nama_barang, deskripsi_barang, id_kategori, stok, harga, gambar_besar) VALUES (?,?,?,?,?,?)";
		//eksekusi perintah sql
		return $this->db->query($sql, $params);
	}

	public function last_login($param){
		$sql = "UPDATE admin SET last_login = ? WHERE id_admin = ?";
		 return $this->db->query($sql, $param);
	}



	
}