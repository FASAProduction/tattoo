<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    function product(){
		return $this->db->query("SELECT * FROM produk");
	}
	
	function product_limit(){
		return $this->db->query("SELECT * FROM produk LIMIT 5");
	}
	
	function product_detail($pr){
		return $this->db->query("SELECT * FROM produk WHERE id_produk='$pr'");
	}

}