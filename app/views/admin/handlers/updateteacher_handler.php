<style media="screen">
  body{
    background-color: #f2f2f2;
    font-family: sans-serif;
  }
</style>


<?php
include("../../config.php");
include("../../classes/teacherclass.php");



  if(isset($_POST['but_submit'])){
     $maxsize = 2048242880; // 2048MB = 2GB
     //The id of the student to be updated!
     $target_id_to_update = $_POST['updateID'];

          $name = $_POST['name'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $phone = $_POST['phone'];
          $class = $_POST['classes'];
          $course = $_POST['course'];
          $profile_picture = $_FILES['file']['name'];
          $target_dir = "../img/dp/";
          $target_file = $target_dir . $_FILES["file"]["name"];

          // Select file type
          $pictureFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

          // Valid file extensions
          $extensions_arr = array("png","jpg","jpeg");

          // Check extension
          if( in_array($pictureFileType, $extensions_arr) ){

             // Check file size
             if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
               echo '<div class="alert alert-danger"><center><strong>File too large</strong>. File must be less than 2GB. Check video size and <a href="upload.php">try again</a></div></center>';
             }else{
               // Upload
               if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                 // update record
                 $query = "UPDATE teacher SET full_names = '".$name."', e_mail = '".$email."', password = '".$password."', phone = '".$phone."', class = '".$class."', course = '".$course."', profile_image ='".$profile_picture."', profile_image_dir ='".$target_dir."' WHERE id ='".$target_id_to_update."'";

                 mysqli_query($con, $query);


                 echo "<center><img src='../img/gifs/success.gif' width='600' height='500' alt='success'></center>";

                 echo '<div class="alert alert-info"><h3><center><strong>Greate!</strong> , updated successfully. </h3></center></div>';
                 echo "<center>You will be redirected back to the student's table</center>";
               }
             }

          }else{
            echo '<div class="alert alert-danger"><center><strong>Sorry!</strong> , could not add student. Please check file format or size and  <a href="addstudent.php">try again</a></div></center>';
          }

  }
 ?>

 <script>
 setTimeout(function() {
   window.location.href = "../viewteachers.php";
 }, 5000);
 </script>
