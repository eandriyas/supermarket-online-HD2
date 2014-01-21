<?php 

if ( ! defined('BASEPATH')) 
	exit('No direct script access allowed');
//memanggil file base untuk melakukan penurunan
require_once 'application/controllers/base/base.php';

//membuat class baru untuk login extends ke base
class login extends base {
	//membuat construktor
	public function __construct() {
		parent::__construct();
        //memanggil library form_validation
		$this->load->library('form_validation');
	}

    //fungsi untuk halaman index
	public function index()
	{
		//memanggil fungsi display dengan view login_view.php
		$this->display('public/login_view.php');
	}

	//membuat validasi untuk login
	public function login_validation(){
		
		//set rule agar input benar dan memberikan pesan jika ada kesalahan
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password', "Password", 'required|md5|trim');
		//membuat struktur kendali jika form_validation berjalan atau tidak
		if($this->form_validation->run()==true){
			//memasukkan input email kedalam variabel $email
			$email = $this ->input->post('email');
			//memasukkan input password kedalam variabel $password
			$password = $this->input->post('password');
			//cek email dan password ke fungsi can_log_in di database dan memasukkannya kedalam variabel $userData
			$userData = $this->m_pelanggan->can_log_in($email,$password);
			//cek jika userData tidak kosong
			if(!empty($userData)){
				//memasukkan isi dari userdata kedalam user data
				$sessionData['id_pelanggan'] = $userData['id_pelanggan'];
				$sessionData['nama_pelanggan'] = $userData['nama_pelanggan'];
				$sessionData['alamat'] = $userData['alamat'];
				$sessionData['ttl'] = $userData['ttl'];
				$sessionData['email'] = $userData['email'];
				$sessionData['is_logged_in'] = 1;
				//set session userdata menggunakan nilai sessionData
				$this->session->set_userdata($sessionData);
				//redirect ke halaman puclic/home/pelanggan jika sukses
				redirect('public/home/pelanggan');
				//jika data kosong maka
			}
		} else {
			$this->display('public/login_view');
		}	
	}

	//validasi login dengan database dan memberikan pesan kesalahan
	public function validate_credentials(){
		$email = $this->input->post('email');
		$pass = md5($this->input->post('password'));
		//struktur kendali untuk cek bisa login atau tidak
		if ($this->m_pelanggan->can_log_in($email, $pass)){
			return true;
		} else {
			//memberikan pesan jika login tidak berhasil
			$this->form_validation->set_message('validate_credentials', 'incorrects username/password');
			return false;
		}
	}

	//membuat sebuah validasi untuk register pelanggan baru
	public function register_validation(){
		//set rule untuk register agar input sesuai dengan yang kita inginkan
		//rule untuk nama yaitu required/harus ada		
		$this->form_validation->set_rules('name', 'Nama', 'required');
		//rule untuk alamat yaitu required/harus ada
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		//rule untuk ttl yaitu required/harus ada
		$this->form_validation->set_rules('ttl', 'ttl', 'required');
		//rule untuk email yaitu required/harus ada, harus email valid, unique/tidak ada didatabase
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pelanggan.email]');
		//rule untuk password yaitu required
		$this->form_validation->set_rules('password', 'Password', 'required|trim' );
		//rule untuk confirm password yaitu required/harus ada dan harus sama dengan input password pertama
		$this->form_validation->set_rules('cpassword', 'Ulangi Password', 'required|trim|matches[password]' );
		//set pesan jika email sudah ada didatabase
		$this->form_validation->set_message('is_unique', "Email sudah digunakan, coba email lain atau Login");
		//membuat struktur kendali jika form_validation berjalan atau tidak
		if($this->form_validation->run()){
			//memanggil fungsi dari model m_pelanggan yaitu add_pelanggan
			$this->m_pelanggan->add_pelanggan();
			//echo "silahkan cek email";
			//memanggil fungsi confirm()jika berhasil register
			$this->confirm();
		} else{
			//jika gagal maka kembali ke halaman login
			$this->display('public/login_view.php');
		}
	}

	//membuat sebuat fungsi untuk logout untuk pelanggan
	public function logout(){
		//fungsi yang digunakan untuk menghapus session
		$this->session->sess_destroy();
        //setelah session terhapus maka redirect ke halaman home
		redirect('public/home');
	}

    //membuat halaman confirm
	public function confirm(){
    	//memanggil view login_confirm
		$this->display('public/login_confirm');
	}
}