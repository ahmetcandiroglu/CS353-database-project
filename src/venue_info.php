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
  $sql = "SELECT venueName, venueDesc, venueTel, street_number, street_name, cityID, venuePic, venueOpenTime, venueCloseTime, venueCreated 
          FROM venue
          WHERE venueID = '$venueID'";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);
  
  $vname = $row['venueName'];
  $vdesc = $row['venueDesc'];
  $vstreet = $row['street_name']." No:".$row['street_number'];
  $vcity = $row['cityID'];
  $vpic = $row['venuePic'];
  $vopen = $row['venueOpenTime'];
  $vclose = $row['venueCloseTime'];
  $vjoin = $row['venueCreated'];
  $vtel = $row['venueTel'];

  //Get city and county
  $sql = "SELECT CO.countryName as coName, CI.cityName as ciName 
          FROM city as CI, country as CO
          WHERE CI.cityID = '$vcity' and CI.countryID = CO.countryID";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);
  $vcity = $row['ciName'];
  $vcountry = $row['coName'];

  //Get features
  $sql = "SELECT F.featureName, F.featureDesc 
          FROM feature as F
          WHERE F.venueID = '$venueID'";
  $vfeatures = mysqli_query($db, $sql);
  

  //Check manager status
  $sql = "SELECT COUNT(*) as isManager 
          FROM venue
          WHERE venueID = '$venueID' and managerName = '$username'";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);
  $isManager = ($row['isManager'] > 0) ? true : false;
  
  //Planned visit
  $sql = "SELECT COUNT(*) as plannedVisit 
          FROM plan_to_visit
          WHERE username = '$username' and venueID = '$venueID'";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);
  $plannedVisit = ($row['plannedVisit'] > 0) ? true : false;
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['visited']) && !empty($_POST['visited'])) {
      $actionType = $_POST['visited'];

      if($actionType == "true"){
        $sql = "INSERT INTO plan_to_visit (username, venueID)
                VALUES ('$username', '$venueID')";
        $query = mysqli_query($db, $sql);
        echo "{$username} will visit {$venueID}";
      }
      else if($actionType == "false"){
        $sql = "DELETE FROM plan_to_visit
                WHERE username = '$username' and venueID = '$venueID'";
        $query = mysqli_query($db, $sql);
        echo "{$username} won't visit {$venueID} :(";
      }
    }
  }

?>