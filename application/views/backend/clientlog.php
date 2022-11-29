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
                    <h5 class="text-white mt-4 mb-5 pb-2">Client Log</h5>
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
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mt-4">
		<a href="<?php echo base_url('backend/clog/exportexcel'); ?>" class="btn btn-success">Backup Log</a>
		<a href="<?php echo base_url('backend/clog/deleteall'); ?>" class="btn btn-danger">Drop All Data</a>
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Filter Berdasarkan</h6>
            </div>
            <div class="card-body position-relative z-index-1 p-3">
              <div class="row">
                <div class="col-md-3">
                  <form action="<?php echo base_url('backend/clog/ipfilter'); ?>" method="POST">
                    <div class="form-group">
                      <label>IP Address</label>
                      <select class="form-control" name="ipaddr">
                        <option value="">-- Pilih IP Address -- </option>
                        <?php
                        $i = $this->db->query("SELECT ip_address AS ip FROM threefalse_log GROUP BY ip_address")->result();
                        foreach($i as $ipp):
                            $aa = $ipp->ip;
                            $a = $this->db->query("SELECT COUNT(ip_address) as iphtg FROM threefalse_log WHERE ip_address='$aa'")->row_array();
                        ?>
                        <option value="<?php echo $ipp->ip; ?>"><?php echo $ipp->ip; ?> (<?php echo $a['iphtg']; ?>x akses)</option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Filter By IP Address</button>
                    </div>
                  </form>
                </div>
                <div class="col-md-3">
                  <form action="<?php echo base_url('backend/clog/osfilter'); ?>" method="POST">
                    <div class="form-group">
                      <label>Operating System</label>
                      <select class="form-control" name="os">
                        <option value="">-- Pilih Operating System -- </option>
                        <?php
                        $i = $this->db->query("SELECT os FROM threefalse_log GROUP BY os")->result();
                        foreach($i as $os):
                        ?>
                        <option value="<?php echo $os->os; ?>"><?php echo $os->os; ?></option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Filter By Operating System</button>
                    </div>
                  </form>
                </div>
                <div class="col-md-3">
                  <form action="<?php echo base_url('backend/clog/browfilter'); ?>" method="POST">
                    <div class="form-group">
                      <label>Browsers</label>
                      <select class="form-control" name="browsers">
                        <option value="">-- Pilih Browsers -- </option>
                        <?php
                        $i = $this->db->query("SELECT browsers AS brow FROM threefalse_log GROUP BY browsers")->result();
                        foreach($i as $bro):
                        ?>
                        <option value="<?php echo $bro->brow; ?>"><?php echo $bro->brow; ?></option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Filter By Browsers</button>
                    </div>
                  </form>
                </div>
                <div class="col-md-3">
                  <form action="<?php echo base_url('backend/clog/datefilter'); ?>" method="POST">
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" class="form-control" name="tgl" placeholder="Select Date" />
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Filter By Date</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>All Logs (<?php echo $log; ?>)</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IP Address</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Browsers</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Operating System</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date & Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($log > 0){
                    foreach($logg as $lo):
                    ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <span class="badge badge-sm bg-gradient-success"><?php echo $lo->ip_address; ?></span>
                            <?php
                            if($lo->notes==null){
                            ?>
                            <p class="text-xs text-secondary mb-0">No Notes</p>
                            <?php }else{ ?>
                            <p class="text-xs text-secondary mb-0"><?php echo $lo->notes; ?></p>
                            <?php } ?>
                          </div>
                        </div>
                      </td>
                      <td>
                        <?php
                        if($lo->browsers=="Not Detected"){
                        ?>
                        <span class="badge badge-sm bg-gradient-danger"><?php echo $lo->browsers; ?></span>
                        <?php }else{ ?>
                        <span class="badge badge-sm bg-gradient-secondary"><?php echo $lo->browsers; ?></span>
                        <?php } ?>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <?php
                        if($lo->os=="Unknown Platform"){
                        ?>
                        <span class="badge badge-sm bg-gradient-danger"><?php echo $lo->os; ?></span>
                        <?php }else{ ?>
                        <span class="badge badge-sm bg-gradient-warning"><?php echo $lo->os; ?></span>
                        <?php } ?>
                      </td>
                      <td class="align-middle text-center">
                        <h6 class="mb-0 text-sm"><?php echo $lo->datess; ?> -> <?php echo $lo->timess; ?></h6>
                      </td>
                    </tr>
                    <?php endforeach; 
                    }else{
                    ?>
                    <tr>
                      <td colspan="4"><center>Tidak ada data.</center></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>