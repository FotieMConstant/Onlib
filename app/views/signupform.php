<?php
require '../controllers/signupController.php';

$signupController = new signupController();


if(isset($_GET['gotoLoginBtn'])){
   $signupController->loginView();
}

if(isset($_POST['butsubmit'])){
	$maxsize = 2048242880; // 2048MB = 2GB

	 $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $password = $_POST['password'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $reg_date = date("Y-m-d h:i:sa");
	 $gender = $_POST["gender"];
	 $target_dir = "profile/";
	 $picture = $target_dir . $_FILES["file"]["name"];
	 // Select file type
	 $FileType = strtolower(pathinfo($picture,PATHINFO_EXTENSION));

	 
      // Valid file extensions
      $extensions_arr = array("JPEG","PNG","JPG");

      // Check extension
      if( in_array($FileType,$extensions_arr) ){

		// Check file size
		if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
		  echo 'File must be less than 2GB. Check video size';
		}else{
		  // Upload
		  if(move_uploaded_file($_FILES['file']['tmp_name'],$picture)){
			// Insert record
			echo $picture;
		}
		echo $picture;
		}

	 }
	 //echo $password;
	  
	  $signupController->signup($fname, $lname, $password, $email, $phone, $reg_date, $gender, $picture);



  


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Onlib - Sign up for free account!</title>
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
                    <img src="../../public/custom/images/img-02.svg" alt="IMG">
                    <br><br>
                    <center>Join the community of book lovers</center>
				</div>

				<form action="signupform.php" method="POST" class="login100-form validate-form" enctype='multipart/form-data'>
					<span class="login100-form-title">
						Sign up for free!
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid First name is required">
						<input class="input100" type="text" name="fname" placeholder="First name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid last name is required">
						<input class="input100" type="text" name="lname" placeholder="Last name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: example@gmail.com">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid Phone number is required">
						<input class="input100" type="phone" name="phone" placeholder="Phone number here">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid last name is required">
					
					<input id="Male" type="radio" name="gender" value="male" required>
					<label for="Male">Male</label>
					<input id="Female" type="radio" name="gender" value="female">
					<label for="Female">Female</label>
						
					</div>
                  
					<div class="wrap-input100 validate-input" data-validate = "Profile picture is required">
						<input class="input100" type="file" name="file" placeholder="Select file">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">

					<input class="login100-form-btn" value="Let's do this" type="submit" name="butsubmit">
						
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-15">Already have an account?

                        <a class="txt2"  href="signupform.php?gotoLoginBtn">
                                Login
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
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../../public/custom/js/main.js"></script>

</body>
</html>