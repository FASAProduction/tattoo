<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Cart extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('keranjang_model', 'keranjang');
        $this->load->model('produk_model', 'produk');
        $this->load->model('pemesanan_model', 'pemesanan');
        $this->load->helper('string');
        $this->load->helper('rupiah_helper');
		$this->load->library('user_agent');
    }

    public function index(){
        $head['judul'] = 'Cart - Arwana Store';
		$cst = $this->session->userdata('ses_id');
		$head['cust'] = $this->db->query("SELECT * FROM pelanggan WHERE id_pelanggan='$cst'")->result();
		$head['krjg'] = $this->db->query("SELECT * FROM keranjang WHERE id_pelanggan='$cst'")->num_rows();
		$data['cr'] = $this->keranjang->view_keranjang()->result();
		$this->load->view('templ/head', $head);
		$this->load->view('cart/cart', $data);
		$this->load->view('templ/foot');
    }
	
	public function qty(){
		$qty = $this->input->post('qty');
		$id_cart = $this->input->post('id_keranjang');
		$this->db->query("UPDATE keranjang SET qty='$qty' WHERE id_keranjang='$id_cart'");
		redirect('cart');
	}
	
	public function add($id_produk){
		$pel = $this->session->userdata('id_pelanggan');
		$prd = $this->db->query("SELECT * FROM produk WHERE id_produk='$id_produk'")->result_array();
		$qtyy = "1";
		foreach($prd as $pr){
		$prodd = $pr['harga'];
		}
		$this->db->query("INSERT INTO keranjang (id_pelanggan,id_produk,qty)
		VALUES ('$pel','$id_produk','$qtyy')");
		redirect('cart');
	}
	
	public function checkout(){
		$pelang = $this->session->userdata('ses_id');
		$resi = $this->keranjang->view_keranjang()->result_array();
		$acak = $this->keranjang->CreateCode();
		$tgl = date('Y-m-d');
		$dataa = array();
		
		$index = 0;
		foreach($resi as $da){
			$produk = $da['prod'];
			$qty = $da['qty'];
			$harga = $da['harga'];
			array_push($dataa, array(
			'kode_pemesanan' => $acak,
			'id_pelanggan' => $pelang,
			'id_produk' => $produk,
			'qty' => $qty,
			'tanggal_pemesanan' => $tgl,
			'total' => $harga * $qty,
			'status_bayar' => "Belum Bayar",
			'status_kirim' => "Menunggu Pembayaran",
			));
		
			$index++;
		
		}
		
		$this->db->insert_batch('pemesanan',$dataa);
		$this->db->query("DELETE FROM keranjang WHERE id_pelanggan='$pelang'");
		$this->db->query("UPDATE produk SET stok=stok - '$qty' WHERE id_produk='$produk'");
		redirect('order');
	}
 

}