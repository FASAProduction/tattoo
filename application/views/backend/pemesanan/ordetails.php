<section class="section">
      <div class="section-body">
			<div class="row">
              <div class="col-12">
				<div class="alert alert-success">
				Berikut adalah detailnya.
				</div>
				<br/>
                <div class="card">
                  <div class="card-header">
                    <h4>Detail Transaksi <?php echo $cdo; ?></h4>
					<div class="card-header-action">
                      <a href="" data-toggle="modal" data-target=".detail<?php echo $cdo; ?>" class="btn btn-success">
                        Lebih Lanjut
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
                            <th>Nama Produk</th>
                            <th>Tanggal Pemesanan</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php
						$no = 1;
						foreach($ordet as $or):
						?>
                          <tr>
                            <td>
                              <?php echo $no++; ?>
                            </td>
                            <td><?php echo $or->nama_produk; ?></td>
                            <td><?php echo format_indo($or->tanggal_pemesanan); ?></td>
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
<?php $this->load->view('backend/inc/detail_modaal_spec'); ?>