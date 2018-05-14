<?php

    require_once 'navigation_info.php';
    $sql = "DELETE FROM venue WHERE venueID = '$_GET[venueID]'";

    if(mysqli_query($db,$sql))
    {
      header("refresh:1; url=my_venues.php");
      echo"Venue Closed Successfully";
    }
    else
      echo "Not Deleted";
?>
