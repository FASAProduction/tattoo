<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
                $head['judul'] = "Backend Products - Arwana Store";
				$adm = $this->session->userdata('adm_id');
				$head['admn'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$adm'")->row_array();
				$head['orderan'] = $this->db->query("SELECT * FROM pemesanan WHERE status_bayar='Belum Bayar' GROUP BY kode_pemesanan")->num_rows();
				$head['listorderan'] = $this->db->query("SELECT * FROM pemesanan
				JOIN produk ON produk.id_produk=pemesanan.id_produk
				JOIN pelanggan ON pelanggan.id_pelanggan=pemesanan.id_pelanggan
				WHERE status_bayar='Belum Bayar' GROUP BY kode_pemesanan")->result();
				$data['admn'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$adm'")->row_array();
				$data['prdct'] = $this->admin->products()->result();
                $this->load->view('backend/templ/head', $head);
                $this->load->view('backend/products', $data);
                $this->load->view('backend/templ/foot');
	}
	
	public function add(){
		$id_admin = $this->session->userdata('adm_id');
		$nama_produk = $this->input->post('nama_produk', TRUE);
		$deskripsi = $this->input->post('deskripsi', TRUE);
		$pecah = explode("\r\n\r\n", $deskripsi);
		$hasil = "";
		for ($i=0; $i<=count($pecah)-1; $i++)
		{
		   $part = str_replace($pecah[$i], "".$pecah[$i]."", $pecah[$i]);
		   $hasil .= $part;
		}
		$stok = $this->input->post('stok', TRUE);
		$harga = $this->input->post('harga', TRUE);
		$config['upload_path']          = 'komponen/images/products';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['gambar']            	= $nama_produk;
		$config['overwrite']            = true;
		$config['max_size']             = 6024; // 1MB
		// $config['max_width']            = 800;
		// $config['max_height']           = 700;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			$b = array('gambar' => $this->upload->data());
			$bpic = $b['gambar']['file_name'];
			$this->admin->productsadd($id_admin,$nama_produk,$hasil,$stok,$harga,$bpic);
		}
	$this->session->set_flashdata('succ', '<div class="col-md-12"><div class="alert alert-success"><b>BERHASIL!</b> Produk sudah ditambahkan. <a href="" data-dismiss="true">Oke</a></div></div>');
	redirect('backend/products');
	}
	
	function edit(){
		$id_produk = $this->input->post('id_produk');
		$id_admin = $this->session->userdata('adm_id');
		$nama_produk = $this->input->post('nama_produk', TRUE);
		$deskripsi = $this->input->post('deskripsi', TRUE);
		$pecah = explode("\r\n\r\n", $deskripsi);
		$hasil = "";
		for ($i=0; $i<=count($pecah)-1; $i++)
		{
		   $part = str_replace($pecah[$i], "".$pecah[$i]."", $pecah[$i]);
		   $hasil .= $part;
		}
		$stok = $this->input->post('stok', TRUE);
		$harga = $this->input->post('harga', TRUE);
		$this->admin->edit_produk($id_produk,$id_admin,$nama_produk,$hasil,$stok,$harga);
		$this->session->set_flashdata('succ', '<div class="col-md-12"><div class="alert alert-success"><b>BERHASIL!</b> Produk berhasil diubah. <a href="" data-dismiss="true"><b>Oke</b></a></div></div>');
		redirect('backend/products');
	}
	
	function picedit(){
		$id_produk = $this->input->post('id_produk', TRUE);
		$gambara = $this->input->post('gambara', TRUE);
		$config['upload_path']          = 'komponen/images/products';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['gambar']            	= $nama_produk;
		$config['overwrite']            = true;
		$config['max_size']             = 6024; // 6MB
		// $config['max_width']            = 800;
		// $config['max_height']           = 700;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			$b = array('gambar' => $this->upload->data());
			$bpic = $b['gambar']['file_name'];
			$jalur = 'komponen/images/products'.$gambara;
			unlink($jalur);
			$this->admin->editpic($id_produk, $bpic);
			$this->session->set_flashdata('succ', '<div class="col-md-12"><div class="alert alert-success"><b>BERHASIL!</b> Foto produk berhasil diubah. <a href="" data-dismiss="true"><b>Oke</b></a></div></div>');
			redirect('backend/products');	
		}
	}
	
	function addstock(){
		$id_produk = $this->input->post('id_produk');
		$stok = $this->input->post('stok');
		$this->admin->stockadd($id_produk,$stok);
		$this->session->set_flashdata('succ', '<div class="col-md-12"><div class="alert alert-success"><b>BERHASIL!</b> Stok berhasil ditambahkan. <a href="" data-dismiss="true"><b>Oke</b></a></div></div>');
		redirect('backend/products');
	}
	
	function del($id_produk){
		$this->admin->del_produk($id_produk);
		$this->session->set_flashdata('succ', '<div class="col-md-12"><div class="alert alert-success"><b>BERHASIL!</b> Produk berhasil dihapus. <a href="" data-dismiss="true"><b>Oke</b></a></div></div>');
		redirect('backend/products');
	}

}