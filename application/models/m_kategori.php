<?php 
//membuat class model baru dengan nama m_kategori
class m_kategori extends CI_Model{

//fungsi untuk menambah kategori
 function add_kategori($kategori){
    //perintah sql untuk menambah kategori kedalam database
    $sql = "INSERT INTO `pwl`.`kategori` (`kategori`) VALUES (?)" ;
    //eksekusi query sql
    $query = $this->db->query($sql, $kategori);
}

//memanggil kategori dari barang
function get_kategori(){
    //perintah sql sekaligus eksekusi untuk mengambil kategori di database
    $query = $this->db->query('SELECT * FROM kategori ORDER BY kategori ASC');
    //hasil query menjadi result_array
    return $query->result_array();
}

//fungsi untuk memanggil kategori berdasarkan id_kategori
function get_kategori_by_id($id_kategori){
    //perintah sql untuk mengambil kategori berdasarkan id_kategori
    $sql = 'SELECT * FROM kategori WHERE id_kategori=?';
    //eksekusi dari peritnah sql
    $query = $this->db->query($sql, $id_kategori);
    //hasil dari eksekusi dijadikan row_array karena hasilnya satu baris saja
    return $query->row_array();
}

//fungsi untuk update kategori
function update_kategori($params){
    //perintah sql untuk update kategori
    $sql = "UPDATE kategori SET kategori =? WHERE id_kategori =? ";
    //eksekusi perintah sql
    $query = $this->db->query($sql, $params);
    //cek apakah sql bisa berjalan dengan baik atau tidak
    if($query==true){
        echo "berhasil update";
    } else echo "gagal gagal update";
}

//fungsi untuk menghapus kategori
function delete_kategori($id_kategori){
    //perintah sql untuk hapus kategori
    $sql = "DELETE FROM kategori WHERE id_kategori = ? ";
    //eksekusi peritnah sql
    $query = $this->db->query($sql, $id_kategori);
    //cek apakah query berhasil dijalankan atau tidak
    if($query==true){
        echo "berhasil delete";
    } else echo "gagal delete";
}            

}	