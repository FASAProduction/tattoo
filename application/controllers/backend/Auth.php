<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
    }

    public function index()
	{
                $head['judul'] = "Backend Authentication - Arwana Store";
                $this->load->view('backend/login', $head);
	}
	
	function login(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=sha1(htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES));
 
        $cek=$this->admin->data_login($username,$password);
                    if($cek->num_rows() > 0){
                            $data=$cek->row_array();
                    $this->session->set_userdata('enter',TRUE);
                            $this->session->set_userdata('adm_id',$data['id_admin']);
							$url = base_url('backend/dashboard');
                            redirect($url);
                    }else{  // jika username dan password tidak ditemukan atau salah
                            echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><b>GAGAL!</b> Username atau Password salah.</div>');
                            $url = base_url('backend');
                            redirect($url);
                    }
    }
	
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('backend');
        redirect($url);
    }

}