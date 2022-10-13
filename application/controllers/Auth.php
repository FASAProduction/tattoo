<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('kasir_model', 'kasir');
    }

    public function index()
	{
                $dat['judul'] = "Authentication - Rekapan";
                $this->load->view('auth/auth', $dat);
	}
	
	function login(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=sha1(htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES));
 
        $cek=$this->kasir->data_login($username,$password);
                    if($cek->num_rows() > 0){
                            $data=$cek->row_array();
                    $this->session->set_userdata('masuka',TRUE);
                            $this->session->set_userdata('ses_id',$data['cashier_id']);
							$url = base_url();
                            redirect($url);
                    }else{  // jika username dan password tidak ditemukan atau salah
                            echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><i class="mdi mdi-alert-circle"></i> Username Atau Password Salah</div>!');
                            $url = base_url('auth');
                            redirect($url);
                    }
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('auth');
        redirect($url);
    }

}