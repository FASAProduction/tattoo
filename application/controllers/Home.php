<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('produk_model', 'produk');
        $this->load->library('user_agent');
        $this->load->helper('rupiah_helper');
    }

    public function index(){
        $head['judul'] = 'Three Fals | Bistro & Tattoo Studios';
        $head['galeri'] = $this->db->query("SELECT * FROM products")->result();
        $data['galeri'] = $this->db->query("SELECT * FROM products")->result();
		$this->load->view('templ/head', $head);
		$this->load->view('home', $data);
		$this->load->view('templ/foot');
    }

}