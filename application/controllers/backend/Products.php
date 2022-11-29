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
                $head['judul'] = "Backend Products - Three False";
                $adm = $this->session->userdata('adm_id');
                $head['adma'] = $this->db->query("SELECT * FROM adm WHERE adm_id='$adm'")->row_array();
                $data['products'] = $this->admin->product()->num_rows();
                $data['producto'] = $this->admin->product()->result();
                $this->load->view('backend/templ/head', $head);
                $this->load->view('backend/products', $data);
                $this->load->view('backend/templ/foot');
	}


    function addprod(){
        $product_name = $this->input->post('product_name' ,TRUE);
        $ali = strtolower($product_name);
        $aliasa = str_replace(" ","-" ,$ali);
        $alias = str_replace("/","-",$aliasa);
        $descripti = $this->input->post('descripti' ,TRUE);
        $price = $this->input->post('price' ,TRUE);

        $this->admin->productadd($product_name,$alias,$descripti,$price);
        
    $this->session->set_flashdata('succ', '<div class="col-md-12"><div class="alert alert-success"><b>BERHASIL!</b> Produk sudah ditambahkan. <a href="" data-dismiss="true">Oke</a></div></div>');
    redirect('backend/products');
    }

    function edit($pid){
    			$e = $this->db->query("SELECT * FROM products WHERE product_id='$pid'")->row_array();
    			$ee = $e['product_name'];
    			$head['judul'] = "Editing ". $ee ." - Backend Products - Three False";
                $adm = $this->session->userdata('adm_id');
                $head['adma'] = $this->db->query("SELECT * FROM adm WHERE adm_id='$adm'")->row_array();
                $data['predit'] = $this->db->query("SELECT * FROM products WHERE product_id='$pid'")->row_array();
                $this->load->view('backend/templ/head', $head);
                $this->load->view('backend/pr_edit', $data);
                $this->load->view('backend/templ/foot');
    }

    function editprod(){
    	$pida = $this->input->post('pid' ,TRUE);
    	$product_name = $this->input->post('product_name' ,TRUE);
    	$ali = strtolower($product_name);
        $alias = str_replace(" ","-" ,$ali);
    	$descripti = $this->input->post('descripti' ,TRUE);
    	$price = $this->input->post('price' ,TRUE);

    	$this->admin->productedit($pida,$product_name,$alias,$descripti,$price);

    	$this->session->set_flashdata('succ', '<div class="col-md-12"><div class="alert alert-success"><b>BERHASIL!</b> Produk sudah diedit. <a href="" data-dismiss="true">Oke</a></div></div>');
    	redirect('backend/products');
    }


    function del($pid){
    	$this->db->query("DELETE FROM products WHERE alias='$pid'");
    	redirect('backend/products');
    }

}