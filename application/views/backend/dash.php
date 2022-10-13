<section class="section">
      <div class="section-body">
			<div class="row ">
			<div class="col-md-12">
				<div class="alert alert-success">
					Selamat Datang <?php echo $admn['nama_admin']; ?>! Berhati - hatilah dalam mengelola halaman ini. Berikut adalah statistik penjualan dari Arwana Store. 
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Semua Transaksi</h5>
                          <h2 class="mb-3 font-18"><font size="8"><?php echo $trans; ?></font></h2>
						  <p class="mb-0">Sudah Bayar: <span class="col-green"><?php echo $transpayed; ?> Transaksi</span>
						  <br/>
						  Belum Bayar: <span class="col-red"><?php echo $transnonpayed; ?> Transaksi</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>komponen/backend/assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Semua Pelanggan</h5>
                          <h2 class="mb-3 font-18"><font size="8"><?php echo $cust; ?></font></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>komponen/backend/assets/img/banner/2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Total Belum Bayar</h5>
                          <h2 class="mb-3 font-18"><font size="6"><?php echo rupiah($totala['tooa']); ?></font></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>komponen/backend/assets/img/banner/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Total Pendapatan</h5>
                          <h2 class="mb-3 font-18"><font size="6"><?php echo rupiah($total['too']); ?></font></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>komponen/backend/assets/img/banner/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<?php
					$baa = date('m');
					$jual = $this->db->query("SELECT nama_produk, SUM(qty) AS toot
					FROM pemesanan
					JOIN produk ON produk.id_produk=pemesanan.id_produk
					WHERE MONTH(tanggal_pemesanan) = '$baa'
					GROUP BY pemesanan.id_produk ORDER BY rand() LIMIT 4")->result();
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
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Grafik Penjualan Bulan Ini</h4>
                  </div>
                  <div class="card-body">
                    <canvas id="myChart"></canvas>
					<center><span><i>Ditentukan dengan satuan ekor.</i></span></center>
					<br/>
					<br/>
					<a href="" class="btn btn-success btn-block">Lihat Semua</a>
                  </div>
                </div>
              </div>
          </div>
	  </div>
</section>
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