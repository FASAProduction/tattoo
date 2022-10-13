<section class="section">
      <div class="section-body">
			<div class="row">
              <div class="col-12">
				<div class="alert alert-info">
				Anda bisa mencetak faktur penjualan dengan menggunakan halaman ini.
				</div>
				<div class="alert alert-success">
				Ditemukan <?php echo $fil; ?> transaksi pada tanggal <?php echo $from; ?> sampai tanggal <?php echo $to; ?>.
				</div>
              </div>
			  <div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4>Filter</h4>
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('backend/report/filter'); ?>" method="POST">
							<div class="form-group">
								<label>Dari tanggal</label>
								<input type="date" class="form-control" name="from" />
							</div>
							<div class="form-group">
								<label>Sampai tanggal</label>
								<input type="date" class="form-control" name="to" />
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success">Filter</button>
							</div>
						</form>
					</div>
				</div>
				<div class="card">
                  <div class="card-header">
                    <h4>Data Pesanan</h4>
					<div class="card-header-action">
                      <a href="<?php echo base_url('backend/report/fakturperiodic'); ?>?from=<?php echo $from; ?>&to=<?php echo $to; ?>" class="btn btn-success">
                        Cetak faktur
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Kode Pemesanan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Total</th>
                            <th>Status Bayar</th>
                            <th>Status Kirim</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php
						$no = 1;
						foreach($filt as $or):
						?>
                          <tr>
                            <td>
                              <?php echo $no++; ?>
                            </td>
                            <td><?php echo $or->kode_pemesanan; ?></td>
                            <td><?php echo format_indo($or->tanggal_pemesanan); ?></td>
							<td><?php echo rupiah($or->total); ?></td>
							<?php
							if($or->status_bayar == "Belum Bayar"){
							?>
							<td><span class="badge badge-danger badge-shadow"><?php echo $or->status_bayar; ?></span></td>
							<?php }else{ ?>
							<td><span class="badge badge-success badge-shadow"><?php echo $or->status_bayar; ?></span></td>
							<?php }
							
							if($or->status_kirim == "Dikemas"){
							?>
							<td><span class="badge badge-info badge-shadow"><?php echo $or->status_kirim; ?></span></td>
							<?php }else if($or->status_kirim == "Dikirim"){ ?>
							<td><span class="badge badge-warning badge-shadow"><?php echo $or->status_kirim; ?></span></td>
							<?php }else{ ?>
							<td><span class="badge badge-success badge-shadow"><?php echo $or->status_kirim; ?></span></td>
							<?php } ?>
							<td>
							<a href="" data-toggle="modal" data-target=".detail<?php echo $or->kode_pemesanan; ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
							<a href="<?php echo base_url('backend/report/faktur/'); ?><?php echo $or->kode_pemesanan; ?>" class="btn pdf"><i class="fa fa-file-pdf"></i></a>
							</td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
			  </div>
			  
            </div>
	  </div>
</section>
<?php $this->load->view('backend/inc/detail_modal'); ?>