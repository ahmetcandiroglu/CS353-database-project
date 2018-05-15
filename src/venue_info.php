<?php
  require_once 'navigation_info.php';

  // Desired venue could not be found, redirect home
  if(!isset($_GET['venueID'])){
    header("refresh:1; url=redirect.php");
    exit;
  }

  $username = $_SESSION['username'];
  $venueID = $_GET['venueID'];
  $_SESSION['manageVenueID'] = $venueID;
  $nophotoVenue = "images/common/no photo venue.png";


  $showAlert = 1;
  $alertFor = "None";
  if(isset($_SESSION['checkin']) && !empty($_SESSION['checkin'])){
    $showAlert = $_SESSION['checkin'];
    unset($_SESSION['checkin']);
    $alertFor = 'Check-In';
  }
  if(isset($_SESSION['review']) && !empty($_SESSION['review'])){
    $showAlert = $_SESSION['review'];
    unset($_SESSION['review']);
    $alertFor = 'Review';
  }
  if(isset($_SESSION['suggestion']) && !empty($_SESSION['suggestion'])){
    $showAlert = $_SESSION['suggestion'];
    unset($_SESSION['suggestion']);
    $alertFor = 'Suggestion';
  }
  
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
  $vopen = date('H:i', strtotime($row['venueOpenTime']));
  $vclose = date('H:i', strtotime($row['venueCloseTime']));
  $vjoin = date('d F Y', strtotime($row['venueCreated']));
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
  $sql = "SELECT COUNT(*) as ownsVenue 
          FROM venue
          WHERE venueID = '$venueID' and managerName = '$username'";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);
  $ownsVenue = ($row['ownsVenue'] > 0) ? true : false;
  
  //Planned visit
  $sql = "SELECT COUNT(*) as plannedVisit 
          FROM plan_to_visit
          WHERE username = '$username' and venueID = '$venueID'";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);
  $plannedVisit = ($row['plannedVisit'] > 0) ? true : false;
  
  //Favorite
  $sql = "SELECT COUNT(*) as isFavorite 
          FROM has_favorite
          WHERE username = '$username' and venueID = '$venueID'";
  $query = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($query);
  $isFavorite = ($row['isFavorite'] > 0) ? true : false;


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

    if(isset($_POST['favorite']) && !empty($_POST['favorite'])) {
      $actionType = $_POST['favorite'];

      if($actionType == "true"){
        $sql = "INSERT INTO has_favorite (username, venueID)
                VALUES ('$username', '$venueID')";
        $query = mysqli_query($db, $sql);
        echo "{$username} added {$venueID} to his/her favorites";
      }
      else if($actionType == "false"){
        $sql = "DELETE FROM has_favorite
                WHERE username = '$username' and venueID = '$venueID'";
        $query = mysqli_query($db, $sql);
        echo "{$username} removed {$venueID} from favorites :(";
      }
    }


  }

?>