<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mention IT</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet"
	href="<?=base_url('/');?>/assets/plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet"
	href="<?=base_url('/');?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet"
	href="<?=base_url('/');?>/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="../../index2.html" class="h1"><b>Mention</b> IT</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Note</p>

				<form action="<?=base_url();?>/note/upload" method="post"
					enctype="multipart/form-data">
					<div class="form-group input-group mb-3">

						<div class="input-group mb-3">
							<input type="text" class="form-control" name="id_ecue"
								placeholder="ECUE">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>

						<input type="file" class="form-control" name="upload_file"
							placeholder="Fichier notes" id="upload_file">

						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-file"></span>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-4">
							<button type="submit" name="import" value="Importer"
								class="btn btn-primary btn-block">Importer</button>
						</div>
						<div class="col-4">
							<button type="submit" name="download" value="download"
								class="btn btn-primary btn-block">Télécharger</button>
						</div>
						<!-- /.col -->
					</div>
				</form>



			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?=base_url('/');?>/assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script
		src="<?=base_url('/');?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url('/');?>/assets/dist/js/adminlte.min.js"></script>
</body>
</html>
