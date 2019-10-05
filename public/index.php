<?php 


require '../app/controllers/indexController.php';

$indexController = new indexController();


if(isset($_GET['loginButton'])){
   $indexController->loginView();
}

if(isset($_GET['signupButton'])){
    $indexController->signUp();
}


?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home &mdash; Best free online book library</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>


<div id="page-wrap">


	<!-- ==========================================================================================================
													   HERO
		 ========================================================================================================== -->

	<div id="fh5co-hero-wrapper">
		<nav class="container navbar navbar-expand-lg main-navbar-nav navbar-light">
			<a class="navbar-brand" href="">Onlib</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav nav-items-center ml-auto mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					
				</ul>
				<div class="social-icons-header">
					<a href="https://www.facebook.com/fh5co"><i class="fab fa-facebook-f"></i></a>
					<a href="https://freehtml5.co"><i class="fab fa-instagram"></i></a>
					<a href="https://www.twitter.com/fh5co"><i class="fab fa-twitter"></i></a>
				</div>
			</div>
		</nav>

		<div class="container fh5co-hero-inner">
			<h1 class="animated fadeIn wow" data-wow-delay="0.4s">The world's most-loved online library platform</h1>
			<p class="animated fadeIn wow" data-wow-delay="0.67s">Onlib connects a global community of readers and writers through the power of reading. </p>
			<!-- Buttons -->
		<form action="index.php" method="GET">
			<button class="btn btn-md download-btn-first wow fadeInLeft animated" data-wow-delay="0.85s" name="loginButton">Login</button>
			<button class="btn btn-md features-btn-first animated fadeInLeft wow" data-wow-delay="0.95s" name="signupButton">sign up</button>
		</form>	
			<img class="fh5co-hero-smartphone animated fadeInRight wow" data-wow-delay="1s" src="img/phone-image.svg" alt="Smartphone">
		</div>


	</div> <!-- first section wrapper -->


	<!-- ==========================================================================================================
													 ADVANTAGES
		 ========================================================================================================== -->

	<div class="fh5co-advantages-outer">
		<div class="container">
			<h1 class="second-title"><span class="span-perfect">Perfect</span> <span class="span-features"></span></h1>
			<small>Only necessary</small>

			<div class="row fh5co-advantages-grid-columns wow animated fadeIn" data-wow-delay="0.36s">

				<div class="col-sm-4">
					<img class="grid-image" src="img/icon-1.png" alt="Icon-1">
					<h1 class="grid-title">Usability</h1>
					<p class="grid-desc">Easy to use. from any platform</p>
				</div>

				<div class="col-sm-4">
					<img class="grid-image" src="img/icon-2.png" alt="Icon-2">
					<h1 class="grid-title">All level writers</h1>
					<p class="grid-desc">whether you are a professional or a beginer you can get your book published here .</p>
				</div>

				<div class="col-sm-4">
					<img class="grid-image" src="img/icon-3.png" alt="Icon-3">
					<h1 class="grid-title">Good content</h1>
					<p class="grid-desc">the books provided here are books from professional editors.</p>
				</div>


			</div>
		</div>
	</div>


	<!-- ==========================================================================================================
													  SLIDER
		 ========================================================================================================== -->

	<div class="fh5co-slider-outer wow fadeIn" data-wow-delay="0.36s">
		<h1>SIMPLE TO USE</h1>
		<small>Read any where from any platformm with audio Podcasts</small>
		<div class="container fh5co-slider-inner">

			<div class="owl-carousel owl-theme">

				<div class="item"><img src="img/smartphone-1.svg" alt=""></div>
				<div class="item"><img src="img/smartphone-2.svg" alt=""></div>
				<div class="item"><img src="img/smartphone-3.svg" alt=""></div>
				<div class="item"><img src="img/smartphone-4.svg" alt=""></div>


			</div>

		</div>
	</div>


	<!-- ==========================================================================================================
													  FEATURES
		 ========================================================================================================== -->

	<div class="curved-bg-div wow animated fadeIn" data-wow-delay="0.15s"></div>
	<div id="fh5co-features" class="fh5co-features-outer">
		<div class="container">

			<div class="row fh5co-features-grid-columns">

				<div class="col-sm-6 in-order-1 wow animated fadeInLeft" data-wow-delay="0.22s">
					<div class="col-sm-image-container">
						<img class="img-float-left" src="img/smartphone-1.PNG" alt="smartphone-1">
						
						<span class="span-free">NEW</span>
					</div>
				</div>

				<div class="col-sm-6 in-order-2 sm-6-content wow animated fadeInRight" data-wow-delay="0.22s">
					<h1>Best Content</h1>
					<p>The world's best library content! </p>
					<span class="circle circle-first"><i class="fab fa-instagram"></i></span>
					<span class="circle circle-middle"><i class="fab fa-facebook"></i></span>
					<span class="circle circle-last"><i class="fab fa-twitter"></i></span>
				</div>

			</div> <!-- row -->


		</div>
	</div>


	<!-- ==========================================================================================================
													  REVIEWS
		 ========================================================================================================== -->

	<div id="fh5co-reviews" class="fh5co-reviews-outer">
		<h1>What people are saying</h1>
		<small>Reviews</small>
		<div class="container fh5co-reviews-inner">
			<div class="row justify-content-center">
				<div class="col-sm-5 wow fadeIn animated" data-wow-delay="0.25s">
					<img class="float-left" src="img/quotes-1.jpg" alt="Quote 1">
					<p class="testimonial-desc">Best online library ever.</p>
					<small class="testimonial-author">John Doe</small>
					<img class="float-right" src="img/quotes-2.jpg" alt="Quote 2">
				</div>
				<div class="col-sm-5 testimonial-2 wow fadeIn animated" data-wow-delay="0.67s">
					<img class="float-left" src="img/quotes-1.jpg" alt="Quote 1">
					<p class="testimonial-desc">Inreresting content.</p>
					<small class="testimonial-author">Someone</small>
					<img class="float-right" src="img/quotes-2.jpg" alt="Quote 2">
				</div>
			</div>

		</div>
	</div>
	

	<!-- ==========================================================================================================
                                                 BOTTOM
    ========================================================================================================== -->

	<div id="fh5co-download" class="fh5co-bottom-outer">
		<div class="overlay">
			<div class="container fh5co-bottom-inner">
				<div class="row">
					<div class="col-sm-6">
						<h1>How to Use Onlib?</h1>
						<p>Simply sign up and you are set to go. that's it. as somple as that...</p>
						<!-- Buttons -->
						<form action="index.php" method="GET">
							<button class="btn btn-md download-btn-first wow fadeInLeft animated" data-wow-delay="0.85s" name="loginButton">Login</button>
							<button class="btn btn-md features-btn-first animated fadeInLeft wow" data-wow-delay="0.95s" name="signupButton">sign up</button>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- ==========================================================================================================
                                               SECTION 7 - SUB FOOTER
    ========================================================================================================== -->

	<footer class="footer-outer">
		<div class="container footer-inner">

			<div class="footer-three-grid wow fadeIn animated" data-wow-delay="0.66s">
				<div class="column-1-3">
					<h1>Onlib</h1>
				</div>
				<div class="column-2-3">
					<nav class="footer-nav">
						<ul>
							<a href="#" onclick="$('#fh5co-hero-wrapper').goTo();return false;"><li>Home</li></a>
							</ul>
					</nav>
				</div>
				<div class="column-3-3">
					<div class="social-icons-footer">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-instagram"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
					</div>
				</div>
			</div>

			<span class="border-bottom-footer"></span>

			<p class="copyright">&copy; 2019 Onlib. All rights reserved. Design by <a href="#" target="_blank">Fotie M. Constant</a>.</p>

		</div>
	</footer>




</div> <!-- main page wrapper -->
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>