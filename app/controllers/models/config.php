<?php


$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password_r = ""; /* Password */
$dbname = "onlib"; /* Database name */

$con = mysqli_connect($host, $user, $password_r, $dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
