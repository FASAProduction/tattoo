<div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					  <div class="row">
						<div class="col-md-12 col-sm-12">
						<h3>Transaksi Sekarang</h3>
						<form action="<?php echo base_url('transaction/querya'); ?>" method="POST">
							<div class="form-group">
								<label>Cari Produk</label>
								<input type="text" placeholder="Cari disini...." class="form-control" name="cari" />
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success">Cari</button>
							</div>
						</form>
					  </div>
					</div>
				  </div>
              </div>
</div>
<div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					  <div class="row">
						<div class="col-md-12 col-sm-12">
						<h3>List Produk</h3>
					  </div>
					</div>
				  </div>
              </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Keranjang Belanja</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Nama Produk
                          </th>
                          <th>
                            Harga
                          </th>
                          <th>
                            Qty
                          </th>
                          <th>
                            Subtotal
                          </th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  if($cartos > 0){
					  $no = 1;
					  foreach($carto as $crt):
					  $subtotal = $crt->product_price * $crt->qty;
					  ?>
                        <tr>
                          <td class="py-1">
                            <?php echo $no++; ?>
                          </td>
                          <td>
                            <?php echo "[" .$crt->product_code. "] " . $crt->product_name; ?> 
                          </td>
                          <td>
                            <?php echo rupiah($crt->product_price); ?>
                          </td>
                          <td>
                            <?php echo "x" . $crt->qty; ?>
                          </td>
                          <td>
                            <?php echo rupiah($subtotal); ?>
                          </td>
                        </tr>
                        <?php endforeach; 
					  }else{
						?>
						<tr>
                          <td class="py-1" colspan="5">
                            <center>Belum ada produk yang akan dibeli</center>
                          </td>
                        </tr>
					  <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
			
