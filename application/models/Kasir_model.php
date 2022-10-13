<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_model extends CI_Model {

    public function data_login($username,$password){
		return $this->db->query("SELECT * FROM cashier WHERE uname='$username' AND pass='$password'");
	}

}