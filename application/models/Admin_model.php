<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function adm_login($username,$password){
		return $this->db->query("SELECT * FROM adm WHERE username='$username' AND password='$password'");
	}

	function product(){
		return $this->db->query("SELECT * FROM products ORDER BY product_id DESC");
	}

	function gallery(){
		return $this->db->query("SELECT * FROM gallery JOIN products ON products.product_id=gallery.product_id");
	}

	function galleryadd($product_id,$show,$bpic){
		return $this->db->query("INSERT INTO gallery(product_id,showed,contents) VALUES ('$product_id','$show','$bpic')");
	}

	function productadd($product_name,$alias,$descripti,$price){
		return $this->db->query("INSERT INTO products (product_name,alias,descripti,price) VALUES ('$product_name','$alias','$descripti','$price')");
	}

	function productedit($pida,$product_name,$alias,$descripti,$price){
		return $this->db->query("UPDATE products SET product_name='$product_name',alias='$alias',descripti='$descripti',price='$price' WHERE product_id='$pida'");
	}

	function log(){
		return $this->db->query("SELECT * FROM threefalse_log ORDER BY tf_id DESC");
	}
	
	function ipfil($ipaddr){
		return $this->db->query("SELECT * FROM threefalse_log WHERE ip_address='$ipaddr' ORDER BY datess DESC");
	}

	function osfil($os){
		return $this->db->query("SELECT * FROM threefalse_log WHERE os='$os' ORDER BY datess DESC");
	}

	function browfil($browsers){
		return $this->db->query("SELECT * FROM threefalse_log WHERE browsers='$browsers' ORDER BY datess DESC");
	}

	function datefil($date){
		return $this->db->query("SELECT * FROM threefalse_log WHERE datess='$date' ORDER BY datess DESC");
	}
}