<?php 

if ( ! defined('BASEPATH')) 
	exit('No direct script access allowed');
//memanggil file base yang digunakan untuk menurunkan 
require_once 'application/controllers/base/base.php';

//membuat sebuah class baru home yang merupakan turunan dari base
class home extends base {
	//membuat contruktor
	public function __construct() {
		parent::__construct();
	}

    // halaman home index
	public function index()
	{
		//membuat sebuah data yang berisi hasil select kategori dari database
		$data['kategori'] = $this->m_kategori->get_kategori();
		//membuat sebuah data yang berisi hasil select barang dari databse
		$data['view'] = $this->m_barang->get_barang();
		//data yang dibuat dimasukkan kedalam fungsi display, untuk diolah di home_view.php
		$this->display('public/home_view.php', $data);
	}

	//membuat fungsi single dengan parameter id
	public function single($id="")
	{
		//mengatur bahwa id itu merupakan uri segmen ketiga
		//membuat sebuah data yang berisi hasil select kategori dari database
		$data['kategori'] = $this->m_kategori->get_kategori();
		//membuat sebuah data yang berisi hasil select barang dari database
		$data['list'] = $this->m_barang->get_barang();
		//menampilkan sebuah data yang berisi hasil select barang berdasar id dari database
		$data['view'] = $this->m_barang->get_barang_by_id($id);
		//memasukkan data yang dibuat ke fungsi display untuk diolah dihalaman single_view.php
		$this->display('public/single_view.php', $data);
	}

	//membuat fungsi pelanggan
	public function pelanggan(){
		//struktur kendali jika pelanggan login atau tidak
		if($this->session->userdata('is_logged_in')){
			$this->load->model('m_pelanggan');
			$id_pelanggan = $this->session->userdata('id_pelanggan');
			$data['pelanggan'] = $this->m_pelanggan->get_det_pelanggan($id_pelanggan);
			//jika login maka menampilkan fungsi display dengan halaman welcome_pelanggan
			$this->display('pelanggan/welcome_pelanggan', $data);
		} else {
			//jika tidak maka menampilkan fungsi display dengan halaman login_confirm
			$this->display('public/login_view');
		}
	}

	public function edit_pelanggan() {
    	// isi post('...') sesuai dengan name="..." pada file produk/upload.php 
		$name = $this->input->post('nama_pelanggan');
		$alamat = $this->input->post('alamat');
		$ttl = $this->input->post('ttl');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$id_pelanggan = $this->input->post('id_pelanggan');
		$params = array ($name, $alamat, $ttl, $email, $password, $id_pelanggan);
        //parameter
		if ($this->m_pelanggan->edit_pelanggan($params)) {
            //jika berhasil di redirect ke produk
			redirect ('public/home/pelanggan');
		} else {
            //false
			echo "gagal disimpan";
		}
	}

	//membuat fungsi untuk menampilkan barang berdasarkan kategorinya
	public function kategori($id_kategori, $kategori){
		//id_kategori merupakan parameter untuk segment 3 dari url
		$id_kategori = $this->uri->segment(4);
		$data['kat'] = $this->m_kategori->get_kategori_by_id($id_kategori);
		//membuat data hasil dari select barang berdasar id_kategori
		$data['barang_per_kategori'] = $this->m_barang->get_barang_by_kategori($id_kategori);
		//memasukkan data yang dibuat kefungsi display dan dihalaman kategori_view untuk diolah
		$this->display('public/kategori_view', $data);
	}

	//membuat sebuah halaman restricted jika halaman yang ada tidak ditemukan
	public function restricted(){
		//menampilkan fungsi display dengan view file restricted.php
		$this->display('public/restricted');
	}

	//membuat sebuah fungsi cart barang
	public function cart(){
		//membuat data hasil dari select kategori barang
		$data['kategori'] = $this->m_kategori->get_kategori();
		//membuat data hasil dari select barang
		$data['view'] = $this->m_barang->get_barang();
		//ketika masuk ke url ini membuka view cart_view
		$this->load->view('pelanggan/cart_view', $data);
	}

	//membuat sebuah fungsi untuk meletakkan barang kedalam cart barang
	public function add_to_cart(){

		//memasukkan input dari id_barang ke variabel idb
		$idb = $this->input->post('id_barang');
		//input jumlah pesan
		
		//menampilkan select barang berdasar id_barang 
		$barang = $this->m_barang->get_barang_by_id($idb);
		//membuat sebuah array yang menampung variable yang akan digunakan dicart
		$insert = array(
			//merupakan id dari setiap barang
			'id' => $this->input->post('id_barang'),
			//jumlah dari barang
			'qty' => $this->input->post('jumlah') ,
			//harga dari barang
			'price' =>$barang['harga'] ,
			//options lain seperti nama barang
			'name' =>$barang['nama_barang']
			);
		//memasukkan array kedalam fungsi insert cart
		$data = $this->cart->insert($insert);
		//redirect kembali ke halaman home
		redirect('public/home');
	}

	public function save_order(){
		if($this->session->userdata('is_logged_in')){
			$id = $this->input->post('id_pelanggan');
			$day = date('Y-m-d H:i:s');
			$order = array(
				'date_order' => $day,
				'id_pelanggan' 	=> $id
				);
			//$data['jumlah'] = $this->m_barang->get_jumlah($id);
			$order_new = $this->m_barang->insert_order($order);
			$top = $this->m_barang->get_order_by_pelanggan($id);
			$id_order=  $top['id_order'];
			if ($cart = $this->cart->contents()):
				foreach ($cart as $item):
					$order_detail = array(
						'id_barang' 	=> $item['id'],
						'jumlah' 		=> $item['qty'],
						'id_order' 		=> $id_order
						);		

				$cust_id = $this->m_barang->insert_order_detail($order_detail);
				endforeach;
				endif;
				$data['bayar'] = $this->m_barang->get_bayar($id_order);
				



				$this->display('pelanggan/konfirmasi_pembayaran',$data);

			} else {
				$this->display('public/login_confirm');
			}


		}

		function remove($rowid) {
			if ($rowid=="all"){
				$this->cart->destroy();
			}else{
				$data = array(
					'rowid'   => $rowid,
					'qty'     => 0
					);

				$this->cart->update($data);
			}

			redirect('public/home/pelanggan');
		}	



		
		
		

	//membuat fungsi untuk membersihkan cart sebelumnya
		public function destroy() {
		//memanggil fungsi untuk membersihkan cart
			$this->cart->destroy();
		//redirect kembali ke halaman home
			redirect('public/home');
		}
	}