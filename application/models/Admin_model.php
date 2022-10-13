<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function data_login($username,$password){
		return $this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
	}
	
	public function transaction_payed(){
		return $this->db->query("SELECT * FROM pemesanan WHERE status_bayar='Sudah Bayar' GROUP BY kode_pemesanan");
	}
	
	public function transaction_nonpayed(){
		return $this->db->query("SELECT * FROM pemesanan WHERE status_bayar='Belum Bayar' GROUP BY kode_pemesanan");
	}
	
	public function transaction(){
		return $this->db->query("SELECT * FROM pemesanan GROUP BY kode_pemesanan");
	}
	
	public function customer(){
		return $this->db->query("SELECT * FROM pelanggan JOIN provinsi ON provinsi.id_provinsi=pelanggan.id_provinsi");
	}
	
	public function totalget(){
		return $this->db->query("SELECT SUM(total) as too FROM pemesanan WHERE status_bayar='Sudah Bayar' AND status_kirim='Selesai'");
	}
	
	public function totalgetnonpayed(){
		return $this->db->query("SELECT SUM(total) as tooa FROM pemesanan WHERE status_bayar='Belum Bayar'");
	}
	
	public function all_orders(){
		return $this->db->query("SELECT * FROM pemesanan
		JOIN pelanggan ON pelanggan.id_pelanggan=pemesanan.id_pelanggan
		JOIN produk ON produk.id_produk=pemesanan.id_produk
		GROUP BY kode_pemesanan ORDER BY kode_pemesanan DESC");
	}
	
	public function data_filter($from,$to){
		return $this->db->query("SELECT * FROM pemesanan
		JOIN pelanggan ON pelanggan.id_pelanggan=pemesanan.id_pelanggan
		JOIN produk ON produk.id_produk=pemesanan.id_produk
		WHERE tanggal_pemesanan BETWEEN '$from' AND '$to'
		GROUP BY kode_pemesanan ORDER BY kode_pemesanan DESC");
	}
	
	function products(){
		return $this->db->query("SELECT * FROM produk ORDER BY id_produk DESC");
	}
	
	function productsadd($id_admin,$nama_produk,$hasil,$stok,$harga,$bpic){
		return $this->db->query("INSERT INTO produk (id_admin,nama_produk,deskripsi,stok,harga,gambar)
		VALUES ('$id_admin','$nama_produk','$hasil','$stok','$harga','$bpic')");
	}
	
	function penjualan(){
		$daate = date('m');
		return $this->db->query("SELECT nama_produk, SUM(total) AS toot
		FROM pemesanan
		JOIN produk ON produk.id_produk=pemesanan.id_produk
		WHERE MONTH(tanggal_pemesanan) = '$daate'
		GROUP BY pemesanan.id_produk");
	}
	
	function edit_produk($id_produk,$id_admin,$nama_produk,$hasil,$stok,$harga){
		return $this->db->query("UPDATE produk SET id_admin='$id_admin', nama_produk='$nama_produk', deskripsi='$hasil', stok='$stok', harga='$harga' WHERE id_produk='$id_produk'");
	}
	
	function editpic($id_produk,$bpic){
		return $this->db->query("UPDATE produk SET gambar='$bpic' WHERE id_produk='$id_produk'");
	}
	
	function stockadd($id_produk, $stok){
		return $this->db->query("UPDATE produk SET stok=stok+'$stok' WHERE id_produk='$id_produk'");
	}
	
	function del_produk($id_produk){
		return $this->db->query("DELETE FROM produk WHERE id_produk='$id_produk'");
	}
	
	function detorder($codo){
		return $this->db->query("SELECT * FROM pemesanan
		JOIN produk ON produk.id_produk=pemesanan.id_produk
		WHERE kode_pemesanan='$codo'");
	}
}