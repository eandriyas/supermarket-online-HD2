<?php 
//membuat sebuah model baru m_pelanggan
class m_pelanggan extends CI_Model{

    //membuat sebuah fungsi untuk menambahkan pelanggan
    public function add_pelanggan(){
        //memasukkan data hasil input kedalam sebuah array
        $data = array(
            'nama_pelanggan' => $this->input->post('name'),
            'alamat' => $this->input->post('alamat'), 
            'ttl' => $this->input->post('ttl'),
            'email' => $this->input->post('email'), 
            'password' => md5($this->input->post('password'))
            );
        //eksekusi perintah sql dengan tabel pelanggan dan parameter array tersebut
        $query = $this->db->insert('pelanggan', $data);
        //cek apakah query sudah berjalan normal atau tidak
        if ($query){
            return true;

        } else {
            return false;
        }
    }

    //membuat sebuah fungsi baru untuk cek login atau tidak
    public function can_log_in($email, $password){
        //membuat perintah sql dengan menggunakan fungsi bawaan ci
        //untuk perintah SELECT
        $this->db->select('*');
        //untuk perintah WHERE
        $this->db->where('email', $email);
        //untuk perintah WHERE
        $this->db->where('password', $password);
        //eksekusi peritah sql
        $query = $this->db->get('pelanggan');
        //struktur kendali untuk cek apakah data ada atau tidak
        if($query->num_rows() > 0){
            //memasukkan hasil eksekusi query kedalam row_array
            return $query->row_array();
        }
    }

    //fungsi untuk memanggil data pelanggan
    public function get_pelanggan(){
        //perintah sql untuk memanggil data pelanggan
        $sql = 'SELECT * FROM pelanggan';
        //eksekusi perintah sql
        $query = $this->db->query($sql);
        //struktur kendali untuk cek apakah data ada atau tida
        if ($query->num_rows() > 0) {
            //jika ada maka dimasukkan kedalam sebuah array
            $g_result = $query->result_array();
            $query->free_result();
            return $g_result;
        } else {
            return array();
        }
    }

    //fungsi untuk menghapus pelanggan
    public function del_pelanggan($ttl){
        //perintah sql untuk menghapus pelanggan berdasarkan id_pelanggan
        $sql = "DELETE FROM pelanggan WHERE ttl = ? ";
        //eksekusi perintah sql
        $query = $this->db->query($sql, $ttl);
        //cek apakah perintah sql berjalan dengan normal atau tidak
        if($query==true){
            return true;
        } else return false;
        
    }

    //fungsi untuk memanggil semua data pelanggan
    public function get_det_pelanggan($id_pelanggan){
        //perintah sql untuk memanggil semua data pelanggan berdasarkan id_pelanggan
        $sql = 'SELECT * FROM pelanggan WHERE id_pelanggan = ?';
        //eksekusi perintah sql untuk memanggil data pelanggan
        $query = $this->db->query($sql, $id_pelanggan);
        //struktur kendali untuk cek apakah data ada atau tida
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    //fungsi untuk edit data pelanggan dengan parameter
    function edit_pelanggan($params)  {
        //perintah sql untuk edit data pelangggan berdasarkan id_pelanggan
        $sql = "UPDATE pelanggan SET nama_pelanggan= ?, alamat=?, ttl=?, email=?, password=? WHERE id_pelanggan=?";
        //eksekusi perintah sql
        return $this->db->query($sql, $params);
    }

}	