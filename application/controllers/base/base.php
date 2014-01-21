<?php 

if ( ! defined('BASEPATH')) 
	exit('No direct script access allowed');

//membuat sebuah class untuk base
class base extends CI_Controller {
	//membuat construktor
	public function __construct() {
		parent::__construct();
        //load model m_barang agar bisa dipakai disemua controller lain
		$this->load->model('m_barang');
		$this->load->model('m_kategori');
		$this->load->model('m_pelanggan');
	}

    //membuat sebuah fungsi display untuk digunakan sebagai base view untuk display
	public function display ($view_anak = "", $data=""){
		//memasukkan nilai yang ada di $view_anak kedalam sebuah array $data['template_anak'] sehingga ketika di view dipanggil template_anak
		$data['template_anak'] = $view_anak;
		//memanggil view base yaitu "base_view" dengan menambahkan parameter $data
		$this->load->view('base/base_view', $data);
	}

	//membuat sebuah fungsi displayadmin yang akan digunakan untuk base view untuk admin dengan parameter $view_admin dan $data
	public function displayadmin ($view_admin = "", $data=""){
		//membuat array yang akan digunakan untuk memanggil parameter dan dimasukkan kedalam view base dariadmin	
		$data['template_admin'] = $view_admin;
		//memanggil view base_admin yang akan menampilkan base view dari admin dengan menambahkan parameter $data
		$this->load->view('base/base_admin', $data);
	}
}