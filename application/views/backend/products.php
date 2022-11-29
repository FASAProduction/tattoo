<div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12 mb-xl-0 mb-12">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('<?php echo base_url(); ?>komponen/admin/img/curved-images/curved14.jpg');">
                  <span class="mask bg-gradient-dark"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="fas fa-wifi text-white p-2"></i>
                    <h5 class="text-white mt-4 mb-5 pb-2">THREEFALSE PRODUCTS</h5>
                    <div class="d-flex">
                      <div class="d-flex">
                        
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php echo $this->session->flashdata('succ'); ?>
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Tambah Products</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-12">
                      <form action="<?php echo base_url('backend/products/addprod'); ?>" method="POST">
                        <div class="form-group">
                          <label>Nama Produk</label>
                          <input type="text" name="product_name" class="form-control" placeholder="Masukkan Nama Produk" required />
                        </div>
                        <div class="form-group">
                          <label>Deskripsi Produk</label>
                          <textarea class="form-control" name="descripti" rows="10" placeholder="Masukkan deskripsi produk"></textarea>
                        </div>
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="number" name="price" class="form-control" placeholder="Masukkan Harga Produk" required />
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success">Add Product</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">All Products (<?php echo $products; ?>)</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <div class="row">
                <?php
                if($products > 0){
                  foreach($producto as $prd):
                  	$pid = $prd->alias;
                  	$pida = $prd->product_id;
                ?>
                <div class="col-md-4">
                	<div class="card auch">
	                	<div class="card-body">
	                		<h4><?php echo $prd->product_name; ?></h4>
	                		<h5><?php echo rupiah($prd->price); ?></h5>
	                		<br/><br/>
	                		<?php
	                		if($prd->descripti==null){
	                		?>
	                		<p><i>No Description.</i></p>
	                	<?php }else{ ?>
	                		<p><?php echo $prd->descripti; ?></p>
	                	<?php } ?>
	                	<br/><br/>
	                	<div class="row">
	                		<div class="col-md-6">
	                			<a href="<?php echo base_url('backend/products/edit/'); ?><?php echo $pida; ?>" class="btn btn-success"><i class="fa fa-pencil"></i>  Edit</a>
	                		</div>
	                		<div class="col-md-6">
	                			<a href="<?php echo base_url('backend/products/del/'); ?><?php echo $pid; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>  Hapus</a>
	                		</div>
	                	</div>
	                	</div>
                	</div>
                </div>
                <?php
                endforeach;
                }else{
                ?>
                <div class="col-md-12">
                  <center><i>Tidak ada produk.</i></center>
                </div>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>