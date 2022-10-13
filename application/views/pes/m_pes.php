<!-- new -->
	<div class="newproducts-w3agile">
		<div class="container">
			<h3>Pesanan Saya</h3>
			<br/>
			<br/>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<?php
							if($ordht > 0){
							foreach($ord as $ca):
							$code = $ca->kode_pemesanan;
							$t = $this->db->query("SELECT SUM(total) as ttl FROM pemesanan WHERE kode_pemesanan='$code'")->row_array();
							$total = $t['ttl'];
							?>
				<div class="col-md-6">
					<div class="card bg">
						<div class="card-body">
							<?php
							$pp = $this->session->userdata('ses_id');
							$r = $this->db->query("SELECT MAX(kode_pemesanan) as upper FROM pemesanan WHERE id_pelanggan='$pp'")->row_array();
							$ea = $r['upper'];
							if($code == $ea){
							?>
							<img class="latest" src="<?php echo base_url(); ?>komponen/images/latest.png" />
							<?php }else{ }?>
							<h3><?php echo $ca->kode_pemesanan; ?></h3>
							<hr/>
							<small>Tanggal Pembelian</small>
							<br/>
							<b><font size="4"><?php echo format_indo($ca->tanggal_pemesanan); ?></font></b>
							<br/>
							<br/>
							<small>Total</small>
							<br/>
							<b><font size="4"><?php echo rupiah($total); ?></font></b>
							<hr/>
							<a href="<?php echo base_url('order/detail/'); ?><?php echo $ca->kode_pemesanan; ?>" class="btn lengk btn-block">Details</a>
							<br/>
							<img class="bg-logom" src="<?php echo base_url(); ?>komponen/images/arwanalogo2.png" />
						</div>
					</div>
				</div>
				<?php endforeach; 
							}else{
				?>
				<div class="col-md-12">
					<div class="card-bg">
						<div class="card-body">
							<center>
							Anda tidak memesan apapun.
							<br/>
							<br/>
							<a href="" class="btn lengk">Belanja Sekarang</a>
							</center>
						</div>
					</div>
				</div>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //new -->