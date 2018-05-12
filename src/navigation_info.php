<?php
// Include config file
require_once 'config.php';
session_start();
$username = $_SESSION['username'];
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

$sql = "SELECT user_profileType, user_firstName, user_lastName, username,user_email, city, user_pic FROM user_table WHERE username = '$username'";
$query = mysqli_query($db, $sql);
$row = mysqli_fetch_array($query);

$accountType = $row['user_profileType'];
$userFirstName = $row['user_firstName'];
$userLastName = $row['user_lastName'];
$userFullName = $userFirstName." ".$userLastName;
$usernameOfUser = $row['username'];
$userEmail = $row['user_email'];
$userCity = $row['city'];
$userPic = $row['user_pic'];
?>
