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
            <br/>
            <br/>
            <?php echo $this->session->flashdata('succ'); ?>
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Edit Products</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-12">
                      <form action="<?php echo base_url('backend/products/editprod'); ?>" method="POST">
                        <input type="hidden" name="pid" value="<?php echo $predit['product_id']; ?>">
                        <div class="form-group">
                          <label>Nama Produk</label>
                          <input type="text" name="product_name" class="form-control" value="<?php echo $predit['product_name']; ?>" required />
                        </div>
                        <div class="form-group">
                          <label>Deskripsi Produk</label>
                          <textarea class="form-control" name="descripti" rows="10" ><?php echo $predit['descripti']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="number" name="price" class="form-control" value="<?php echo $predit['price']; ?>" required />
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success">Edit Product</button>
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
    </div>
  </div>