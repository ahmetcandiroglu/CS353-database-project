<?php
    require_once 'navigation_info.php';

    if(!isset($_GET['venueID']) || !isset($_GET['username'])){
        header("refresh:1; url=redirect.php");
        exit;
    }
    $username = $_GET['username'];
    $venueID = $_GET['venueID'];

    //Make check-in and get ID
    $sql = "INSERT INTO checkin (username, venueID)
                VALUES ('$username', $venueID)";
    $query = mysqli_query($db, $sql);
    $checkinID = mysqli_insert_id($db);

    $target_dir = "images/user/{$username}/checkin/{$checkinID}/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $files = glob($target_dir.'*');
    foreach($files as $file){
      if(is_file($file))
        unlink($file);
    }

    $extension=array("jpeg","jpg","png");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
        $file_name=$_FILES["files"]["name"][$key];
        $file_tmp=$_FILES["files"]["tmp_name"][$key];

        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        if(in_array($ext,$extension)){
            
            $target_file = $target_dir . $file_name;
            
            if (move_uploaded_file($file_tmp, $target_file)) {
                echo "The file ". $file_name . " has been uploaded.\n";
                //Insert photo to db
                $sql = "INSERT INTO photo (photoUrl)
                        VALUES ('$target_file')";
                $query = mysqli_query($db, $sql);
                $photoID = mysqli_insert_id($db);

                $sql = "INSERT INTO checkin_photo (checkinID, photoID)
                        VALUES ($checkinID, $photoID)";
                $query = mysqli_query($db, $sql);
            } 
            else {
                echo "Sorry, there was an error uploading your file.\n";
            }   
        }
    }

    header("location: venue.php?venueID={$venueID}");
?>