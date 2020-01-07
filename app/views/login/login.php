<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> <?php echo CONFIG::$PROJECT_NAME; ?> | Sign In </title>
	<!-- ================== GOOGLE FONTS ==================-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
	<!-- ======================= GLOBAL VENDOR STYLES ========================-->
	<link rel="stylesheet" href="public/assets/css/vendor/bootstrap.css">
	<link rel="stylesheet" href="public/assets/vendor/metismenu/dist/metisMenu.css">
	<link rel="stylesheet" href="public/assets/vendor/switchery-npm/index.css">
	<link rel="stylesheet" href="public/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
	<!-- ======================= LINE AWESOME ICONS ===========================-->
	<link rel="stylesheet" href="public/assets/css/icons/line-awesome.min.css">
	<!-- ======================= DRIP ICONS ===================================-->
	<link rel="stylesheet" href="public/assets/css/icons/dripicons.min.css">
	<!-- ======================= MATERIAL DESIGN ICONIC FONTS =================-->
	<link rel="stylesheet" href="public/assets/css/icons/material-design-iconic-font.min.css">
	<!-- ======================= GLOBAL COMMON STYLES ============================-->
	<link rel="stylesheet" href="public/assets/css/common/main.bundle.css">
	<!-- ======================= LAYOUT TYPE ===========================-->
	<link rel="stylesheet" href="public/assets/css/layouts/vertical/core/main.css">
	<!-- ======================= MENU TYPE ===========================================-->
	<link rel="stylesheet" href="public/assets/css/layouts/vertical/menu-type/default.css">
	<!-- ======================= THEME COLOR STYLES ===========================-->
	<link rel="stylesheet" href="public/assets/css/layouts/vertical/themes/theme-a.css">
</head>

<body>
	<div class="container">
		<form class="sign-in-form" action="index.html">
			<div class="card">
				<div class="card-body">
					<a href="index.html" class="brand text-center d-block m-b-20">
						<img src="public/assets/img/qt-logo@2x.png" alt="QuantumPro Logo" />
					</a>
					<h5 class="sign-in-heading text-center m-b-20">Sign in to your account</h5>
					<div class="form-group">
						<label for="inputEmail" class="sr-only">Email address</label>
						<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="">
					</div>

					<div class="form-group">
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
					</div>
					<div class="checkbox m-b-10 m-t-20">
						<div class="custom-control custom-checkbox checkbox-primary form-check">
							<input type="checkbox" class="custom-control-input" id="stateCheck1" checked="">
							<label class="custom-control-label" for="stateCheck1">	Remember me</label>
						</div>
						<a href="auth.forgot-password.html" class="float-right">Forgot Password?</a>
					</div>
					<button class="btn btn-primary btn-rounded btn-floating btn-lg btn-block" type="submit">Sign In</button>
				 <p class="text-muted m-t-25 m-b-0 p-0">Don't have an account yet?<a href="auth.register.html"> Create an account</a></p>
				</div>

			</div>
		</form>
	</div>

	<!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
	<script src="public/assets/vendor/modernizr/modernizr.custom.js"></script>
	<script src="public/assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="public/assets/vendor/js-storage/js.storage.js"></script>
	<script src="public/assets/vendor/js-cookie/src/js.cookie.js"></script>
	<script src="public/assets/vendor/pace/pace.js"></script>
	<script src="public/assets/vendor/metismenu/dist/metisMenu.js"></script>
	<script src="public/assets/vendor/switchery-npm/index.js"></script>
	<script src="public/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- ================== GLOBAL APP SCRIPTS ==================-->
	<script src="public/assets/js/global/app.js"></script>
</body>

</html>
