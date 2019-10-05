
<?php
require '../../controllers/models/session.php';

$sessionUserMail = $_SESSION['login_user'];

if (isset($_GET['logout'])) {
  # code...
  // remove all session variables
  session_unset();
  
  // destroy the session
  session_destroy();
}
?>


<!-- php code to fetch Book details in database -->

<?php
include('../../controllers/models/config.php');

 //php function for the time ago display
                   
 date_default_timezone_set('America/New_York');  
                    
 function facebook_time_ago($timestamp)  
 {  
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
     return "Just Now";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "one minute ago";  
     }  
     else  
           {  
       return "$minutes minutes ago";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "an hour ago";  
     }  
           else  
           {  
       return "$hours hrs ago";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "yesterday";  
     }  
           else  
           {  
       return "$days days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "a week ago";  
     }  
           else  
           {  
       return "$weeks weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "a month ago";  
     }  
           else  
           {  
       return "$months months ago";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return "one year ago";  
     }  
           else  
           {  
       return "$years years ago";  
     }  
   }  
 } 


  if (isset($_GET['view?id'])) {

    $bookID = $_GET['view?id'];
    // Fetching value in database
    $view_query = mysqli_query($con, "SELECT * FROM book WHERE id = $bookID");
    $view_value = mysqli_fetch_assoc($view_query);

   $title = $view_value['title'];
   $publisher = $view_value['publisher'];
   $publishDate = $view_value['publishDate'];
   $postDate = $view_value['postDate'];
   $edition = $view_value['edition'];
   $author = $view_value['author'];
   $nubPages = $view_value['nubPages'];
   // the book, audio and cover image  surpose to be here!
   $book = $view_value['book'];
   $audioBook = $view_value['audioBook'];
   $coverPic = $view_value['coverPic'];
   $catId = $view_value['catId'];
   $description = $view_value['description'];
   $subscriptionPrice = $view_value['subscriptionPrice'];
   $pyaBook = $view_value['pyaBook'];
   $subscriptions = $view_value['subscriptions'];

   $postDate = facebook_time_ago($postDate);



   //Category name out
   if ($catId == 1){
    $catId = "Novel";
  }elseif ($catId == 2) {
    # code...
    $catId = "Comic";
  }elseif ($catId == 3) {
    # code...
    $catId = "Education book";
  }elseif($catId == 4){
    # code...
    $catId = "Dramma";
  }elseif ($catId == 5) {
    $catId = "Science";
  }else {
    # code...
    $catId = "Uncategorized";
  }

   if($edition == 1){
    $edition = $edition."<sup>st</sup>";
    }elseif($edition == 2){
      $edition = $edition."<sup>nd</sup>";
        }elseif($edition == 3){
          $edition = $edition."<sup>rd</sup>";
            }else {
                $edition = $edition."<sup>th</sup>";
              }
    //Initially the badge is not PYA
      $edition = '<span class="aa-badge aa-sale" href="#">'.$edition.' Edition!</span>';
    
      //Changing style and properties in case the book is a PYA book
      if ($pyaBook == 0) {
      # In this case it is not a PYA book
      $pyaBook = "Not a PYA book";
      $subscriptionPrice = $subscriptionPrice."<i> FCFA.</i>";
    }else {
      # in this case it is a PYA book
      # initialize the attributes and style to that which fits a PYA book status
      $pyaBook = "All PYA books are free to read";
      $subscriptionPrice = "<i>Free!</i>";
      $edition = "PYA";
      $edition = '<span class="aa-badge aa-hot" href="#">'.$edition.' Edition!</span>';
    }

  }


 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title><?php echo $title; ?> | Onlib Library</title>
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/lite-blue-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Please wait...</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="img/flag/english.jpg" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="img/flag/french.jpg" alt="">FRENCH</a></li>
                      <li><a href="#"><img src="img/flag/english.jpg" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-fcfa"></i>FCFA
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>(+237) 62-982-4589</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="account.php"><span class="fa fa-user"></span> My Account <i style="color:blue;">(<?php echo $sessionUserMail; ?>) </i></a></li>
                  <li> <a href="../loginform.php?logout">Log out  </a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.php">
                  <span class="fa fa-book"></span>
                  <p>On<strong>lib</strong> <span>Your online library</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">Subscribed books</span>
                  <span class="aa-cart-notify">0</span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Java</a></h4>
                        <p>3000 FCFA</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img/woman-small-1.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Teach your self how to code</a></h4>
                        <p>2000 FCFA</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>                    
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        5000 FCFA
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="search.php" method="POST">
                  <input type="text" name="filename" id="" placeholder="Search here ex. 'Javascript' ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="#">Books</a></li>
              
              <li><a href="#">Categories <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">DRAMMA</a></li>
                  <li><a href="#">NOVEL</a></li>
                  <li><a href="#">COMICS</a></li>
                  <li><a href="#">Educative book</a></li>
                </ul>
              </li>

              <li><a href="contact.html">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo $title; ?></h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>         
          <li><a href="#">Book</a></li>
          <li class="active"><?php echo $title; ?></li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <?php 
                        echo '
                        <div class="simpleLens-big-image-container"><a data-lens-image="../admin/'.$coverPic.'" class="simpleLens-lens-image"><img src="../admin/'.$coverPic.'" class="simpleLens-big-image"></a></div>
                        
                      </div>
                      '; ?>
                      
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><?php echo $title; ?></h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price"><strong>Subscription Price:</strong> <?php echo $subscriptionPrice; ?></span>
                      <p class="aa-product-avilability"><strong>Publisher:</strong> <span><?php echo $publisher; ?></span></p>
                      <p class="aa-product-avilability"><strong>Publisher Date:</strong> <span><?php echo $publishDate; ?></span></p>
                      <p class="aa-product-avilability"><strong>Edition:</strong> <span><?php echo $edition; ?></span></p>
                      <p class="aa-product-avilability"><strong>Author:</strong> <span><?php echo $author; ?></span></p>
                      <p class="aa-product-avilability"><strong>Pages:</strong> <span><?php echo $nubPages; ?></span></p>
                      <p class="aa-product-avilability"><strong>PYA Book:</strong> <span><?php echo $pyaBook; ?></span></p>
                      <p class="aa-product-avilability"><strong>Subscriptions:</strong> <span><?php echo $subscriptions; ?></span></p>
                    </div>
                    
                      <p class="aa-prod-category">
                       <strong> Category:</strong> <a href="#"><?php echo $catId; ?></a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="#" data-toggle2="tooltip" data-placement="top" title="Subscribe to <?php echo $title; ?>">Subscribe</a>
                      <a class="aa-add-to-cart-btn" href="#" data-toggle2="tooltip" data-placement="top" title="Read <?php echo $title; ?>" data-toggle="modal" data-target="#quick-view-modal-readbook">Read</a>
                      <a class="aa-add-to-cart-btn" href="#" data-toggle2="tooltip" data-placement="top" title="Podcast mode" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-view"></span>Audio Book</a>                          
                      <br><br>
                      <p class="aa-product-avilability"><strong>Uploaded </strong> <i class="text-muted"><span><?php echo $postDate; ?></span></i></p>

                    </div>
                  </div>
                </div>
              </div>
            </div>


<!-- quick view modal for read book -->                  
<div class="modal fade" id="quick-view-modal-readbook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                   
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3><?php echo $title; ?></h3><br><br> 
                    <?php echo '

                    <div><div style="left: 0px; width: 100%; height: 0px; position: relative; padding-bottom: 141.4227%;"><iframe src="../admin/'.$book.'" frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" style="top: 0px; left: 0px; width: 100%; height: 100%; position: absolute;"></iframe></div></div>
                    ';
                      ?>
             <center> you are now reading the book</center>
                                   
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal --> 


            
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                  <?php  
                                        echo '
                                      <a class="simpleLens-lens-image" data-lens-image="../admin/'.$coverPic.'">
                                      ';
                                      ?>
                                      <?php  
                                        echo '<img src="../admin/'.$coverPic.'" class="simpleLens-big-image">
                                        ';
                                        ?>
                                      </a>
                                  </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3><?php echo $title; ?> ' s Podcast</h3>
                            

                            <figure id="audioplayer" itemprop="track" itemscope itemtype="http://schema.org/MusicRecording">
                              <figcaption>
                                <br><br>
                              <div id="album">Now playing...</div>
                              <div id="time">Time <span id="playbacktime">00:00</span></div>
                              </figcaption>
                              <meta itemprop="duration" content="PT2M29S">
                              <div id="fader"></div>
                              <div id="playback"></div>
                              <?php echo'
                              <audio controls src="../admin/'.$audioBook.'" id="audiotrack" preload="auto" itemprop="audio"></audio>
                              ';
                              ?>
                            </figure>



                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-play"></span>Play</a>
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-pause"></span>Pause</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal --> 

            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <div class="well">
                  <?php echo $description; ?>
                  </div>
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>Send a review for "<?php echo $title; ?>"</h4> 
                 
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="#" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <hr>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3> Related Books</h3><br>
              <ul class="aa-product-catg aa-related-item-slider">
                
<?php
 //Category name out
 if ($catId == "Novel"){
  $catId = 1;
}elseif ($catId == "Comic") {
  # code...
  $catId = 2;
}elseif ($catId == "Education book") {
  # code...
  $catId = 3;
}elseif($catId == "Dramma"){
  # code...
  $catId = 4;
}elseif ($catId == "Science") {
  # code...
  $catId = 5;
}
$query = "SELECT * FROM book WHERE catId = $catId ORDER BY id DESC";
$fetchdata = mysqli_query($con, $query);
while($row = mysqli_fetch_assoc($fetchdata)){

  $id = $row['id'];
  $catId = $row['catId'];
  $title = $row['title'];
  $publisher = $row['publisher'];
  $publishDate = $row['publishDate'];
  $postDate = $row['postDate'];
  $edition = $row['edition'];
  $author = $row['author'];
  $nubPages = $row['nubPages'];
  $book = $row['book'];
  $audioBook = $row['audioBook'];
  $coverPic = $row['coverPic'];
  $description = $row['description'];
  $subscriptionPrice = $row['subscriptionPrice'];
  $pyaBook = $row['pyaBook'];
  $subscriptions = $row['subscriptions'];

  $subscriptionPrice = $subscriptionPrice." FCFA";

  $postDate = facebook_time_ago($postDate);


  if($edition == 1){
    $edition = $edition."<sup>st</sup>";
    }elseif($edition == 2){
      $edition = $edition."<sup>nd</sup>";
        }elseif($edition == 3){
          $edition = $edition."<sup>rd</sup>";
            }else {
                $edition = $edition."<sup>th</sup>";
              }
    //Initially the badge is not PYA
      $edition = '<span class="aa-badge aa-sale" href="#">'.$edition.' Edition!</span>';
    
      //Changing style and properties in case the book is a PYA book
      if ($pyaBook == 0) {
      # In this case it is not a PYA book
      $pyaBook = "Not a PYA book";
    }else {
      # in this case it is a PYA book
      # initialize the attributes and style to that which fits a PYA book status
      $pyaBook = "All PYA books are free to read";
      $subscriptionPrice = "<i>Free!</i>";
      $edition = "PYA";
      $edition = '<span class="aa-badge aa-hot" href="#">'.$edition.' Edition!</span>';
    }
  echo '
  <!-- start single product item -->
  <li>
    <figure>
      <a class="aa-product-img" href="product-detail.php?view?id='.$id.'"><img src="../admin/'.$coverPic.'" alt="book img"></a>
      <a class="aa-add-card-btn"href="product-detail.php?view?id='.$id.'">Read</a>
        <figcaption>
        <h4 class="aa-product-title"><a href="product-detail.php?view?id='.$id.'">'.$title.'</a></h4>
        <span class="aa-product-price">'.$subscriptionPrice.'</span><br>
        <span class="text-muted"><i>'.$postDate.'</i></span>
      </figcaption>
    </figure>                        
    <div class="aa-product-hvr-content">
      <a href="#" data-toggle="tooltip" data-placement="top" title="'.$nubPages.' pages"><span class="fa fa-book"></span></a>
      <a href="#" data-toggle="tooltip" data-placement="top" title="'.$pyaBook.'"><span class="fa fa-exchange"></span></a>
    </div>
    <!-- product badge -->
    '.$edition.'
  </li>
      ';

}					  


?>
               
                                                                                         
              </ul>
              
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>get updates directly to your inbox</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> Kotto, Douala, Cameroon</p>
                      <p><span class="fa fa-phone"></span>(+237) 62-982-4589</p>
                      <p><span class="fa fa-envelope"></span>onlib@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">Fotie M. Constant</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="account.html">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

<style>
.booter {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color:  #1a1a1a;
  color: white;
  text-align: center;
  padding: .5%;
  transition: .5s;
}
.booter:hover{
  opacity: 0;
  transition: .5s;
  cursor: not-allowed;
}
audio{
  width: 100%;
  color: black;
}
.audio:hover{
  opacity: 0;
  transition: .5s;
  cursor: not-allowed;
}

</style>

  <div class="booter">
  <p>Now Playing... "<?php echo $title; ?>" </p>
  
  <figure id="audioplayer" itemprop="track" itemscope itemtype="http://schema.org/MusicRecording">
                              
                              <meta itemprop="duration" content="PT2M29S">
                              <div id="fader"></div>
                              <div id="playback"></div>
                              <?php echo'
                              <audio controls src="../admin/'.$audioBook.'" id="audiotrack" preload="auto" itemprop="audio"></audio>
                              ';
                              ?>
                            </figure>


 
  
</div>
    
  <!-- jQuery library -->
  <script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 

  
  </body>
</html>