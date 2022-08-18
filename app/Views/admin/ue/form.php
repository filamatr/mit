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
				<p class="login-box-msg">UE</p>

				<form action="<?=base_url();?>/ue/add" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="nom_ue"
							placeholder="Nom UE">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="credit"
							placeholder="Crédit">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">

						<select class="form-control" aria-label="Default select example" name=id_parcours>
							<option selected>Parcours</option>
							<?php foreach($parcours as $p): ?>
							<option value="<?=$p['id_parcours'];?>"><?=$p['nom_parcours'];?></option>
							<?php endforeach;?>
						</select>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="semestre"
							placeholder="Semestre">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<button type="submit" name="valid" value="valid"
								class="btn btn-primary btn-block">Valider</button>
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
