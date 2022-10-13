<?php
if($this->agent->is_mobile()){
	$this->load->view('cart/m_cart');
}else{
	$this->load->view('cart/w_cart');
}
?>