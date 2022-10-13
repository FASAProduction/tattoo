<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Order extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pemesanan_model', 'pemesanan');
        $this->load->model('keranjang_model', 'keranjang');
        $this->load->library('user_agent');
		$this->load->helper('rupiah_helper');
		$this->load->helper('tanggal_helper');
		$this->load->helper('terbilang_helper');

        if($this->session->userdata('ses_id') == NULL){
            redirect('home');
        }
    }

    public function index(){
        $head['judul'] = 'My Orders - Arwana Store';
		$cst = $this->session->userdata('ses_id');
		$head['cust'] = $this->db->query("SELECT * FROM pelanggan WHERE id_pelanggan='$cst'")->result();
		$head['cart'] = $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk=keranjang.id_produk WHERE id_pelanggan='$cst'")->result_array();
		$head['krjg'] = $this->db->query("SELECT * FROM keranjang WHERE id_pelanggan='$cst'")->num_rows();
		$data['ord'] = $this->pemesanan->pesan()->result();
		$data['ordht'] = $this->pemesanan->pesan()->num_rows();
		$this->load->view('templ/head', $head);
		$this->load->view('pes/pesan', $data);
		$this->load->view('templ/foot');
    }
	
	public function detail($code){
		$head['judul'] = 'Arwana Store';
		$cst = $this->session->userdata('ses_id');
		$head['cust'] = $this->db->query("SELECT * FROM pelanggan WHERE id_pelanggan='$cst'")->result();
		$d['custm'] = $this->db->query("SELECT * FROM pelanggan JOIN provinsi ON provinsi.id_provinsi=pelanggan.id_provinsi WHERE id_pelanggan='$cst'")->row_array();
		$head['krjg'] = $this->db->query("SELECT * FROM keranjang WHERE id_pelanggan='$cst'")->num_rows();
		$d['code'] = $code;
		$d['detail'] = $this->pemesanan->details($code)->result();
		$d['detaila'] = $this->pemesanan->details($code)->row_array();
		$this->load->view('templ/head', $head);
		$this->load->view('pes/pay', $d);
		$this->load->view('templ/foot');
	}
	
	public function process_payment(){
		$kode_pemesanan = $this->input->post('kode_pemesanan', TRUE);
		$metode_bayar = $this->input->post('metode_bayar', TRUE);
		$status_bayar = "Sudah Bayar";
		$status_kirim = "Dikemas";
		$paymento = $this->input->post('paymento');
		$config['upload_path']          = 'komponen/images/payment';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['bukti']            	= $paymento;
		$config['overwrite']            = true;
		$config['max_size']             = 10024; // 1MB
		// $config['max_width']            = 800;
		// $config['max_height']           = 700;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('bukti')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			$b = array('bukti' => $this->upload->data());
			$bpay = $b['bukti']['file_name'];
			$this->pemesanan->pay($kode_pemesanan,$status_bayar,$status_kirim,$metode_bayar,$bpay);
		}

	redirect('order');
	}

}