<?php
    require_once 'navigation_info.php';

    if(!isset($_GET['venueID']) || !isset($_GET['username'])){
        header("refresh:1; url=redirect.php");
        exit;
    }
    $username = $_GET['username'];
    $venueID = $_GET['venueID'];
    $stext = mysql_real_escape_string($_POST['suggestionText']);

    //Insert check-in and get ID
    $sql = "INSERT INTO suggestion (suggestion_text, venueID, username)
            VALUES ('$stext', $venueID, '$username')";
    if(mysqli_query($db, $sql)){
        $_SESSION['suggestion'] = 2; 
        header("location: venue.php?venueID={$venueID}");
    }
    else{   
        $_SESSION['suggestion'] = 3;
        header("location: venue.php?venueID={$venueID}");
    }

?>