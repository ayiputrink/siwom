<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="<?= base_url() ?>assets/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?= base_url() ?>assets/favicon.ico" type="image/x-icon">
  <title>SIWOM | Daftar</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/js/vendor/bootstrap/bootstrap.min.css">
  <!--  Fonts and icons -->
  <!-- CSS Files -->
  <link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">

</head>

<body id="falcon" class="authentication">
  <!-- Application Content -->
  <div class="wrapper">
    <div class="header header-filter" style="background-image: url('assets/images/login-bg.jpg'); background-size: cover; background-position: top center;">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
            <div class="card card-signup">
              <form class="form" method="POST" action="<?= base_url() ?>Register/aksi_register">
                <div class="header header-primary text-center">
                  <h4>Daftar</h4>
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
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control underline-input" placeholder="Masukan Email">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" placeholder="Password..." class="form-control" />
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="optionsCheckboxes" checked> Saya setuju dengan 
                      <a href="javascript:;">Ketentuan yang Berlaku</a>
                    </label>
                  </div>
                </div>
                <div class="footer text-center mb-20">
                  <button type="submit" class="btn btn-info btn-raised">Daftar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center mt-20">
              <a href="<?= base_url() ?>login" class="text-uppercase text-white">Kembali</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--/ Application Content -->
  <!--  Vendor JavaScripts -->
  <script src="<?= base_url() ?>assets/bundles/libscripts.bundle.js"></script>
  <script src="<?= base_url() ?>assets/bundles/mainscripts.bundle.js"></script>  <!-- Custom Js -->
</body>
</html>