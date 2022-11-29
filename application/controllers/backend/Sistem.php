<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Sistem extends CI_Controller {

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
                $head['judul'] = "System Settings - Backend Vendor - Three False";
                $adm = $this->session->userdata('adm_id');
                $head['adma'] = $this->db->query("SELECT * FROM adm WHERE adm_id='$adm'")->row_array();
                $data['sstatus'] = $this->db->query("SELECT * FROM sistem")->row_array();
                $this->load->view('backend/templ/head', $head);
                $this->load->view('backend/sistem', $data);
                $this->load->view('backend/templ/foot');
	}

    function toggle(){
        $maintenance = $this->input->post('maintenance');
        $sis_id = $this->input->post('sis_id');
        $this->db->query("UPDATE sistem SET s_status='$maintenance' WHERE system_id='$sis_id'");
        $this->session->set_flashdata('succ', '<div class="col-md-12"><div class="alert alert-success"><b>BERHASIL!</b> Sistem telah diupdate. <a href="" data-dismiss="true">Oke</a></div></div>');
        redirect('backend/sistem');
    }

}