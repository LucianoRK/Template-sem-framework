<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title> <?php echo CONFIG::$PROJECT_NAME; ?> | Fazer login </title>
	<!-- ================== GOOGLE FONTS ==================-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
	<!-- ======================= GLOBAL VENDOR STYLES ========================-->
	<link rel="stylesheet" href="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/css/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/vendor/metismenu/dist/metisMenu.css">
	<link rel="stylesheet" href="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/vendor/switchery-npm/index.css">
	<link rel="stylesheet" href="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
	<!-- ======================= LINE AWESOME ICONS ===========================-->
	<link rel="stylesheet" href="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/css/icons/line-awesome.min.css">
	<!-- ======================= DRIP ICONS ===================================-->
	<link rel="stylesheet" href="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/css/icons/dripicons.min.css">
	<!-- ======================= MATERIAL DESIGN ICONIC FONTS =================-->
	<link rel="stylesheet" href="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/css/icons/material-design-iconic-font.min.css">
	<!-- ======================= GLOBAL COMMON STYLES ============================-->
	<link rel="stylesheet" href="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/css/common/main.bundle.css">
	<!-- ======================= LAYOUT TYPE ===========================-->
	<link rel="stylesheet" href="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/css/layouts/vertical/core/main.css">
	<!-- ======================= MENU TYPE ===========================================-->
	<link rel="stylesheet" href="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/css/layouts/vertical/menu-type/default.css">
	<!-- ======================= THEME COLOR STYLES ===========================-->
	<link rel="stylesheet" href="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/css/layouts/vertical/themes/theme-a.css">
</head>

<body>

	<div class="container">
		<form class="sign-in-form" action="<?php echo CONFIG::getBaseUrl(); ?>/entrando/sistema" method="POST">
			<div class="card">
				<?php if (isset($error) && !empty($error)) { ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Atenção !</strong> <?php echo $error; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true" class="la la-close"></span>
						</button>
					</div>
				<?php } ?>
				
				<div class="card-body">
					<a href="" class="brand text-center d-block m-b-20">
						<img src="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/img/qt-logo@2x.png" alt="QuantumPro Logo" />
					</a>
					<h5 class="sign-in-heading text-center m-b-20"> Entre com sua conta </h5>
					<div class="form-group">
						<label for="inputText" class="sr-only"> Login </label>
						<input type="text" id="inputText" class="form-control" name="login" placeholder="Login de acesso" required="">
					</div>

					<div class="form-group">
						<label for="inputPassword" class="sr-only"> Senha </label>
						<input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required="">
					</div>
					<button class="btn btn-primary btn-rounded btn-floating btn-lg btn-block" type="submit"> Entrar </button>
				</div>
			</div>
		</form>
	</div>

	<!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
	<script src="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/vendor/modernizr/modernizr.custom.js"></script>
	<script src="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/vendor/js-storage/js.storage.js"></script>
	<script src="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/vendor/js-cookie/src/js.cookie.js"></script>
	<script src="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/vendor/pace/pace.js"></script>
	<script src="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/vendor/metismenu/dist/metisMenu.js"></script>
	<script src="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/vendor/switchery-npm/index.js"></script>
	<script src="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- ================== GLOBAL APP SCRIPTS ==================-->
	<script src="<?php echo CONFIG::getBaseUrl(); ?>/public/assets/js/global/app.js"></script>
</body>

</html>