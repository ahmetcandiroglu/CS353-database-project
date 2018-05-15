<?php
  require_once 'navigation_info.php';

  // Desired user could not be found, redirect home
  if(!isset($_GET['profileName'])){
    header("refresh:1; url=redirect.php");
    exit;
  }

  $profileName = $_GET['profileName'];
  $username = $_SESSION['username'];

  // Owns profile
  if($profileName == $username){
      $owns = true;
      $follows = true;
  }
  else{
      $sql = "SELECT COUNT(*) as followCount
              FROM follows
              WHERE follower = '$username' and followed = '$profileName'";
      $query = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($query);
      $follows = ($row['followCount'] > 0) ? true : false;
      $owns = false;
  }

  $sql = "SELECT user_firstName, user_lastName, user_pic, user_birthdate, user_created
          FROM user_table
          WHERE username = '$profileName'";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);

  $pname = $row['user_firstName']." ".$row['user_lastName'];
  $ppic = $row['user_pic'];
  $pbdate = date('d F', strtotime($row['user_birthdate']));
  $pjoin = date('d F  Y', strtotime($row['user_created']));

  //Get follower count
  $sql = "SELECT COUNT(*) as fcount
          FROM user_table as U, follows as F
          WHERE U.username = F.follower and F.followed = '$profileName'";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);
  $pfollowerc = $row['fcount'];

  //Get following count
  $sql = "SELECT COUNT(*) as fcount
          FROM user_table as U, follows as F
          WHERE U.username = F.followed and F.follower = '$profileName'";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);
  $pfollowingc = $row['fcount'];

  //Get 3 followers
  $sql = "SELECT U.user_pic as fpic, U.username as fname
          FROM user_table as U, follows as F
          WHERE U.username = F.follower and F.followed = '$profileName'
          LIMIT 3";
  $pfollowers = mysqli_query($db, $sql);

  //Get 3 following
  $sql = "SELECT U.user_pic as fpic, U.username as fname
          FROM user_table as U, follows as F
          WHERE U.username = F.followed and F.follower = '$profileName'
          LIMIT 3";
  $pfollowings = mysqli_query($db, $sql);

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['followed']) && !empty($_POST['followed'])) {
      $followerName = $username;
      $followedName = $profileName;
      $actionType = $_POST['followed'];

      if($actionType == "true"){
        $sql = "INSERT INTO follows (follower, followed)
                VALUES ('$followerName', '$followedName')";
        $query = mysqli_query($db, $sql);
        echo "{$followerName} followed {$followedName}";
      }
      else if($actionType == "false"){
        $sql = "DELETE FROM follows
                WHERE follower = '$followerName' and followed = '$followedName'";
        $query = mysqli_query($db, $sql);
        echo "{$followerName} unfollowed {$followedName} :(";
      }
    }
  }
?>
