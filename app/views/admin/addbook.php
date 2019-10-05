<?php
require '../../controllers/addbookController.php';
require '../../controllers/categoryController.php';

$addbookController = new addbookController();



if(isset($_POST['but_submit'])){
	$maxsize = 2048242880; // 2048MB = 2GB

$title = $_POST['title'];
$publisher = $_POST['publisher'];
$publishDate = $_POST['publishDate'];
$postDate = date("Y-m-d h:i:sa");
$edition = $_POST['edition'];
$author = $_POST['author'];
$nubPages = $_POST['nubPages'];
// the book, audio and cover image  surpose to be here!
$catId = $_POST['category'];
$description = $_POST['description'];
$subscriptionPrice = $_POST['subscriptionPrice'];
$pyaBook = 0;

//getting the paths and names of the various files


//The Cover picture of the book
$target_book_dir = "assets/pdf_book/";
$book = $target_book_dir . $_FILES['book']["name"];
// Select file type
$bookFileType = strtolower(pathinfo($book,PATHINFO_EXTENSION));

// Valid file extensions
$book_extensions_arr = array("pdf","PDF");


  // Check extension
  if( in_array($bookFileType, $book_extensions_arr) ){

    // Check file size
    if(($_FILES['book']['size'] >= $maxsize) || ($_FILES["book"]["size"] == 0)) {
      echo 'File must be less than 2GB. Check video size';
    }else{
      // Upload
      if(move_uploaded_file($_FILES['book']['tmp_name'],$book)){
      // Insert record
      
      }
    }
}




//The audioBook
$target_audio_dir = "assets/audio_books/";
$audioBook = $target_audio_dir . $_FILES['audioBook']["name"];
 // Select file type
 $AudioFileType = strtolower(pathinfo($audioBook,PATHINFO_EXTENSION));

  // Valid file extensions
  $audio_extensions_arr = array("mp3","MP3");

  // Check extension
  if( in_array($AudioFileType, $audio_extensions_arr) ){

// Check file size
if(($_FILES['audioBook']['size'] >= $maxsize) || ($_FILES["audioBook"]["size"] == 0)) {
  echo 'File must be less than 2GB. Check video size';
}else{
  // Upload
  if(move_uploaded_file($_FILES['audioBook']['tmp_name'],$audioBook)){
  // Insert record
 
    }
  }
}




//The Cover picture of the book
$target_img_dir = "assets/cover_img/";
$coverPic = $target_img_dir . $_FILES['coverPic']["name"];
// Select file type
$imgFileType = strtolower(pathinfo($coverPic,PATHINFO_EXTENSION));

// Valid file extensions
$coverPic_extensions_arr = array("jpg","png","JPEG");


  // Check extension
  if( in_array($imgFileType, $coverPic_extensions_arr) ){

    // Check file size
    if(($_FILES['coverPic']['size'] >= $maxsize) || ($_FILES["coverPic"]["size"] == 0)) {
      echo 'File must be less than 2GB. Check video size';
    }else{
      // Upload
      if(move_uploaded_file($_FILES['coverPic']['tmp_name'],$coverPic)){
      // Insert record
      
      }
    }
}

  
   $addbookController->publish($title, $publisher,  $publishDate, $postDate, $edition, $author, $nubPages, $book, $audioBook, $coverPic, $catId, $description, $subscriptionPrice, $pyaBook);


}


?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add New Textbook</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">Onlib Admin Panel</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pages
      </div>
 <!-- Nav Item - Pages Collapse Menu -->
 <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>Textbook</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Operations:</h6>
            <a class="collapse-item" href="addbook.php">Register new Textbook</a>
            <a class="collapse-item" href="viewbook.php">View all Textbooks (670)</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Teacher Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Operations:</h6>
            <a class="collapse-item" href="addteacher.php">Register new user</a>
            <a class="collapse-item" href="viewteachers.php">View all users(35)</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>More</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Operations:</h6>
            <a class="collapse-item" href="login.html">Attendance</a>
            <a class="collapse-item" href="classes.php">Classes (50)</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"></span>
              </a>
              

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"></span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="img/dp/avatar.png" title="Logged in as Admin">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add a Textbook</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->


            <!-- Script for profile image preview -->
            <script>
                 function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#blah')
                                    .attr('src', e.target.result);
                            };

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    
                 function readIMGURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#blah_img')
                                    .attr('src', e.target.result);
                            };

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                  
                    function readbookURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#blah_book')
                                    .attr('src', e.target.result);
                            };

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
            
              
            </script>
      
            <style>
            img{
                margin-top: 7px;
                max-width: 280px;
                border: 4px 5px 19px solid black;
                border-radius: 5px;
            }

            </style>

            <!-- Add book -->
            <form method="POST" action="addbook.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Title: <i data-tooltip="Book's name goes here"><strong>?</strong></i></label>
                    <input type="text" name="title" id="name" class="form-control" placeholder="Enter books's title">
                </div>
                <div class="form-group">
                    <label for="matricule">Publisher: <i data-tooltip="The Publisher of the book is as well important"><strong>?</strong></i></label>
                    <input type="text" name="publisher" id="matricule" class="form-control" placeholder="Enter Publisher">
                </div>
                
                <div class="form-group">
                Publish date:
                    <label for="dob"></label>
                    <input type="date" name="publishDate" id="article-ckeditor" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="edition">Edition: <i data-tooltip="Textbook's edition"><strong>?</strong></i></label>
                    <input type="number" name="edition" id="edition" class="form-control" placeholder="Enter edition" required>
                </div>
                <div class="form-group">
                    <label for="author">Author: <i data-tooltip="Textbook's author, the writer of the book"><strong>?</strong></i></label>
                    <input type="text" name="author" id="author" class="form-control" placeholder="Enter Author" required>
                </div>
                <div class="form-group">
                    <label for="nubp">Number of pages: <i data-tooltip="How many pages does the book have?"><strong>?</strong></i></label>
                    <input type="number" name="nubPages" id="nubp" class="form-control" placeholder="Enter number of pages" required>
                </div>

                <div class="form-group">
                    <label for="book">Upload book: <i data-tooltip="Pick the book and upload, note that this book most be in pdf format"><strong>?</strong></i></label>
                    <input type="file" name="book" onchange="readbookURL(this);" id="book" class="form-control" required>
                    <br/>
                    <span><strong>Preview: </strong></span>
                    <img id="blah_book" src="img/dp/avatar.png" alt="Upload a book to preview here" title="Your image preview" />
                </div>

                <div class="form-group">
                    <label for="audio">Audio Book: <i data-tooltip="Pick an audio book for this book if any!"><strong>?</strong></i></label>
                    <input type="file" value="No audio Book" name="audioBook" onchange="readURL(this);" id="audio" class="form-control" required>
                    <br/>

                    <span><strong>Audio Preview: </strong></span> <br>
                    <audio id="blah" controls preload="none">
                      <source src="horse.ogg" type="audio/ogg">
                      <source src="horse.mp3" type="audio/mpeg">
                      Your browser does not support the audio element.
                    </audio>
                </div>
                
                <div class="form-group">
                    <label for="cover_image">Cover Image: <i data-tooltip="Pick a display image for this book"><strong>?</strong></i></label>
                    <input type="file" name="coverPic" onchange="readIMGURL(this);" id="cover_image" class="form-control" required>
                    <br/>
                    <span><strong>Preview: </strong></span>
                    <img id="blah_img" src="img/dp/avatar.png" alt="Upload a photo to preview here" title="Your image preview" />
                </div>
                <div class="form-group">
                  <label for="class">Book Category: </label>
                  <select class="form-control"  name="category">
                      <?php 
                      $categoryController = new categoryController(); 
                      $categoryController->fetchCategory();
                       
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="desc">Description: <i data-tooltip="A description of the book is, Leave empty if you don't have any description"><strong>?</strong></i></label>
                    <textarea name="description" value="Do description provided" id="desc" class="form-control" placeholder="Description goes here..." cols="30" rows="10"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="sub_p">Subscription price: <i data-tooltip="Prices are in FCFA"><strong>?</strong></i></label>
                    <input type="number" name="subscriptionPrice" id="sub_p" class="form-control" placeholder="E.g 3,500 FCFA" required>
                </div>
                <div class="form-group">
                    <label for="pya">PYA: <i data-tooltip="PYA user to promot yong editor, an admin cannot modify. by default it is set to NO"><strong>?</strong></i></label>
                    <input type="number" name="pya" id="pya" class="form-control" placeholder="NO" value="NO" disabled>
                </div>
                
                <hr/>
                    <input type="submit" value="Publish" name="but_submit" class="btn btn-primary">
                <br/><br/>
            </form>


          <!-- /.Content Row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <span>Copyright &copy; Onlib 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
