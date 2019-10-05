
<?php
include('config.php');

session_start();// Starting Session

// Storing Session
$user_check = $_SESSION['login_user'];


// SQL Query To Fetch Complete Information Of User
$ses_sql = "SELECT * FROM normaluser WHERE fname='$user_check'";
$ses_result = mysqli_query($con, $ses_sql);

$row = mysqli_fetch_assoc($ses_result);
$login_session = $row['fname'];

if(!isset($login_session)){
mysqli_close($con); // Closing Connection
}
?>