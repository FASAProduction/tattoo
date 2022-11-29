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
                    <h5 class="text-white mt-4 mb-5 pb-2">THREEFALSE GALLERY</h5>
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
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Tambah Gallery</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-12">
                      <form action="<?php echo base_url('backend/gallery/addgal'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label>Nama Produk</label>
                          <select class="form-control" name="product_id" required>
                            <?php
                            $a = $this->db->query("SELECT * FROM products")->num_rows();
                            $b = $this->db->query("SELECT * FROM products")->result();

                            if($a > 0){
                            ?>
                            <option value=""> -- Pilih Salah Satu --</option>
                            <?php
                            foreach($b as $bb):
                            ?>
                            <option value="<?php echo $bb->product_id; ?>"><?php echo $bb->product_name; ?></option>
                            <?php
                            endforeach;
                            }else{
                            ?>
                            <option value=""><i>Tidak ada data ditemukan.</i></option>
                          <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Tampilkan di Home?</label>
                            <select class="form-control" name="show" required>
                                <option value="">== Pilih ==</option>
                                <option value="Y">Ya</option>
                                <option value="N">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Foto</label>
                          <input type="file" name="content" class="form-control" placeholder="Masukkan Foto" required>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success">Add Gallery</button>
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
              <h6 class="mb-0">All Gallery (<?php echo $gallery; ?>)</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <div class="row">
                <?php
                if($gallery > 0){
                  foreach($galeria as $ga):
                    $galid = $ga->gallery_id;
                ?>
                <div class="col-md-3">
                  <div class="card auch">
                    <div class="card-body">
                      <h5><?php echo $ga->product_name; ?></h5>
                      <img class="img-fluid" src="<?php echo base_url(); ?>komponen/images/gallery/<?php echo $ga->contents; ?>" />
                      <br/>
                      <br/>
                      <?php
                      $get = $this->db->query("SELECT * FROM gallery")->row_array();
                      
                      $geta = $get['showed'];
                      
                      if($geta=="N"){
                      ?>
                      <a href="<?php echo base_url('backend/gallery/tampilkan/'); ?><?php echo $galid; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                      <?php }else{ ?>
                      <a href="<?php echo base_url('backend/gallery/tampilkan/'); ?><?php echo $galid; ?>" class="btn btn-success"><i class="fa fa-eye-slash"></i></a>
                      <?php } ?>
                      <a href="<?php echo base_url('backend/gallery/del/'); ?><?php echo $galid; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                  </div>
                </div>
                <?php
                endforeach;
                }else{
                ?>
                <div class="col-md-12">
                  <center><i>Tidak ada foto galeri.</i></center>
                </div>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>