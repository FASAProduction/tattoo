<?php
$main = $this->db->query("SELECT * FROM sistem")->row_array();
$status = $main['s_status'];

if($status=="Maintenance"){
	$this->load->view('templ/head_maintenance');
}else{
	$this->load->view('templ/head_normal');
}
?>