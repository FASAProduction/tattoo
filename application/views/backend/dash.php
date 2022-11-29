<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-6 col-sm-6 mb-xl-4 mb-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Products</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php echo $products; ?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <a href="<?php echo base_url('backend/products'); ?>">
                    <i class="ni ni-send text-lg opacity-10" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Gallery</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php echo $gallery; ?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <a href="<?php echo base_url('backend/gallery'); ?>">
                    <i class="ni ni-send text-lg opacity-10" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        $addm = $adma['adm_id'];

        if($addm=="2"){
        ?>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Log</p>
                    <h5 class="font-weight-bolder mb-0">
                      
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <a href="<?php echo base_url('backend/clog'); ?>">
                      <i class="ni ni-send text-lg opacity-10" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Sistem Settings</p>
                    <h5 class="font-weight-bolder mb-0">
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <a href="<?php echo base_url('backend/sistem'); ?>">
                      <i class="ni ni-send text-lg opacity-10" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php }else {} ?>
      </div>
    </div>