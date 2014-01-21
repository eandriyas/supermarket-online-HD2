<?php 
//membuat class model baru dengan nama m_barang
class m_barang extends CI_Model{

//membuat fungsi get_barang untuk mengambil barang keseluruhan
    function get_barang(){
    //perintah sql untuk mengambil dari barang
        $sql = "SELECT *FROM barang";
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

    //memanggil barang berdasarkan id_barang hasil = 1
    function get_barang_by_id($id_barang){
    //perintah sql untuk mengambil barang berdasar id_barang
        $sql = "SELECT *FROM barang where id_barang=?";
    //eksekusi dari perintah sql
        $query = $this->db->query($sql, $id_barang);
        //struktur kendali apakah ada data atau tidak
        if ($query->num_rows() > 0) {
            $g_result = $query->row_array();
            $query->free_result();
            return $g_result;
        } else {
            return array();
        }
    }

    //membuat sebuah fungsi untuk memanggil kategori berdasarkan id_kategori
    function get_barang_by_kategori($id_kategori) {
        //fungsi untuk mengambil perintah select
        $this->db->select('*');
        //fungsi untuk mengambil perintah where
        $this->db->where('id_kategori', $id_kategori);
        //eksekusi query sql
        $query = $this->db->get('barang');
        return $query->result_array();
    }

    //fungsi untuk update barang dengan parameter
    function update_barang($params){
        //perintah sql untuk update barang berdasar id_barang
        $sql = "UPDATE barang SET nama_barang =?  , deskripsi_barang =? ,id_kategori =?  , stok =?  , harga =?  WHERE id_barang =? ";
        //eksekusi perintah sql
        $query = $this->db->query($sql, $params);
        //cek apakah perintah sql berhasil berjalan atau tidak
        if($query==true){
           return true;
        } else return false;
    }    

    //fungsi untuk menghapus barang
    function delete_barang($id_barang){
        //perintah sql untuk hapus barang
        $sql = "DELETE FROM barang WHERE id_barang = ? ";
        //eksekusi untuk perintah sql
        $query = $this->db->query($sql, $id_barang);
        //cek apakah perintah sql berhasil dijalankan atau tidak
        if($query==true){
            echo "berhasil delete";
        } else echo "gagal delete";
    }

    function insert_order($params){
        $sql = "INSERT INTO order_new (date_order, id_pelanggan) VALUES (?,?)";
        return $this->db->query($sql, $params);
        $id = $this->db->insert_id();
        echo $id;
        
        return (isset($id)) ? $id : FALSE;
    }  

    function insert_order_detail($params){
        $sql = "INSERT INTO beli (id_barang, jumlah, id_order) VALUES (?,?,?);";
        return $this->db->query($sql, $params);
    }  

    function get_order_by_pelanggan($id){

        $sql = "SELECT id_order FROM order_new WHERE id_pelanggan=?  ORDER BY date_order DESC LIMIT 0,1";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $g_result = $query->row_array();
            $query->free_result();
            return $g_result;
        } else {
            return array();
        }
    }

    function get_jumlah($id){
        $sql ="SELECT order_new.id_order, order_new.id_pelanggan,  beli.id_barang, jumlah, barang.`harga`, 
        (harga*jumlah) AS total, SUM(harga*jumlah) AS bayar
        FROM order_new 
        INNER JOIN beli ON order_new.`id_order`=beli.`id_order` 
        INNER JOIN pelanggan ON order_new.`id_pelanggan`=pelanggan.`id_pelanggan`
        INNER JOIN barang ON barang.`id_barang`=beli.`id_barang`
        WHERE order_new.`id_pelanggan`=?";
         $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $g_result = $query->row_array();
            $query->free_result();
            return $g_result;
        } else {
            return array();
        }
    }
    function get_bayar($id){
        $sql ="SELECT beli.`id_order`,  SUM(barang.harga*beli.jumlah) AS bayar FROM beli
         INNER JOIN barang ON beli.`id_barang`=barang.`id_barang`
         WHERE id_order=?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $g_result = $query->row_array();
            $query->free_result();
            return $g_result;
        } else {
            return array();
        }

    }
}	