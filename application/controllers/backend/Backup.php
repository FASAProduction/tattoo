<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Backup extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
		$this->load->helper('rupiah_helper');
		$this->load->helper('tanggal_helper');

		if($this->session->userdata('enter') != TRUE){
			redirect('backend');
		}
    }
    
    public function index(){
		$this->load->dbutil();
		
		$dbname = 'db_backup_'.$this->db->database.'_on_'.date("Y-m-d-H-i-s").'.sql';
		
		$prefs = array(
			'format'				=> 'zip',
			'filename'				=> $dbname,
			'add_insert'			=> TRUE,
			'foreign_key_checks'	=> FALSE
		);
		
		$backup = $this->dbutil->backup($prefs);
		
		$save = base_url().'komponen/'.$dbname;
		
		$this->load->helper('file');
		write_file($save, $backup);
		
		$this->load->helper('download');
		force_download($dbname, $backup);
		
		redirect('backend/clog');
	}


}