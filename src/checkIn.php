<?php 

	require_once 'navigation_info.php';

	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    if(isset($_POST['cid']) && !empty($_POST['cid']) 
	    	&& isset($_POST['status']) && !empty($_POST['status'])) {
	    	
	    	$cid = $_POST['cid'];
			$status = $_POST['status'];

			if($status == 'like')
	      		likeCheckIn($cid, $username, $db);
	      	else if($status == 'unlike')
	      		unlikeCheckIn($cid, $username, $db);
	    }
	}

	function printCheckIns($profileName, $db){
		$sql = "SELECT checkinID 
		      	FROM checkin
		      	WHERE username = '$profileName'";
		$query = mysqli_query($db, $sql);
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$checkinID = $row['checkinID'];
			echo getCheckInHTML($checkinID, $db);
		}
	}

	function getCheckInHTML($checkinID, $db){
		//Get check-in info
		$sql = "SELECT U.user_firstName as ufname, U.username as uname, V.venueName as vname, V.venueID as vid, C.checkin_date as cdate 
		      	FROM venue as V, checkin as C, user_table as U
		      	WHERE C.checkinID = $checkinID and C.venueID = V.venueID and C.username = U.username";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($query);
		$uname = $row['uname'];
		$ufname = $row['ufname'];
		$vname = $row['vname'];
		$vid = $row['vid'];
		$cdate = date('F d, Y', strtotime($row['cdate']));

		//Get check-in like number
		$sql = "SELECT COUNT(*) as likeCount 
		      	FROM user_like as UL
		      	WHERE UL.checkinID = $checkinID";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($query);
		$likeCount = $row['likeCount']; 

		//Get photos of check-ins
		$sql = "SELECT P.photoUrl as purl 
		      	FROM checkin_photo as CP, photo as P
		      	WHERE P.photoID = CP.photoID and CP.checkinID = $checkinID";
		$query = mysqli_query($db, $sql);
		$checkinPhotos = "";
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$purl = $row['purl'];
			$checkinPhotos = $checkinPhotos.'
				<img class="float-left" src='.$purl.' height=75>
			';
		}

		return '
			<div class="card" style="margin-top:5px;margin-bottom:5px;">
                <div class="card-body" style="margin-top:5px;margin-bottom:5px;">
                	<h6 class="text-weight-bold card-subtitle mb-2">
                     	Checked In <a href="venue.php?venueID='.$vid.'">'.$vname.'</a>
                        <i class="material-icons float-right" style="font-size:16px;" onclick="dislike(this)"
                        id="'.$checkinID.'">thumb_down</i>
                        <span class="badge badge-pill badge-light float-right">+'.$likeCount.'</span>
                        <i class="material-icons float-right" style="font-size:16px;" onclick="like(this)"
                        id="'.$checkinID.'">thumb_up</i>
                    </h6>
                    <h6 class="card-subtitle mb-2">'.$cdate.'</h6> <br>
                    '.$checkinPhotos.'
                </div>
            </div>';
	}

	function likeCheckIn($checkinID, $username, $db){
		$sql = "INSERT INTO user_like (username, checkinID)
		      	VALUES ('$username', $checkinID)";
		if(mysqli_query($db, $sql))
			echo "User liked successfully!";
		else
			echo "Error on like insertion!";
	}

	function unlikeCheckIn($checkinID, $username, $db){
		$sql = "DELETE FROM user_like 
		      	WHERE username = '$username' and checkinID = $checkinID";
		if(mysqli_query($db, $sql))
			echo "User unliked successfully!";
		else
			echo "Error on unlike!";
		
	}
?>