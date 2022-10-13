<?php
if($this->agent->is_mobile()){
	$this->load->view('pes/m_pes');
}else{
	$this->load->view('pes/w_pes');
}
?>