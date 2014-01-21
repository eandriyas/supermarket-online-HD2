<?php 

if ( ! defined('BASEPATH')) 
	exit('No direct script access allowed');
//memanggil file base, agar bisa digunakan di turunan dari base tersebut
require_once 'application/controllers/base/base.php';

//membuat sebuah class baru sebagai turunan dari class base
class admin extends base {

	//membuat sebuah konstruktor untuk mengatur seluruh dari isi fungsi yang ada dibawahnya
	public function __construct() {
		parent::__construct();
		
        //membuat sebuah struktur kendali percabangan agar hanya admin yang sudah login saja yang bisa masuk 
        //kedalam controller yang dikhususkan untuk admin
		if(!$this->session->userdata('is_logged_in')){
			redirect('admin/admin_login');
		}
	}

    //menampilkan halaman home
	public function index(){

		//memanggil fungsi dari base dengan nilai login_admin.php
		$this->displayadmin('admin/login_admin.php');
	}
	
	//membuat sebuah fungsi yang akan digunakan untuk menampilkan halaman admin
	public function admin_page(){
		//membuat sebuah array yang akan digunakan oleh view page
		$data['view'] = $this->m_barang->get_barang();
		//memanggil fungsi displayadmin dengan parameter list_barang_admin
		$this->displayadmin('admin/list_barang_admin', $data);	
	}

	//membuah sebuah fungsi yang digunakan untuk menampilkan list dari barang
	public function list_barang(){
		//membuat sebuah array hasil dari pengambilan data dari sebuah model
		$data['view'] = $this->m_barang->get_barang();
		//memanggil fungsi displayadmin dan memasukkan hasil array kedalam file list_barang_admin.php
		$this->displayadmin('admin/list_barang_admin.php', $data);	
	}

	//fungsi untuk menambah barang
	public function tambah_barang(){
		$data['kat'] = $this->m_kategori->get_kategori();
		//menampilkan view tambah_barang.php 
		$this->displayadmin('admin/tambah_barang', $data);
	}

	//fungsi untuk menambah barang dan memasukkannya kedalam sebuah database
	public function add_barang(){
		//memanggil model m_admin
		$this->load->model('m_admin');
			//memanggil model m_admin
		$this->load->model('m_admin');
			//memasukkan hasil input kategori kedalam variabel kategori
		$kategori = $this->input->post('kategori');
			//memasukkan hasil input nama_barang kedalam variabel nama_barang
		$nama_barang = $this->input->post('nama_barang');
			//memasukkan hasil input harga kedalam variabel harga
		$harga = $this->input->post('harga');
			//memasukkan hasil input stok kedalam variabel stok
		$stok = $this->input->post('stok');
			//memasukkan hasil input deskripsi kedalam variabel deskripsi
		$deskripsi = $this->input->post('deskripsi');
			//memasukkan nama file dari gambar_besar kedalam variabel gambar_besar
		$gambar_besar = $_FILES['gambar_besar'];
			//params membuat sebuah array yang akan digunakan untuk memasukkan kedalam sebuah database
		$params = array($nama_barang, $deskripsi, $kategori, $stok, $harga, $gambar_besar['name']);
			//membuat struktur kendali ketika berhasil menambah kedatabase
		if($this->m_admin->add_barang($params)){
				//memanggil sebuah library CI yaitu upload
			$this->load->library('upload');
				//konfigurasi letak file akan ditematkan ketika upload
			$config['upload_path'] = 'themes/img/';
				//konfigurasi file apa saja yang bisa diupload
			$config['allowed_types'] = 'gif|jpg|png';
				//jika ada file dengan nama yang sama maka langsung direplace
			$config['overwrite'] = true;
				//memasukkan konfigurasi ke fungsi initialize untuk dicek kebenarannya
			$this->upload->initialize($config);
				//memanggil fungsi do_upload yang akan meng-upload file gambar_besar
			$this->upload->do_upload('gambar_besar');
				//jika upload gagal makal menampilkan error
			echo $this->upload->display_errors();

			$data['berhasil']['tambah'] = "berhasil disimpan";
				//redirect ke fungsi admin/tambah_barang jika barang berhasil ditambahkan
			redirect('/admin/admin/tambah_barang' );

		} else { 
				//jika gagal melalukan penambahan baik kedatabase maupun upload maka menampilkan gagal disimpan
			echo "gagal disimpan"; 
		}
	}

	//membuat sebuah fungsi untuk edit barang berdasarkaan id barang
	public function edit_barang($id_barang){
		$data['kat'] = $this->m_kategori->get_kategori();
		//memasukkan hasil view dari barang berdasarkan id_barang
		$data['view'] = $this->m_barang->get_barang_by_id($id_barang);
		//menampilkan halam untuk edit barang dan menambahkan data kedalamnya
		$this->displayadmin('admin/edit_barang', $data);
		
	}
	//membuat fungsi edit barang by id
	public function edit_barang_by_id(){
		//print_r($_POST);
			//memasukkan hasil input id_barang kedalam variabel id_barang
		$id_barang = $this->input->post('id_barang');
			//memasukkan hasil input id_kategori kedalam variabel id_kategori
		$id_kategori = $this->input->post('id_kategori');
			//memasukkan hasil input nama_barang kedalam variabel nama_barang
		$nama_barang = $this->input->post('nama_barang');
			//memasukkan hasil input harga kedalam variabel harga
		$harga = $this->input->post('harga');
			//memasukkan hasil input stok kedalam variabel stok
		$stok = $this->input->post('stok');
			//memasukkan hasil input deskripsi kedalam variabel deskripsi
		$deskripsi = $this->input->post('deskripsi');
			//memasukkan nama file dari gambar_besar kedalam variabel gambar_besar
		$gambar_besar = $_FILES['gambar_besar'];
			//params membuat sebuah array yang akan digunakan untuk memasukkan kedalam sebuah database
		$params = array($nama_barang, $deskripsi, $id_kategori, $stok, $harga, $id_barang);
			//memanggil fungsi dari model m_barang yaitu update_barang
		$this->m_barang->update_barang($params);
		redirect('admin/admin/admin_page');
	}

	//membuat sebuah fungsi untuk menghapus barang berdasarkan id barang
	public function delete_barang($id_barang){
		//menggunakan fungsi delete_barang dari model m_barang
		$this->m_barang->delete_barang($id_barang);
		redirect ('admin/admin/admin_page');
	}

	//menampilkan view untuk tambah_kategori
	public function tambah_kategori(){
		//memasukkan hasil fungsi get_kategori kedalam sebuah variabel data
		$data['kat'] = $this->m_kategori->get_kategori();
		//menampilkan view dan menambahkan data kedalamnya
		$this->displayadmin('admin/tambah_kategori',$data);
	}

	//membuat fungsi yang mengatur penambahan kategori kedalam model
	public function add_kategori(){
		//menangkap hasil input dari form
		$kat = $this->input->post('kategori');
		//memanggil fungsi add_kategori dan menambahkan data berdasarkan input form
		$this->m_kategori->add_kategori($kat);
		//memanggil kategori dari model dan ditampilkan setelah kategori berhasil ditambahkan
		$data['kat'] = $this->m_kategori->get_kategori();
		//menampilkan view setelah penambahan kategori
		$this->displayadmin('admin/tambah_kategori',$data);
	}

	//membuat sebuah fungsi untuk menampilkan view update kategori
	public function up_kategori($id_kategori){
		//memanggil kategori berdasarkan id kategori dari model
		$data['kategori_dat'] = $this->m_kategori->get_kategori_by_id($id_kategori);
		//menampilkan view untuk edit kategori
		$this->displayadmin('admin/edit_kategori', $data);
	}
	public function edit_kategori(){
		//menangkap input dari form dan memasukkannya kedalam variabel
		$id_kategori = $this->input->post('id_kategori');
		//memasukkan hasil input kategori kedalam variabel
		$kategori = $this->input->post('kategori');
		//memasukkan variabel kedalam array	
		$params = array($kategori, $id_kategori);
		//memanggil fungsi update kategori dengan parameter
		$this->m_kategori->update_kategori($params);
	}

	//membuat fungsi untuk menghapus kategori
	public function del_kategori($id_kategori){
		//memanggil fungsi delete kategori dari model
		$this->m_kategori->delete_kategori($id_kategori);
		//redirect ke halaman
		redirect('admin/admin/tambah_kategori');
	}

	//membuat fungsi untuk view list pelanggan
	public function pelanggan(){
		$data['pelanggan'] = $this->m_pelanggan->get_pelanggan();
		$this->displayadmin('admin/list_pelanggan', $data);
	}

	//membuat fungsi untuk menghapus pelanggan
	public function del_pelanggan($ttl){
		$this->m_pelanggan->del_pelanggan($ttl);
		redirect('admin/admin/pelanggan');	
	}
}