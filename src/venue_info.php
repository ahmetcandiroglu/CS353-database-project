<?php
  require_once 'navigation_info.php';

  // Desired venue could not be found, redirect home
  if(!isset($_GET['venueID'])){
    header("refresh:1; url=redirect.php");
    exit;
  }

  $username = $_SESSION['username'];
  $venueID = $_GET['venueID'];
  
  //Venue info
  $sql = "SELECT venueName, venueDesc, streetNum, streetName, cityID, venuePic, venueOpenTime, venueCloseTime, venueCreated 
          FROM venue
          WHERE venueID = '$venueID'";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);
  
  $vname = $row['venueName'];
  $vdesc = $row['venueDesc'];
  $vstreet = $row['streetName']." No:".$row['streetNum'];
  $vcity = $row['cityID'];
  $vpic = $row['venuePic'];
  $vopen = $row['venueOpenTime'];
  $vclose = $row['venueCloseTime'];
  $vjoin = $row['venueCreated'];

  //Get city and county
  $sql = "SELECT CO.countryName as coName, CI.cityName as ciName 
          FROM city as CI, country as CO
          WHERE CI.cityID = '$vcity' and CI.countryID = CO.countryID";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);
  $vcity = $row['ciName'];
  $vcountry = $row['coName'];

  //Check manager status
  $sql = "SELECT COUNT(*) as isManager 
          FROM venue
          WHERE venueID = '$venueID' and managerUserName = '$username'";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);
  $isManager = ($row['isManager'] > 0) ? true : false;
  
  
  
?>