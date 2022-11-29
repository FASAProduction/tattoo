<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('produk_model', 'produk');
        $this->load->library('user_agent');
        $this->load->helper('rupiah_helper');
    }

    public function index(){
        $head['judul'] = 'Three False | Bistro & Tattoo Studios';
        $head['galeri'] = $this->db->query("SELECT * FROM products")->result();
        $data['galeri'] = $this->db->query("SELECT * FROM products")->result();
        $data['title'] = "ThreeFalse";
        $foot['title'] = "ThreeFalse";
        $ip = $this->input->ip_address();
        $time = date('H:i:s');
        $date = date('Y-m-d');
        $dates = date('l, d-m-Y');
        if($this->agent->is_browser()){
            $brow = $this->agent->browser() . " " . $this->agent->version();
        }else if($this->agent->is_mobile()){
            $brow = $this->agent->mobile();
        }else if($this->agent->is_robot()){
            $brow = $this->agent->robot();
        }else{
            $brow = "Not Detected";
        }

        $os = $this->agent->platform();

        $notes = "";

        $url = "https://discord.com/api/webhooks/1037342742986108968/x4st8O2zlFgVuoJbcfRmmud0zUq5Kf7w24OWlUZWpneQDQKNEB7mi8Q2ewpQ8YP5hMhL";
            $headers = [ 'Content-Type: application/json; charset=utf-8' ];
            $POST = [ 'username' => 'ThreeFalse Project Log', 'content' => 'Access Detected!
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

		$this->load->view('templ/head', $head);
		$this->load->view('home', $data);
		$this->load->view('templ/foot', $foot);
    }

}