<div class="modal fade addproduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content bege">
              <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
				<form action="<?php echo base_url('backend/products/add'); ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" class="form-control" name="nama_produk" required />
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" name="deskripsi" rows="10" required></textarea>
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input type="number" class="form-control" name="stok" required />
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="number" class="form-control" name="harga" required />
					</div>
					<div class="form-group">
						<label>Gambar Produk</label>
						<input type="file" class="form-control" name="gambar" accept="image/png, image/jpeg, image/jpg" required />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-block">Tambahkan</button>
					</div>
				</form>
              </div>
            </div>
          </div>
        </div>