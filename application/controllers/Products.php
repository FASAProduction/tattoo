<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('produk_model', 'produk');
        $this->load->library('user_agent');
        $this->load->helper('rupiah_helper');
        $this->load->library('user_agent');
    }

    public function index(){
        $head['judul'] = 'Products - Three False | Bistro & Tattoo Studios';
        $head['galeri'] = $this->db->query("SELECT * FROM products")->result();
        $data['galeri'] = $this->db->query("SELECT * FROM products")->result();
        $data['title'] = "ThreeFalse";
        $foot['title'] = "ThreeFalse";
		$this->load->view('templ/head', $head);
		$this->load->view('gallery', $data);
		$this->load->view('templ/foot', $foot);
    }

    function details($alias){
    	$det = $this->db->query("SELECT * FROM products WHERE alias='$alias'")->row_array();
    	$deta = $det['product_name'];
    	$head['judul'] = $deta .' - Three False | Bistro & Tattoo Studios';
        $head['galeri'] = $this->db->query("SELECT * FROM products")->result();
        $data['galeria'] = $this->db->query("SELECT * FROM products WHERE alias='$alias'")->row_array();
        $data['title'] = "ThreeFalse";
        $foot['title'] = "ThreeFalse";
		$this->load->view('templ/head', $head);
		$this->load->view('galeri', $data);
		$this->load->view('templ/foot', $foot);
    }

}