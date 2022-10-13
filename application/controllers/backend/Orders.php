<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
		$this->load->helper('rupiah_helper');
		$this->load->helper('tanggal_helper');
		if($this->session->userdata('enter') != TRUE){
			redirect('backend');
		}
    }

    public function index()
	{
                $head['judul'] = "Backend Pesanan - Arwana Store";
				$adm = $this->session->userdata('adm_id');
				$head['admn'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$adm'")->row_array();
				$head['orderan'] = $this->db->query("SELECT * FROM pemesanan WHERE status_bayar='Belum Bayar' GROUP BY kode_pemesanan")->num_rows();
				$head['listorderan'] = $this->db->query("SELECT * FROM pemesanan
				JOIN produk ON produk.id_produk=pemesanan.id_produk
				JOIN pelanggan ON pelanggan.id_pelanggan=pemesanan.id_pelanggan
				WHERE status_bayar='Belum Bayar' GROUP BY kode_pemesanan")->result();
				$data['admn'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$adm'")->row_array();
				$data['cust'] = $this->admin->customer()->result();
				$data['ordall'] = $this->admin->all_orders()->result();
                $this->load->view('backend/templ/head', $head);
                $this->load->view('backend/pemesanan/pesan', $data);
                $this->load->view('backend/templ/foot');
	}
	
	function exped(){
		$expedi = $this->input->get('expedi');
		$code = $this->input->get('code');
		$this->db->query("UPDATE pemesanan SET status_kirim='$expedi' WHERE kode_pemesanan='$code'");
		$this->session->set_flashdata('chg', '<div class="col-md-12"><div class="alert alert-success"><b>BERHASIL!</b> Status pengiriman berhasil diubah.</div></div>');
		redirect('backend/orders');
	}
	
	public function details($codo)
	{
                $head['judul'] = "Detail Pesanan " . $codo . " - Arwana Store";
				$adm = $this->session->userdata('adm_id');
				$head['admn'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$adm'")->row_array();
				$head['orderan'] = $this->db->query("SELECT * FROM pemesanan WHERE status_bayar='Belum Bayar' GROUP BY kode_pemesanan")->num_rows();
				$head['listorderan'] = $this->db->query("SELECT * FROM pemesanan
				JOIN produk ON produk.id_produk=pemesanan.id_produk
				JOIN pelanggan ON pelanggan.id_pelanggan=pemesanan.id_pelanggan
				WHERE status_bayar='Belum Bayar' GROUP BY kode_pemesanan")->result();
				$data['admn'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$adm'")->row_array();
				$data['ordet'] = $this->admin->detorder($codo)->result();
				$data['cdo'] = $codo;
                $this->load->view('backend/templ/head', $head);
                $this->load->view('backend/pemesanan/ordetails', $data);
                $this->load->view('backend/templ/foot');
	}
	


}