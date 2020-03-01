<!doctype html>
<html class="no-js" lang="">

<head>
<meta charset="utf-8" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<title>SIWOM | Lupa Password</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<link rel="stylesheet" href="<?= base_url() ?>assets/js/vendor/bootstrap/bootstrap.min.css">
<!-- CSS Files -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/vendor/animsition.min.css">
<link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
</head>

<body id="falcon" class="authentication">
<div class="wrapper">
	<div class="header header-filter" style="background-image: url('<?= base_url() ?>assets/images/login-bg.jpg'); background-size: cover; background-position: top center;">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
					<div class="card card-signup">
						<form class="form" method="post" action="<?= base_url() ?>aksi_lupa_password">
							<div class="header header-primary text-center">
								<h4>Lupa Password?</h4>
							</div>
							<h3 class="mt-0">SIWOM</h3>
							<p class="text-muted p-15">Masukan email anda untuk mengubah password.</p>
							<div class="content">
								<div class="form-group">
									<input type="email" class="form-control underline-input" placeholder="Masukan Email Anda">
								</div>
							</div>
							<div class="footer text-center mb-20">
								<button type="submit" class="btn btn-info btn-raised">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center mt-20"> <a href="<?= base_url() ?>" class="text-uppercase text-white">Kembali</a> </div>
				</div>
			</div>
		</footer>
	</div>
</div>
<!--  Vendor JavaScripts --> 
<script src="<?= base_url() ?>assets/bundles/libscripts.bundle.js"></script>
<script src="<?= base_url() ?>assets/bundles/mainscripts.bundle.js"></script> <!-- Custom Js -->
</body>
</html>
