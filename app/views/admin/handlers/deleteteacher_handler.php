<style media="screen">
  body{
    background-color: white;
    font-family: sans-serif;
  }
</style>


<?php
include("../../config.php");
include("../../classes/studentclass.php");


  if(isset($_GET['delete_id?v'])){

    //The id of the student to be delete!
    $target_id_to_delete = $_GET['delete_id?v'];

                // Delete record!
                $delquery = "DELETE FROM teacher WHERE id ='".$target_id_to_delete."'";

                //Connection and deletion of the selected record!
                mysqli_query($con, $delquery);
                

                echo "<center><img src='../img/gifs/deleted.gif' width='600' height='500' alt='success'></center>";

                echo '<div class="alert alert-info"><h3><center><strong>Greate!</strong> , deleted successfully. </h3></center></div>';
                echo "<center>You will be redirected back to the student's table</center>";



         }else{
           echo '<div class="alert alert-danger"><center><strong>Sorry!</strong> , could not delete teacher. Please Please try again later</div></center>';
         }

 ?>

  <script>
  setTimeout(function() {
    window.location.href = "../viewteachers.php";
  }, 5000);
  </script>
