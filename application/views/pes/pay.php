<!-- new -->
	<div class="newproducts-w3agile">
		<div class="container">
			<h3>Detail Pesanan <?php echo $code; ?></h3>
			<br/>
			<br/>
			<div class="row">
                <div class="col-md-8">
				<?php
				if($detaila['status_kirim'] == "Dikirim"){
				?>
					<div class="card bg">
						<div class="card-body">
							<font size="5">Status Pengiriman</font>
							<br/>
							<br/>
							Pesanan Anda sedang dalam perjalanan.
							<br/>
							<br/>
							Dikirim dari:
							<br/>
							<b>
							Jl. Mungguk Batu, Selimbau, Kalimantan Barat, Indonesia 78765
							</b>
							<br/>
							<br/>
							<i class="fa fa-arrow-down"></i>
							<br/>
							<br/>
							<b>
							<?php echo $custm['alamat']; ?>, <?php echo $custm['nama_provinsi']; ?>
							</b>
						</div>
					</div>
				<?php }else {} ?>
                    <div class="card bg">
                        <div class="card-body">
                            <?php
					        foreach($detail as $det):
                            if($det->status_bayar == "Belum Bayar"){
                            ?>
                            <span class="badge danger">Belum Bayar</span>
                            <?php }else{ ?>
                            <span class="badge success">Sudah Bayar</span>
                            <?php } ?>
							<?php
							if($det->status_kirim == "Menunggu Pembayaran"){
							?>
							<span class="badge primary">Menunggu Pembayaran</span>
                            <?php
                            }else if($det->status_kirim == "Dikemas"){
                            ?>
                            <span class="badge info">Dikemas</span>
                            <?php }else if($det->status_kirim == "Dikirim"){ ?>
                            <span class="badge warning">Dikirim</span>
                            <?php }else{ ?>
                            <span class="badge success">Selesai</span>
                            <?php } ?>
                            <h4>Detail Pemesanan</h4>
                            <br />
                            <?php
                            $a = $this->db->query("SELECT * FROM produk JOIN pemesanan ON pemesanan.id_produk=produk.id_produk WHERE kode_pemesanan='$code'")->result();
                            $c = $this->db->query("SELECT * FROM produk JOIN pemesanan ON pemesanan.id_produk=produk.id_produk WHERE kode_pemesanan='$code'")->num_rows();
                            $to = $this->db->query("SELECT SUM(total) as totally FROM pemesanan WHERE kode_pemesanan='$code'")->result();
							$pee = $this->db->query("SELECT * FROM pelanggan JOIN pemesanan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan WHERE kode_pemesanan='$code'")->row_array();
                            ?>
                            Tanggal Pemesanan : <b><?php echo format_indo($det->tanggal_pemesanan); ?></b>
                            <br />
                            <br />
                            <b>
                                <div class="row">
                                    <div class="col-md-3">
                                        Nama Produk
                                        <hr />
                                    </div>
                                    <div class="col-md-3">
                                        Harga
                                        <hr />
                                    </div>
                                    <div class="col-md-2">
                                        Qty
                                        <hr />
                                    </div>
                                    <div class="col-md-3">
                                        Subtotal
                                        <hr />
                                    </div>
                                </div>
                            </b>
                            <?php
						foreach($a as $b):
						?>
                            <div class="row">
                                <div class="col-md-3">
                                    <?php
							echo $b->nama_produk;
							?>
                                </div>
                                <div class="col-md-3">
                                    <?php
							echo rupiah($b->harga);
							?>
                                </div>
                                <div class="col-md-2">
                                    x<?php
							echo $b->qty;
							?>
                                </div>
                                <div class="col-md-3">
                                    <?php
							$stotal = $b->harga * $b->qty;
							echo rupiah($stotal);
							?>
                                </div>
                            </div>
                            <?php endforeach; 
						endforeach;
						?>
                            <br />
                            <br />
                            <br />
                            <i>
                                - Dimohon untuk membayar paling lambat 1 hari setelah pemesanan.
                                <br />
								- Pastikan foto / screenshot bukti pembayaran terlihat jelas.
								<br/>
                                - Setelah upload bukti bayar, status bayar Anda menjadi <span
                                    class="badge success">sudah bayar</span>.
                            </i>
							<br/>
							<br/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg">
                        <div class="card-body">
                            <h4>Payment</h4>
                            <form action="<?php echo base_url('order/process_payment'); ?>" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="kode_pemesanan" value="<?php echo $code; ?>" />
                                <br />
                                <?php
                                foreach($to as $tota):
                                ?>
                                <small>Total Pembayaran</small>
                                <br />
                                <font size="6"><b>Rp <?= number_format($tota->totally, 0, ",", "."); ?></b></font>
                                <p><b>(<?php echo penyebut($tota->totally); ?> Rupiah)</b></p>
                                <?php endforeach; ?>
                                <br />
                                <?php
                                $gbr = $this->db->query("SELECT * FROM pemesanan WHERE kode_pemesanan='$code' GROUP BY kode_pemesanan")->result();
                                foreach($gbr as $pic):
                                if($pic->bukti == null){
                                ?>
                                <small>Metode Bayar</small>
                                <div class="form-group">
                                    <select class="form-control" name="metode_bayar">
                                        <option value="">-- Pilih Metode Bayar --</option>
                                        <option value="BT">Bank Transfer</option>
                                    </select>
                                </div>
                                <br />
                                <small>Upload Bukti Pembayaran</small>
                                <?php
                                    $now = date('Y_m_d');
                                    $pela = $pee['nama_lengkap'];
                                    $paym = $now . "_" . $pela . "_" . $code;
                                ?>
                                <input type="hidden" name="paymento" value="<?php echo $paym; ?>" />
                                <div class="form-group">
                                    <input type="file" name="bukti" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-small">Upload Bukti Bayar</button>
                                </div>
                                <?php }else{ ?>
                                <br />
                                <small>Bukti Pembayaran</small>
                                <br />
                                <img src="<?php echo base_url(); ?>komponen/images/payment/<?php echo $det->bukti; ?>"
                                    width="50%" />
                                <?php }
                                endforeach; 
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
<!-- //new -->