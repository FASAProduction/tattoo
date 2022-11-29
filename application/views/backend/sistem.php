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
                    <h5 class="text-white mt-4 mb-5 pb-2">System Settings</h5>
                    <div class="d-flex">
                      <div class="d-flex">
                        <?php
                        $stat = $sstatus['s_status'];

                        if($stat=="Maintenance"){
                        ?>
                        <span class="badge badge-danger">Maintenance In Progress</span>
                      <?php }else{ ?>
                        <span class="badge badge-success">Running</span>
                      <?php } ?>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo $this->session->flashdata('succ'); ?>
      <div class="row">
        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Set Web Status</h6>
            </div>
            <?php
            $sis_id = $sstatus['system_id'];
            ?>
            <div class="card-body position-relative z-index-1 p-3">
              <div class="row">
                <div class="col-md-12">
                  <form action="<?php echo base_url('backend/sistem/toggle'); ?>" method="POST">
                    <input type="hidden" name="sis_id" value="<?php echo $sis_id; ?>">
                    <div class="form-group">
                      <label>Status Web</label>
                      <select class="form-control" name="maintenance">
                        <option value="">-- Pilih Status -- </option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Running">Running</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Set</button>
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