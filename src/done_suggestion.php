<?php
    
    require_once 'navigation_info.php';
    $sql = "DELETE FROM suggestion WHERE suggestionID = '$_GET[sID]'";

    if(mysqli_query($db,$sql))
    {
      header("refresh:1; url=my_venues.php");
      echo"Suggestion done Successfully";
    }
    else
      echo "Not Deleted";
?>
