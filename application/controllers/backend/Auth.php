<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
    }

    public function index()
	{
                $head['judul'] = "Backend Authentication - Three False";
                $this->load->view('backend/login', $head);
	}
	
	function login(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=sha1(htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES));
 
        $cek=$this->admin->adm_login($username,$password);
                    if($cek->num_rows() > 0){
                            $data=$cek->row_array();
                            $this->session->set_userdata('enter',TRUE);
                            $this->session->set_userdata('adm_id',$data['adm_id']);

                            $ip = $this->input->ip_address();
                            $time = date('H:i:s');
                            $date = date('Y-m-d');
                            $dates = date('l, d-m-Y');
                            if($this->agent->is_browser()){
                                $brow = $this->agent->browser() . " " . $this->agent->version();
                            }else if($this->agent->is_mobile()){
                                $brow = $this->agent->mobile();
                            }else{
                                $brow = "Not Detected";
                            }

                            $os = $this->agent->platform();

                            $notes = "Login terdeteksi!
                            Username = " . $username;

        $url = "https://discord.com/api/webhooks/1037342742986108968/x4st8O2zlFgVuoJbcfRmmud0zUq5Kf7w24OWlUZWpneQDQKNEB7mi8Q2ewpQ8YP5hMhL";
            $headers = [ 'Content-Type: application/json; charset=utf-8' ];
            $POST = [ 'username' => 'ThreeFalse Project Log', 'content' => '**Backend Login Detected!**
Username: **' . $username . '**
IP Address: **' . $ip . '**
Time: **' . $dates . ' ' . $time . '**
Browsers: **' . $brow . '**
Operating System: **' . $os . '**' ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
            $response   = curl_exec($ch);

            $this->db->query("INSERT INTO threefalse_log (ip_address,os,browsers,notes,datess,timess) VALUES ('$ip','$os','$brow','$notes','$date','$time')");

							$url = base_url('backend/dashboard');
                            redirect($url);
                    }else{  // jika username dan password tidak ditemukan atau salah
                            echo $this->session->set_flashdata('msg','<b>GAGAL!</b> Username atau Password salah.');
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