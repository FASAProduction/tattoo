<section class="section">
      <div class="section-body">
			<div class="row ">
			<div class="col-md-12">
				<div class="alert alert-success">
					Data produk bisa Anda akses di halaman ini. Anda juga dapat mengelola produk (menambah atau mengurangi produk dan stok) di halaman ini. 
				</div>
			</div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<a href="" data-toggle="modal" data-target=".addproduct" class="touch">
              <div class="card wadaw">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="card-content tgh">
					  <h2>Tambah Produk</h2>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
			</a>
            </div>
			<?php echo $this->session->flashdata('succ'); ?>
            <div class="col-md-12">
				<div class="card">
                  <div class="card-header">
                    <h4>Data Produk</h4>
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
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php
						$no = 1;
						foreach($prdct as $prd):
						?>
                          <tr>
                            <td>
                              <?php echo $no++; ?>
                            </td>
                            <td><?php echo $prd->nama_produk; ?></td>
                            <td><?php echo rupiah($prd->harga); ?></td>
							<td>
							<?php
							if($prd->stok < 6){
							?>
							<?php echo $prd->stok; ?> 
							<a href=""><span class="badge badge-success ov"><i class="fa fa-plus"></i></span></a>
							<?php }else{
								echo $prd->stok;
							} ?>
							</td>
							<td>
							 <a href="" data-toggle="modal" data-target=".detailproduct<?php echo $prd->id_produk; ?>"><span class="badge badge-info"><i class="fa fa-eye"></i></span></a>
							</td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3>Statistik Penjualan Produk</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<?php
							$juala = $this->db->query("SELECT nama_produk, SUM(qty) AS toot
								FROM pemesanan
								JOIN produk ON produk.id_produk=pemesanan.id_produk
								WHERE status_kirim='Selesai'
								GROUP BY pemesanan.id_produk")->result();
							?>
							<div class="col-md-6">
								<h4>Visual</h4>
								<br/>
								<br/>
								<b>
								<div class="row">
									<div class="col-md-6">
									Nama Produk
									</div>
									<div class="col-md-6">
									Jumlah Pembelian
									</div>
								</div>
								</b>
								<hr/>
								<?php
								foreach($juala as $sell):
								?>
								<div class="row">
									<div class="col-md-6">
									<?php echo $sell->nama_produk; ?>
									</div>
									<div class="col-md-6">
									<?php echo $sell->toot; ?> Ekor
									</div>
								</div>
								<?php endforeach; ?>
							</div>
								<?php
								$jual = $this->db->query("SELECT nama_produk, SUM(qty) AS toot
								FROM pemesanan
								JOIN produk ON produk.id_produk=pemesanan.id_produk
								WHERE status_kirim='Selesai'
								GROUP BY pemesanan.id_produk")->result();
								$nama_produk= "";
								$jumlah=null;
								foreach ($jual as $item)
								{
									$prodd=$item->nama_produk;
									$nama_produk .= "'$prodd'". ", ";
									$jum=$item->toot;
									$jumlah .= "$jum". ", ";
								}
								?>
							<div class="col-md-6">
								<h4>Grafik</h4>
								<br/>
								<br/>
								<canvas id="myChart"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
          </div>
	  </div>
</section>
<?php $this->load->view('backend/inc/addproducts'); ?>
<?php $this->load->view('backend/inc/detailproduct'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script>
		var ctx = document.getElementById('myChart').getContext('2d');
				var chart = new Chart(ctx, {
					// The type of chart we want to create
					type: 'pie',
					// The data for our dataset
					data: {
						labels: [<?php echo $nama_produk; ?>],
						datasets: [{
							label:'Data Penjualan Arwana',
							backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
							borderColor: ['rgb(255, 99, 132)'],
							data: [<?php echo $jumlah; ?>]
						}]
					},
					// Configuration options go here
					
				});
	</script>
