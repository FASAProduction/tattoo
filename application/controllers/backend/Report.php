<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model', 'admin');
		$this->load->helper('rupiah_helper');
		$this->load->helper('tanggal_helper');
		$this->load->helper('terbilang_helper');
		if($this->session->userdata('enter') != TRUE){
			redirect('backend');
		}
    }

    public function index()
	{
                $head['judul'] = "Backend Laporan - Arwana Store";
				$adm = $this->session->userdata('adm_id');
				$head['admn'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$adm'")->row_array();
				$head['orderan'] = $this->db->query("SELECT * FROM pemesanan WHERE status_bayar='Belum Bayar' GROUP BY kode_pemesanan")->num_rows();
				$head['listorderan'] = $this->db->query("SELECT * FROM pemesanan
				JOIN produk ON produk.id_produk=pemesanan.id_produk
				JOIN pelanggan ON pelanggan.id_pelanggan=pemesanan.id_pelanggan
				WHERE status_bayar='Belum Bayar' GROUP BY kode_pemesanan")->result();
				$data['admn'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$adm'")->row_array();
                $this->load->view('backend/templ/head', $head);
                $this->load->view('backend/laporan/rep');
                $this->load->view('backend/templ/foot');
	}
	
	function filter(){
		$from = $this->input->post('from');
		$to = $this->input->post('to');
		$head['judul'] = "Backend Laporan - Arwana Store";
		$adm = $this->session->userdata('adm_id');
		$head['admn'] = $this->db->query("SELECT * FROM admin WHERE id_admin='$adm'")->row_array();
		$daa['filt'] = $this->admin->data_filter($from,$to)->result();
		$daa['fil'] = $this->admin->data_filter($from,$to)->num_rows();
		$daa['from'] = $from;
		$daa['to'] = $to;
		$this->load->view('backend/templ/head', $head);
        $this->load->view('backend/laporan/repfil', $daa);
        $this->load->view('backend/templ/foot');
	}
	
	public function faktur($code){
		$d['title'] = "Faktur Penjualan " . $code;
		$d['all'] = $this->db->query("SELECT * FROM produk JOIN pemesanan ON pemesanan.id_produk=produk.id_produk WHERE kode_pemesanan='$code' GROUP BY kode_pemesanan")->result();
		$this->load->view('backend/laporan/faktur', $d);
	}
	
	public function fakturperiodic(){
        $from = $this->input->get('from');
        $to = $this->input->get('to');
		$d['title'] = "Faktur Penjualan dari tanggal " . $from . "-" . $to;
		$d['from'] = $from;
		$d['to'] = $to;
		$d['afaktur'] = $this->db->query("SELECT nama_produk, SUM(qty) AS quty, SUM(total) AS toutal
		FROM pemesanan
		JOIN produk ON produk.id_produk=pemesanan.id_produk
		WHERE tanggal_pemesanan BETWEEN '$from' AND '$to' AND status_kirim='Selesai' GROUP BY pemesanan.id_produk")->result();
		$this->load->view('backend/laporan/all_faktur', $d);
	}

    public function fakturmonth(){
        $bulan_ini = date('n');
        $tahun_ini = date('Y');

        if($bulan_ini == '1'){
            $bulan = "Jan";
        }else if($bulan_ini == '2'){
            $bulan = "Feb";
        }else if($bulan_ini == '3'){
            $bulan = "Mar";
        }else if($bulan_ini == '4'){
            $bulan = "Apr";
        }else if($bulan_ini == '5'){
            $bulan = "Mei";
        }else if($bulan_ini == '6'){
            $bulan = "Jun";
        }else if($bulan_ini == '7'){
            $bulan = "Jul";
        }else if($bulan_ini == '8'){
            $bulan = "Agst";
        }else if($bulan_ini == '9'){
            $bulan = "Sept";
        }else if($bulan_ini == '10'){
            $bulan = "Okt";
        }else if($bulan_ini == '11'){
            $bulan = "Nov";
        }else{
            $bulan = "Des";
        }
		$d['title'] = "Faktur Penjualan Bulan " . $bulan . "-" . $tahun_ini;
		$d['month'] = $bulan;
		$d['afaktur'] = $this->db->query("SELECT nama_produk, SUM(qty) AS quty, SUM(total) AS toutal
		FROM pemesanan
		JOIN produk ON produk.id_produk=pemesanan.id_produk WHERE MONTH(tanggal_pemesanan) = '$bulan_ini' AND status_kirim='Selesai' GROUP BY pemesanan.id_produk")->result();
		$this->load->view('backend/laporan/all_faktur_month', $d);
	}

}