<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $judul; ?> </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>komponen/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?php echo base_url(); ?>komponen/images/logo.svg" alt="logo">
              </div>
              <h4>Halo, silakan login!</h4>
              <form class="pt-3" action="<?php echo base_url('auth/login'); ?>" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Nama Pengguna">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Kata Sandi">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">MASUK</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url(); ?>komponen/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo base_url(); ?>komponen/vendors/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>komponen/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>komponen/vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url(); ?>komponen/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>komponen/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url(); ?>komponen/js/template.js"></script>
  <script src="<?php echo base_url(); ?>komponen/js/settings.js"></script>
  <script src="<?php echo base_url(); ?>komponen/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url(); ?>komponen/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>komponen/js/dashboard.js"></script>
  <script src="<?php echo base_url(); ?>komponen/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <!-- endinject -->
</body>

</html>