<section class="section">
      <div class="section-body">
			<div class="row">
              <div class="col-12">
				<div class="alert alert-success">
				Informasi data pelanggan bisa Anda dapatkan di halaman ini.
				</div>
				<br/>
                <div class="card">
                  <div class="card-header">
                    <h4>Data Pelanggan</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Username</th>
                            <th>Nomor HP</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php
						$no = 1;
						foreach($cust as $cu):
						?>
                          <tr>
                            <td>
                              <?php echo $no++; ?>
                            </td>
                            <td><?php echo $cu->nama_lengkap; ?></td>
                            <td><?php echo $cu->alamat; ?>, <?php echo $cu->nama_provinsi; ?></td>
							<td><?php echo $cu->username; ?></td>
							<td><?php echo $cu->no_hp; ?></td>
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