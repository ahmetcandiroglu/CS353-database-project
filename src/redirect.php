<?php
    session_start();
    require_once 'config.php';
    $username = $_SESSION['username'];

    $sql = "SELECT user_profileType FROM user_table WHERE username = '$username'";
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($query);
    echo "Redirecting to Homepage!";
    $accountType = $row['user_profileType'];
    if($accountType == 1)
    {
      header("refresh:1; url=homepage_manager.php");
    }
    else if($accountType == 2)
    {
      header("refresh:1; url=homepage_user.php");
    }
    else
      echo "Problem with redirection!";
?>
