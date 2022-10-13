<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pelanggan_model', 'pelanggan');
        $this->load->library('user_agent');
        $this->load->helper('rupiah_helper');
    }

    public function index(){
		$head['judul'] = 'My Profile - Arwana Store';
		$cst = $this->session->userdata('ses_id');
		$head['cust'] = $this->db->query("SELECT * FROM pelanggan WHERE id_pelanggan='$cst'")->result();
		$head['cart'] = $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk=keranjang.id_produk WHERE id_pelanggan='$cst'")->result_array();
        $head['krjg'] = $this->db->query("SELECT * FROM keranjang WHERE id_pelanggan='$cst'")->num_rows();
		$data['pelanggan'] = $this->pelanggan->cust()->row_array();
		$this->load->view('templ/head', $head);
		$this->load->view('account', $data);
		$this->load->view('templ/foot');
    }
	
	function profilechange(){
		$id_pelanggan = $this->input->post('id_pelanggan');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
		$alamat = $this->input->post('alamat');
		$id_provinsi = $this->input->post('id_provinsi');
		$no_hp = $this->input->post('no_hp');
		$this->pelanggan->profile($id_pelanggan,$nama_lengkap,$username,$alamat,$id_provinsi,$no_hp);
		$this->session->set_flashdata('go', '<div class="alert alert-success"><b>Berhasil!</b> Anda berhasil mengubah profil Anda.</div>');
		redirect('my');
	}

}