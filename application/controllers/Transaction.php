<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$anua = $this->session->userdata('masuka');
		$urel = base_url('login');
		if($anua != TRUE){
			redirect($urel);
		}
        $this->load->model('produk_model', 'produk');
        $this->load->library('user_agent');
        $this->load->helper('rupiah_helper');
    }

    public function index(){
    }
	
	public function add_transaction(){
        $head['judul'] = 'Transaksi - Rekapan';
		$kas = $this->session->userdata('ses_id');
		$head['kasirr'] = $this->db->query("SELECT * FROM cashier WHERE cashier_id='$kas'")->row_array();
		$data['carto'] = $this->db->query("SELECT * FROM cart JOIN product ON product.product_id=cart.product_id")->result();
		$data['cartos'] = $this->db->query("SELECT * FROM cart JOIN product ON product.product_id=cart.product_id")->num_rows();
		$this->load->view('templ/head', $head);
		$this->load->view('pes/transaa', $data);
		$this->load->view('templ/foot');
    }
	
	public function querya(){
		$cari = $this->input->post('cari');
        $head['judul'] = $cari . ' - Rekapan';
		$kas = $this->session->userdata('ses_id');
		$head['kasirr'] = $this->db->query("SELECT * FROM cashier WHERE cashier_id='$kas'")->row_array();
		$data['carto'] = $this->db->query("SELECT * FROM cart JOIN product ON product.product_id=cart.product_id")->result();
		$data['cartos'] = $this->db->query("SELECT * FROM cart JOIN product ON product.product_id=cart.product_id")->num_rows();
		$data['cprod'] = $this->db->query("SELECT * FROM product WHERE product_name LIKE '%$cari%' OR product_code LIKE '%$cari%'")->result();
		$data['cprods'] = $this->db->query("SELECT * FROM product WHERE product_name LIKE '%$cari%' OR product_code LIKE '%$cari%'")->num_rows();
		$this->load->view('templ/head', $head);
		$this->load->view('pes/transearch', $data);
		$this->load->view('templ/foot');
    }
	
	function tbh($proid){
		$qty = 1;
		$kas = $this->session->userdata('ses_id');
		$cek = $this->db->query("SELECT * FROM cart WHERE product_id='$proid'")->num_rows();
		if($cek > 0){
			$this->db->query("UPDATE cart SET qty='$qty' + 1 WHERE product_id='$proid'");
		}else{
			$this->db->query("INSERT INTO cart (product_id,qty,cashier_id) VALUES ('$proid','$qty','$kas')");
		}
		redirect('transaction/add_transaction');
	}

}