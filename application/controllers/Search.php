<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('produk_model', 'produk');
        $this->load->library('user_agent');
        $this->load->helper('rupiah_helper');
    }

    public function index(){
        
    }
	
	function q(){
		$keyword = $this->input->post('keyword');
		$head['judul'] = 'hasil pencarian '. $keyword .' - Arwana Store';
		$cst = $this->session->userdata('ses_id');
		$head['cust'] = $this->db->query("SELECT * FROM pelanggan WHERE id_pelanggan='$cst'")->result();
		$head['cart'] = $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk=keranjang.id_produk WHERE id_pelanggan='$cst'")->result_array();
        $head['krjg'] = $this->db->query("SELECT * FROM keranjang WHERE id_pelanggan='$cst'")->num_rows();
		$data['hasilcari'] = $this->db->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'")->result();
		$data['kunci'] = $keyword;
		$this->load->view('templ/head', $head);
		$this->load->view('s_products', $data);
		$this->load->view('templ/foot');
	}

}