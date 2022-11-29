<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
                $head['judul'] = "Backend Dashboard - Three False";
                $adm = $this->session->userdata('adm_id');
                $head['adma'] = $this->db->query("SELECT * FROM adm WHERE adm_id='$adm'")->row_array();
                $data['products'] = $this->admin->product()->num_rows();
                $data['gallery'] = $this->admin->gallery()->num_rows();
                $this->load->view('backend/templ/head', $head);
                $this->load->view('backend/dash', $data);
                $this->load->view('backend/templ/foot');
	}

}