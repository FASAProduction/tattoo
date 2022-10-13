<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $judul; ?></title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/css/app.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>komponen/backend/assets/css/custom.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>komponen/images/arwanalg.png" />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
		  <img src="<?php echo base_url(); ?>komponen/images/arwanalogo2.png" width="100%" />
			<br/>
			<br/>
			<?php echo $this->session->flashdata('msg'); ?>
			<br/>
            <div class="card card-primary">
              <div class="card-header">
                <h4>Masuk untuk mengelola.</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="<?php echo base_url('backend/auth/login'); ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Mohon isikan username Anda.
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Lupa Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Mohon isikan password Anda.
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Masuk
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url(); ?>komponen/backend/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>komponen/backend/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>komponen/backend/assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>