<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="<?= base_url() ?>assets/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?= base_url() ?>assets/favicon.ico" type="image/x-icon">
  <title>SIWOM | Login</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() ?>assets/js/vendor/bootstrap/bootstrap.min.css">
  <!-- CSS Files -->
  <link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
</head>

<body id="falcon" class="authentication">
  <div class="wrapper">
    <div class="header header-filter" style="background-image: url('assets/images/login-bg.jpg'); background-size: cover; background-position: top center;">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
            <div class="card card-signup">
              <form class="form" action="<?= base_url() ?>login/aksi_login" method="POST">
                <div class="header header-primary text-center">
                  <h4>Masuk</h4>
                </div>
                <h3 class="mt-0">SIWOM</h3>
                <p class="help-block">Sistem Informasi Workload Monitoring</p>
                <?php if ($this->session->flashdata('status_login_gagal') != null) : ?>
                  <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?= $this->session->flashdata('status_login_gagal'); ?>
                   </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('status_login_sukses') != null) : ?>
                  <div class="alert alert-success alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?= $this->session->flashdata('status_login_sukses'); ?> 
                                    </div>
                <?php endif; ?>
                <div class="content">
                  <div class="form-group">
                    <input name="email" type="email" class="form-control underline-input" placeholder="Enter Your Email">
                  </div>
                  <div class="form-group">
                    <input name="password" type="password" placeholder="Password..." class="form-control underline-input">
                  </div>
                  <!-- <div class="checkbox">
                    <label>
                      <input type="checkbox" name="optionsCheckboxes"> Ingat Saya</label>
                  </div> -->
                </div>
                <div class="footer text-center">
                  <button type="submit" class="btn btn-info btn-raised">Login</button>
                </div>
                <a href="<?= base_url() ?>login/lupa_password" class="btn btn-wd">Lupa Password?</a>
              </form>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer mt-20">
        <div class="container">
          <div class="col-lg-12 text-center">
            <a href="<?= base_url() ?>register" class="text-uppercase text-white">Buat Akun</a>
            <div class="copyright text-white mt-20"> &copy; <?= date('Y') ?> SIWOM, made with
              <i class="fa fa-heart heart"></i> by
              Ayi Putri
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--  Vendor JavaScripts -->
  <script src="<?= base_url() ?>assets/bundles/libscripts.bundle.js"></script>
  <script src="<?= base_url() ?>assets/bundles/mainscripts.bundle.js"></script>
  <!-- Custom Js -->
</body>
</html>