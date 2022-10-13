<?php
foreach($filt as $or):
$ff = $or->kode_pemesanan;
$r = $this->db->query("SELECT * FROM pemesanan JOIN produk ON produk.id_produk=pemesanan.id_produk WHERE kode_pemesanan='$ff'")->result();
$ra = $this->db->query("SELECT * FROM pelanggan
JOIN pemesanan ON pelanggan.id_pelanggan=pemesanan.id_pelanggan
JOIN provinsi ON provinsi.id_provinsi=pelanggan.id_provinsi
WHERE kode_pemesanan='$ff'")->row_array();
$tt = $this->db->query("SELECT SUM(total) as totally FROM pemesanan WHERE kode_pemesanan='$ff'")->row_array();
$totally = $tt['totally'];
?>
<div class="modal fade detail<?php echo $ff; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Detail Pemesanan #<?php echo $ff; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<br/>
				Nama Pelanggan: <b><?php echo $ra['nama_lengkap']; ?></b>
				<br/>
				Alamat: <b><?php echo $ra['alamat']; ?>, <?php echo $ra['nama_provinsi']; ?></b>
				<br/>
				<hr/>
                <h4>Rincian Produk</h4>
				<br/>
				<b>
						<div class="row">
							<div class="col-md-3">
								Nama Produk
							</div>
							<div class="col-md-3">
								Harga
							</div>
							<div class="col-md-3">
								Qty
							</div>
							<div class="col-md-3">
								Subtotal
							</div>
						</div>
						</b>
						<hr/>
						<?php
						foreach($r as $we):
						?>
						<div class="row">
							<div class="col-md-3">
								<?php echo $we->nama_produk; ?>
							</div>
							<div class="col-md-3">
								<?php echo rupiah($we->harga); ?>
							</div>
							<div class="col-md-3">
								<?php echo $we->qty; ?> Ekor
							</div>
							<?php
							$subtotal = 0;
							$subtotal = $we->harga * $we->qty;
							?>
							<div class="col-md-3">
								<?php echo rupiah($subtotal); ?>
							</div>
						</div>
						<?php endforeach; ?>
						<hr/>
						<div class="row">
							<div class="col-md-3">
							</div>
							<div class="col-md-3">
							</div>
							<div class="col-md-3">
							Total
							</div>
							<div class="col-md-3">
							<b><?php echo rupiah($totally); ?></b>
							</div>
						</div>
              </div>
            </div>
          </div>
        </div>
<?php
endforeach;
?>