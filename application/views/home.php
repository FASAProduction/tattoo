<?php
$main = $this->db->query("SELECT * FROM sistem")->row_array();
$status = $main['s_status'];

if($status=="Maintenance"){
	$this->load->view('maintenance');
}else{
	$this->load->view('normal');
}
?>