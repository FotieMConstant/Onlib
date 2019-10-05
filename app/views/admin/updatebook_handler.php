<style media="screen">
  body{
    background-color: #f2f2f2;
    font-family: sans-serif;
  }
</style>


<?php
include("../../controllers/models/config.php");




if(isset($_POST['but_submit'])){
  $maxsize = 2048242880; // 2048MB = 2GB
  //The id of the book to be updated!
  $target_id_to_update = $_POST['updateID'];


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

  
// update record
$query = "UPDATE book SET title = '".$title."', publisher = '".$publisher."', publishDate = '".$publishDate."', postDate = '".$postDate."', edition = '".$edition."', author ='".$author."', nubPages ='".$nubPages."', book ='".$book."', audioBook ='".$audioBook."', coverPic ='".$coverPic."', catId ='".$catId."', description ='".$description."', subscriptionPrice ='".$subscriptionPrice."', pyaBook ='".$pyaBook."' WHERE id ='".$target_id_to_update."'";

mysqli_query($con, $query);


echo "<center><img src='img/gifs/success.gif' width='600' height='500' alt='success'></center>";

echo '<div class="alert alert-info"><h3><center><strong>Greate!</strong> , updated successfully. </h3></center></div>';
echo "<center>You will be redirected back to the book's table</center>";

}



 ?>

 <script>
  
 setTimeout(function() {
   window.location.href = "viewbook.php";
 }, 5000);
 </script>
