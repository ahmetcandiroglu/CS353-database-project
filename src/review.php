<?php 

	require_once 'navigation_info.php';

	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    if(isset($_POST['rid']) && !empty($_POST['rid']) 
	    	&& isset($_POST['status']) && !empty($_POST['status'])) {
	    	
	    	$rid = $_POST['rid'];
			$status = $_POST['status'];

			if($status == 'like')
	      		likeReview($rid, $username, $db);
	      	else if($status == 'unlike')
	      		unlikeReview($rid, $username, $db);
	    }
	}

	function printReviews($profileName, $db){
		$sql = "SELECT R.reviewID as rid 
		      	FROM checkin as C, review as R
		      	WHERE C.username = '$profileName' and C.checkinID = R.checkinID";
		$query = mysqli_query($db, $sql);
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$rid = $row['rid'];
			echo getReviewHTML($rid, $db);
		}
	}

	function printReviewsVenue($venueID, $db){
		$sql = "SELECT R.reviewID as rid 
		      	FROM checkin as C, review as R
		      	WHERE C.venueID = $venueID and C.checkinID = R.checkinID";
		$query = mysqli_query($db, $sql);
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$rid = $row['rid'];
			echo getReviewHTML($rid, $db);
		}
	}

	function getReviewHTML($rid, $db){
		//Get review info
		$sql = "SELECT U.user_firstName as ufname, U.username as uname, V.venueName as vname, V.venueID as vid, C.checkin_date as cdate, R.review_rating as rrate, R.review_desc as rdesc 
		      	FROM venue as V, checkin as C, user_table as U, review as R
		      	WHERE R.reviewID = $rid and C.checkinID = R.checkinID and C.venueID = V.venueID and C.username = U.username";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($query);
		$uname = $row['uname'];
		$ufname = $row['ufname'];
		$vname = $row['vname'];
		$vid = $row['vid'];
		$cdate = date('F d, Y', strtotime($row['cdate']));
		$rdesc = $row['rdesc'];
		$rrate = $row['rrate'];

		//Get check-in like number
		$sql = "SELECT COUNT(*) as likeCount 
		      	FROM user_like as UL, checkin as C, review as R
		      	WHERE UL.checkinID = C.checkinID and C.checkinID = R.checkinID and R.reviewID = $rid";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($query);
		$likeCount = $row['likeCount']; 

		//Get photos of check-ins
		$sql = "SELECT P.photoUrl as purl 
		      	FROM checkin_photo as CP, photo as P, review R
		      	WHERE P.photoID = CP.photoID and CP.checkinID = R.checkinID and R.reviewID = $rid";
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
                <div class="card-body" style="margin-top:0px;margin-bottom:0px;">
                    <h6 class="card-subtitle mb-2">
                    	'.$ufname.' reviewed, <a href="venue.php?venueID='.$vid.'">'.$vname.'</a>
                    	<br> '.$cdate.' / Rating: <b>'.$rrate.'</b>
                    	<i class="material-icons float-right" style="font-size:16px;" onclick="dislikeReview(this)"
                        id="'.$rid.'">thumb_down</i>
                    	<span class="badge badge-pill badge-light float-right">+'.$likeCount.'</span>
                    	<i class="material-icons float-right" style="font-size:16px;" onclick="likeReview(this)"
                        id="'.$rid.'">thumb_up</i>
                    </h6>
                    <p class="text-left card-text" style="font-size:14px;">'.$rdesc.'<br></p>
                    '.$checkinPhotos.'
                </div>
            </div>';
			
	}

	function likeReview($rid, $username, $db){
		$sql = "SELECT C.checkinID as cid
				FROM checkin as C, review as R 
				WHERE C.checkinID = R.checkinID and R.reviewID = $rid";
		$query = mysqli_query($db, $sql);
		$row =  mysqli_fetch_array($query);
		$checkinID = $row['cid'];

		$sql = "INSERT INTO user_like (username, checkinID)
		      	VALUES ('$username', $checkinID)";
		if(mysqli_query($db, $sql))
			echo "User liked successfully!";
		else
			echo "Error on like insertion!";
	}

	function unlikeReview($rid, $username, $db){
		$sql = "SELECT C.checkinID as cid
				FROM checkin as C, review as R 
				WHERE C.checkinID = R.checkinID and R.reviewID = $rid";
		$query = mysqli_query($db, $sql);
		$row =  mysqli_fetch_array($query);
		$checkinID = $row['cid'];

		$sql = "DELETE FROM user_like 
		      	WHERE username = '$username' and checkinID = $checkinID";
		if(mysqli_query($db, $sql))
			echo "User unliked successfully!";
		else
			echo "Error on unlike!";
		
	}
?>