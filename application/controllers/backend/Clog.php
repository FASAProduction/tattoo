<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Clog extends CI_Controller {

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
                $head['judul'] = "Client Log - Backend Vendor - Three False";
                $adm = $this->session->userdata('adm_id');
                $head['adma'] = $this->db->query("SELECT * FROM adm WHERE adm_id='$adm'")->row_array();
                $data['log'] = $this->admin->log()->num_rows();
                $data['logg'] = $this->admin->log()->result();
                $this->load->view('backend/templ/head', $head);
                $this->load->view('backend/clientlog', $data);
                $this->load->view('backend/templ/foot');
	}
	
	function ipfilter(){
        $head['judul'] = "Client Log - Backend Vendor - Three False";
        $adm = $this->session->userdata('adm_id');
        $head['adma'] = $this->db->query("SELECT * FROM adm WHERE adm_id='$adm'")->row_array();
        $ipaddr = $this->input->post('ipaddr' ,TRUE);
        $data['fil'] = $this->admin->ipfil($ipaddr)->result();
        $data['fili'] = $this->admin->ipfil($ipaddr)->num_rows();
        $this->load->view('backend/templ/head', $head);
        $this->load->view('backend/filter', $data);
        $this->load->view('backend/templ/foot');

    }

    function osfilter(){
        $head['judul'] = "Client Log - Backend Vendor - Three False";
        $adm = $this->session->userdata('adm_id');
        $head['adma'] = $this->db->query("SELECT * FROM adm WHERE adm_id='$adm'")->row_array();
        $os = $this->input->post('os' ,TRUE);
        $data['fil'] = $this->admin->osfil($os)->result();
        $data['fili'] = $this->admin->osfil($os)->num_rows();
        $this->load->view('backend/templ/head', $head);
        $this->load->view('backend/filter', $data);
        $this->load->view('backend/templ/foot');
    }

    function browfilter(){
        $head['judul'] = "Client Log - Backend Vendor - Three False";
        $adm = $this->session->userdata('adm_id');
        $head['adma'] = $this->db->query("SELECT * FROM adm WHERE adm_id='$adm'")->row_array();
        $browsers = $this->input->post('browsers' ,TRUE);
        $data['fil'] = $this->admin->browfil($browsers)->result();
        $data['fili'] = $this->admin->browfil($browsers)->num_rows();
        $this->load->view('backend/templ/head', $head);
        $this->load->view('backend/filter', $data);
        $this->load->view('backend/templ/foot');
    }

    function datefilter(){
        $head['judul'] = "Client Log - Backend Vendor - Three False";
        $adm = $this->session->userdata('adm_id');
        $head['adma'] = $this->db->query("SELECT * FROM adm WHERE adm_id='$adm'")->row_array();
        $date = $this->input->post('date' ,TRUE);
        $data['fil'] = $this->admin->datefil($date)->result();
        $data['fili'] = $this->admin->datefil($date)->num_rows();
        $this->load->view('backend/templ/head', $head);
        $this->load->view('backend/filter', $data);
        $this->load->view('backend/templ/foot');
    }
    
    function exportexcel(){
        $data['log'] = $this->admin->log()->num_rows();
        $data['logg'] = $this->admin->log()->result();
        $this->load->view('backend/export_excel', $data);
    }
    
    function deleteall(){
        $this->db->query("TRUNCATE TABLE threefalse_log");
        redirect('backend/clog');
    }

}