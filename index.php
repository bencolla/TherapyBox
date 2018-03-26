<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Therapybox - Login</title>
		
		<!-- BEGIN META -->
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Login to your dashboard">
		<!-- END META -->

        <?php include_once 'header.php'?>

	</head>

	<body class="main-background text-white">
	
	<!-- BEGIN LOGIN SECTION -->
	<section>
		<form id="loginform" class="form" role="form">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="text-primary text-white text-center l-s-3">Hackathon</h1>
			</div>

			<div class="card contain-sm style-transparent">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group floating-label">
								<input class="form-control" name="username" id="username" type="text" required>
								<label for="username">Username</label>
							</div>
						</div><!--end .col -->
						<div class="col-sm-5 col-sm-offset-1">
							<div class="form-group floating-label">
								<input class="form-control" name="password" id="password" type="password" required>
								<label for="password">Password</label>
							</div>
						</div><!--end .col -->
					</div><!--end .row -->
					<div id="login-error" class="alert alert-callout alert-danger hide" role="alert">

					</div>
				</div><!--end .card-body -->
			</div>


			<div class="col-md-12 text-center">
				<button class="btn btn-yellow btn-raised btn-long" type="submit">Login</button>
			</div>

			<p class="footer-text text-center text-lg l-s-3">New to hackathon? <a href="register.php" class="text-yellow">Sign Up</a></p>
		</div>
		</form>
	</section>
	<!-- END LOGIN SECTION -->

    <?php include_once 'footer.php'?>
    <!-- CUSTOM JS -->
    <script src="assets/js/login.js"></script>

	</body>
</html>