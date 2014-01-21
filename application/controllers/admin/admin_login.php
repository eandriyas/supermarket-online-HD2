<?php 

if ( ! defined('BASEPATH')) 
	exit('No direct script access allowed');

//memanggil file base yang akan digunakan untuk menurunkan ketingkat yang lebih sederhana
require_once 'application/controllers/base/base.php';
//membuat sebuah class baru bernama admin_login yang khusus untuk login admin
class admin_login extends base {
	//membuat sebuah construktor
	public function __construct() {
		parent::__construct();
		$this->load->model('m_admin');
	}

    //fungsi index, yang akan otomatis terbuka jika menggunakan url admin_login
	public function index(){
		//memanggil fungsi displayadmin dengan parameter login_admin.php yang akan menampilkan view file tersebut
		$this->displayadmin('admin/login_admin.php');
	}

	//membuat validasi apakah data yang diinputkan benar atau tidak
	public function login_validation(){
		//memanggil library form_validation
		$this->load->library('form_validation');
		//membuat sebuah rule untuk username, seperti required, penulisan yang benar, dan menggunakan database untuk cek
		//$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|callback_validate_admin');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|callback_validate_admin');
		//membuah sebuah rule untuk password seperti required, menggunakan md5
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
		//membuat sebuah struktur kendali jika form_validation berhasil berjalan
		if ($this->form_validation->run()){
			$ad = $this->m_admin->can_log_in($this->input->post('username'), $this->input->post('password'));
			//print_r($ad);
			$now = date('Y-m-d H:i:s');
			$param = array($now, $ad['id_admin']);
			$this->m_admin->last_login($param);
			//membuat sebuah array dari data yang diinputkan
			$data = array (
				'id' => $ad['id_admin'],
				'username' => $ad['username'],
				'is_logged_in' =>1
				);
			//memasukkan data array kedalam session userdata
			$this->session->set_userdata($data);
			redirect('admin/admin/admin_page');
		} else{
			//jika gagal maka kembali masuk ke halaman login
			$this->displayadmin('admin/login_admin');
		}

	}

	//membuat fungsi validasi login ke database
	public function validate_admin(){
		//memanggil model m_admin
		
		$user = $this->input->post('username');
		$pass = md5($this->input->post('password'));
 		//struktur kendali jika fungsi can_log_in pada database berjalan atau tidak
		if ($this->m_admin->can_log_in($user, $pass)){
			//jika berhasil return true
			return true;
		} else {
			//jika gagal, maka menampilkan pesan "Incorrect username/password"
			$this->form_validation->set_message('validate_admin', "Incorrect username/password");
			return false;
		}
	}
	
	//membuat fungsi logout untuk menghilangkan sisa session yang ada
	public function logout(){
		//fungsi yang digunakan untuk menghapus session
		$this->session->sess_destroy();
		//redirect ke halaman admin_login
		redirect('admin/admin_login');
	}
}