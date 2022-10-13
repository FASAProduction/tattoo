<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manageadm extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
		$this->load->helper('rupiah_helper');
		$this->load->helper('tanggal_helper');
		$this->load->helper('terbilang_helper');
		if($this->session->userdata('enter') != TRUE){
			redirect('backend');
		}
    }

    public function index()
	{
                $head['judul'] = "Backend Manage Admin - Arwana Store";
				$adm = $this->session->userdata('adm_id');
				$head['admn'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$adm'")->row_array();
				$head['orderan'] = $this->db->query("SELECT * FROM pemesanan WHERE status_bayar='Belum Bayar' GROUP BY kode_pemesanan")->num_rows();
				$head['listorderan'] = $this->db->query("SELECT * FROM pemesanan
				JOIN produk ON produk.id_produk=pemesanan.id_produk
				JOIN pelanggan ON pelanggan.id_pelanggan=pemesanan.id_pelanggan
				WHERE status_bayar='Belum Bayar' GROUP BY kode_pemesanan")->result();
				$data['admn'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$adm'")->row_array();
                $this->load->view('backend/templ/head', $head);
                $this->load->view('backend/admin/adm');
                $this->load->view('backend/templ/foot');
	}

}