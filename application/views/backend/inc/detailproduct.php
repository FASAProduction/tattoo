<?php
foreach($prdct as $dee):
?>
<div class="modal fade detailproduct<?php echo $dee->id_produk; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content bege">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Detail Produk <?php echo $dee->nama_produk; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="card">
							<div class="card-body">
								Nama Produk : <b><?php echo $dee->nama_produk; ?></b>
										<hr/>
										<?php
											if($dee->deskripsi == null){
											?>
										Deskripsi: <b>Tidak ada deskripsi produk.</b>
											<?php }else{ ?>
										Deskripsi: <b><span class="bb"><?php echo $dee->deskripsi; ?></span></b>
											<?php } ?>
										<hr/>
										Harga: <b><?php echo rupiah($dee->harga); ?></b>
										<hr/>
										Stok: <b><?php echo $dee->stok; ?> Ekor</b>
							</div>
						</div>
						<?php
						$delet = $dee->id_produk;
						?>
						<a href="#edit<?php echo $dee->id_produk; ?>" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="edit<?php echo $dee->id_produk; ?>"><span class="badge badge-success"><i class="fa fa-pencil"></i> Edit Produk</span></a>
						<a href="#addstock<?php echo $dee->id_produk; ?>" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="addstock<?php echo $dee->id_produk; ?>"><span class="badge badge-success"><i class="fa fa-plus"></i> Tambah Stok</span></a>
						<a href="<?php echo base_url('backend/products/del/'); ?><?php echo $delet; ?>"><span class="badge badge-danger"><i class="fa fa-trash"></i> Hapus Produk</span></a>
						<br/>
						<br/>
						<br/>
						<div class="collapse" id="edit<?php echo $dee->id_produk; ?>">
						<div class="card">
							<div class="card-body">
								<form action="<?php echo base_url('backend/products/edit'); ?>" method="POST">
									<input type="hidden" name="id_produk" value="<?php echo $dee->id_produk; ?>" />
									<div class="form-group">
										<label>Nama Produk</label>
										<input type="text" class="form-control" name="nama_produk" value="<?php echo $dee->nama_produk; ?>" required />
									</div>
									<div class="form-group">
										<label>Deskripsi</label>
										<textarea class="form-control bb" name="deskripsi" rows="10" required><?php echo $dee->deskripsi; ?></textarea>
									</div>
									<div class="form-group">
										<label>Stok</label>
										<input type="number" class="form-control" name="stok" value="<?php echo $dee->stok; ?>" required />
									</div>
									<div class="form-group">
										<label>Harga</label>
										<input type="number" class="form-control" name="harga" value="<?php echo $dee->harga; ?>" required />
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success btn-block">Ubah data produk</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="collapse" id="addstock<?php echo $dee->id_produk; ?>">
						<div class="card">
							<div class="card-body">
								<form action="<?php echo base_url('backend/products/addstock'); ?>" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="id_produk" value="<?php echo $dee->id_produk; ?>" />
									<div class="form-group">
										<label>Nama Produk</label>
										<input type="text" class="form-control" value="<?php echo $dee->nama_produk; ?>" readonly />
									</div>
									<div class="form-group">
										<label>Stok Saat Ini</label>
										<input type="number" class="form-control" value="<?php echo $dee->stok; ?>" readonly />
									</div>
									<div class="form-group">
										<label>Stok Tambahan</label>
										<input type="number" class="form-control" name="stok" required />
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success btn-block">Tambah Stok</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					</div>
					<div class="col-md-6">
					<?php
					if($dee->gambar == null){
					?>
					<img src="<?php echo base_url(); ?>komponen/images/nophoto.png" class="timbul" />
					<?php }else{ ?>
					<img src="<?php echo base_url(); ?>komponen/images/products/<?php echo $dee->gambar; ?>" class="timbul" />
					<?php } ?>
					<br/>
					<br/>
					<form action="<?php echo base_url('backend/products/picedit'); ?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id_produk" value="<?php echo $dee->id_produk; ?>" />
						<input type="hidden" name="gambara" value="<?php echo $dee->gambar; ?>" />
						<div class="form-group">
							<label>Ganti Gambar</label>
							<input type="file" name="gambar" class="form-control" />
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block">Ubah foto produk</button>
						</div>
					</form>
					<br/>
					</div>
					<br/>
				</div>
              </div>
            </div>
          </div>
        </div>
<?php endforeach; ?>