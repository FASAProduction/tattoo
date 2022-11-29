<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
		$this->load->helper('rupiah_helper');
		$this->load->helper('tanggal_helper');

		if($this->session->userdata('enter') != TRUE){
			redirect('backend');
		}
    }

    public function index()
	{
                $head['judul'] = "Backend Gallery - Three False";
                $adm = $this->session->userdata('adm_id');
                $head['adma'] = $this->db->query("SELECT * FROM adm WHERE adm_id='$adm'")->row_array();
                $data['gallery'] = $this->admin->gallery()->num_rows();
                $data['galeria'] = $this->admin->gallery()->result();
                $this->load->view('backend/templ/head', $head);
                $this->load->view('backend/galeri', $data);
                $this->load->view('backend/templ/foot');
	}


    function addgal(){
        $product_id = $this->input->post('product_id' ,TRUE);
        $show = $this->input->post('show', TRUE);
        $galerii = 0;
        $config['upload_path']          = 'komponen/images/gallery';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['gambar']               = 'Gallery_0'.$galerii++;
        $config['overwrite']            = true;
        $config['max_size']             = 6024; // 1MB
        // $config['max_width']            = 800;
        // $config['max_height']           = 700;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('content')) {
            $data['error'] = $this->upload->display_errors();
        } else {
            $b = array('content' => $this->upload->data());
            $bpic = $b['content']['file_name'];
            $this->admin->galleryadd($product_id,$show,$bpic);
        }
    $this->session->set_flashdata('succ', '<div class="col-md-12"><div class="alert alert-success"><b>BERHASIL!</b> Gambar sudah ditambahkan. <a href="" data-dismiss="true">Oke</a></div></div>');
    redirect('backend/gallery');
    }

    function del($galid){
        $aw = $this->db->query("SELECT * FROM gallery WHERE gallery_id='$galid'")->row_array();
        $awa = $aw['contents'];
        $this->db->query("DELETE FROM gallery WHERE gallery_id='$galid'");
        $jalur = 'komponen/images/gallery/' . $awa;
        unlink($jalur);
        redirect('backend/gallery');
    }
    
    function tampilkan($galid){
        $cekk = $this->db->query("SELECT * FROM gallery WHERE gallery_id='$galid'")->row_array();
        $ceka = $cekk['showed'];
        if($ceka=="Y"){
            $this->db->query("UPDATE gallery SET showed='N' WHERE gallery_id='$galid'");
        }else{
            $this->db->query("UPDATE gallery SET showed='Y' WHERE gallery_id='$galid'");
        }
        $this->session->set_flashdata('succ', '<div class="col-md-12"><div class="alert alert-success"><b>BERHASIL!</b> Galeri sudah ditampilkan ke Home. <a href="" data-dismiss="true">Oke</a></div></div>');
        redirect('backend/gallery');
    }

}