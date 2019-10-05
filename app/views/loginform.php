<?php
//Importing our login controller
require '../controllers/loginController.php';

$loginController = new loginController();


if(isset($_GET['gotoSignupBtn'])){
    $loginController->signUp();
}

if(isset($_GET['butsubmit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

    $loginController->login($email, $password);
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Onlib - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../public/custom/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../public/custom/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../public/custom/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../public/custom/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../public/custom/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../public/custom/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../public/custom/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
                    <img src="../../public/custom/images/img-01.svg" alt="IMG">
                    <br><br>
                    <center>Welcome back, book lover<center>
				</div>

				<form class="login100-form validate-form" action="loginform.php?butsubmit" method="POST">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: example@gmail.com">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
					<input class="login100-form-btn" value="log me in" type="submit" name="butsubmit">
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-19">Don't have an account yet?
                   
						<a class="txt2" href="loginform.php?gotoSignupBtn"><br>
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="../../public/custom/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../public/custom/vendor/bootstrap/js/popper.js"></script>
	<script src="../../public/custom/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../public/custom/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../public/custom/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1
		})
	</script>
<!--===============================================================================================-->
	<script src="../../public/custom/js/main.js"></script>

</body>
</html>