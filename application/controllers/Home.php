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
        $head['judul'] = 'Studio Tattoo Bali';
		$this->load->view('templ/head', $head);
		$this->load->view('home');
		$this->load->view('templ/foot');
    }

}