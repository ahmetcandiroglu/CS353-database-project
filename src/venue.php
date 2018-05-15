<?php
    require_once 'venue_info.php';
    require_once 'checkIn.php';
  	require_once 'review.php';
?>

<html>
<head>
	<title>Venue | CheckMe</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Import Bootstrap 4-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<!-- Import fonts-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Import MaterialUI Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">

 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

	<!-- Header -->
	<?php 
        include_once "navigation.php";
    ?>
    <br>
	<!-- Core -->
	<div class="container">
		
		<div class="row">
			
			<!-- Left -->
			<div class="col-md-4">
				<!-- Name -->
                <h2 class="text-center" style="font-size:32px;margin:9px;">
                	<?php echo htmlspecialchars($vname); ?>
                </h2>
                
				<!-- Profile Picture -->
                <?php
		            $images = glob("$vpic");

		            // Image selection and display:
		            // Display first image
		            if (!empty($vpic) && count($images) > 0) { // make sure at least one image exists
		              $img = $images[0]; // first image
		              echo '<img class="img-fluid" src="'.$img.'">';
		            }
		            else{
		            	$img = glob("$nophotoVenue")[0]; // first image
		            	echo '<img class="img-fluid" src="'.$img.'">';
	          		}
	          	?>
                
				
            	<!-- Featuring -->
            	<?php
            		echo '<br><br><div><strong style="font-size:14px;margin-right:3px;">Featuring</strong>';
            		
            		while($row = mysqli_fetch_array($vfeatures, MYSQLI_ASSOC)){
		              $featureName = $row['featureName'];
		              $featureDesc = $row['featureDesc'];
		              echo '<span class="badge badge-info" tabindex="0" data-toggle="tooltip" title="'.$featureDesc.'" style="margin-left:3px;">'.$featureName.'</span>';
		              
		            }
		            echo '</div><br>';

            	?>

				<!-- Plan to visit -->
                <div style="margin-top:4px;margin-bottom:4px;">
                	<?php
                		if($ownsVenue){
                			echo '
                			<a href="view_suggestion.php"
                			<button class="btn btn-success" type="button" style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;font-size:16px;" onclick="viewSuggestions()">
                				<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">feedback</i>
                				&nbsp; View suggestions<br>
                			</button>
                			</a>

                			<a href="edit_venue.php"
                			<button class="btn btn-success" type="button" style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;font-size:16px;" onclick="editVenue()">
                				<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">edit</i>
                				&nbsp; Edit venue<br>
                			</button>
                			</a>
                			';
                		}
                		else{
	                		if($plannedVisit){
	                			echo '
	                			<button class="btn btn-danger" type="button" style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;font-size:16px;" onclick="cancelVisit()">
	                				<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">bookmark</i>
	                				&nbsp; Cancel planned visit<br>
	                			</button>
	                			<br>
	                			<button class="btn btn-success" type="button" style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;font-size:16px;" onclick="showArea()">
	                				Have you visit '.$vname.'? Check-In!<br>
	                			</button>
	                			';
	                		}
	                		else{
	                			echo '
	                			<button class="btn btn-success" type="button" style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;font-size:16px;" onclick="planVisit()">
	                				<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">bookmark</i>
	                				&nbsp; Plan a visit<br>
	                			</button>
	                			';
	                		}

	                		if($isFavorite){
	                			echo '
	                			<button class="btn btn-danger" type="button" style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;font-size:16px;" onclick="removeFavorite()">
	                				<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">favorite</i>
	                				&nbsp; Remove from favorites<br>
	                			</button>
	                			';
	                		}
	                		else{
	                			echo '
	                			<button class="btn btn-success" type="button" style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;font-size:16px;" onclick="addFavorite()">
	                				<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">favorite_border</i>
	                				&nbsp; Add your favourites<br>
	                			</button>
	                			';
	                		}
                		}
                	?>

                </div>
            </div>

            <!-- Middle -->
            <div class="col-md-4"> 
            	<?php
            		if($showAlert == 2){
            			echo '
            				<div class="alert alert-success" role="alert">
  								'.$alertFor.' is succesful!
							</div>
            			';
            		}
            		else if($showAlert == 3){
            			echo '<div class="alert alert-danger" role="alert">
						  Something went wrong, '.$alertFor.' is not done :(
						</div>';
            		}
            	?>

				<!-- Buttons -->
	            <div style="margin-top:4px;margin-bottom:4px;padding-top:4px;padding-bottom:4px;
	            	<?php 
						if($ownsVenue){
							echo 'display:none;';
						}
					?>
	            ">
	            	<button class="btn btn-success" type="button" style="margin-left:1px;font-size:16px;" 
	            	onclick="showArea('checkInBox')" id="checkinBtn">
	            		<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">check_circle</i>&nbsp; Check In
	            	</button>
                    <button class="btn btn-success" type="button" style="margin-left:1px;font-size:16px;" 
                    onclick="showArea('reviewBox')" id="reviewBtn">
                    	<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">rate_review</i>&nbsp; Review
                    </button>
                    <button class="btn btn-success" type="button" style="margin-left:1px;font-size:16px;" 
                    onclick="showArea('suggestionBox')" id="suggestionBtn">
                    	<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">feedback</i>&nbsp;Suggestion
                    </button>
                </div>
	            
	            <!-- Check-In, Review and Suggestion forms -->
	            <div>
	            	<div class="card" id="checkInBox" style="display:none">
						<h5 class="card-header"><?php echo "Check In to $vname"; ?>
					  		<button type="button" class="close" aria-label="Close" onclick="hideArea('checkInBox')">
						  	<span aria-hidden="true">&times;</span>
							</button>
					  	</h5>
					  
					  	<div class="card-body">
					    	<form action="<?php echo "add_checkin.php?venueID=$venueID&username=$username";?>" method="post" enctype="multipart/form-data">    
						    	<p>Add photos!</p>
						    	<input type="file" name="files[]" multiple/>
						    	<br> <br>
						    	<input type="submit" value="Check-In!" id="selectedButton" class="btn btn-success"/>
							</form>
					    
					    	<hr>
					    	<p class="font-italic">Tip: You can always make a review of a check-in!</p>
					  	</div>
					</div>

					<div class="card" id="reviewBox" style="display:none">
						<h5 class="card-header"><?php echo "Review $vname"; ?>
					  		<button type="button" class="close" aria-label="Close" onclick="hideArea('reviewBox')">
						  	<span aria-hidden="true">&times;</span>
							</button>
					  	</h5>
					  
					  	<div class="card-body">
					    	<form action="<?php echo "add_review.php?venueID=$venueID&username=$username";?>" method="post" enctype="multipart/form-data">
					    		<p1>Rate&nbsp;</p1>
					    		<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="rating" id="rating1" value="1">
								  <label class="form-check-label" for="rating1">1</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="rating" id="rating2" value="2">
								  <label class="form-check-label" for="rating2">2</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="rating" id="rating3" value="3">
								  <label class="form-check-label" for="rating3">3</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="rating" id="rating4" value="4">
								  <label class="form-check-label" for="rating4">4</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="rating" id="rating5" value="5">
								  <label class="form-check-label" for="rating5">5</label>
								</div>
								<hr>
					    		<div class="form-group">
									<label for="reviewText">Write a review...</label>
								    <textarea class="form-control" id="reviewText" name="reviewText" rows="3"></textarea>
								</div>
								<hr>
						    	<p>Add photos!</p>
						    	<input type="file" name="files[]" multiple/>
						    	<br> <br>
						    	<input type="submit" value="Review!" id="selectedButton" class="btn btn-success"/>
							</form>
					  	</div>
					</div>

					<div class="card" id="suggestionBox" style="display:none">
						<h5 class="card-header"><?php echo "Give Suggestion to $vname"; ?>
					  		<button type="button" class="close" aria-label="Close" onclick="hideArea('suggestionBox')">
						  	<span aria-hidden="true">&times;</span>
							</button>
					  	</h5>
					  
					  	<div class="card-body">
					    	<form action="<?php echo "add_suggestion.php?venueID=$venueID&username=$username";?>" method="post" enctype="multipart/form-data">    
						    	<div class="form-group">
									<label for="suggestionText">Write your suggestion...</label>
								    <textarea class="form-control" id="suggestionText" name="suggestionText" rows="3"></textarea>
								</div>
								<input type="submit" value="Suggest!" id="selectedButton" class="btn btn-success"/>
							</form>
					  	</div>
					</div>

				</div>

				<!-- Check-In -->
		        <?php
	                printReviewsVenue($venueID, $db);
	                printCheckInsVenue($venueID, $db);
                ?>

	        </div>
						
	        <!-- Right -->
	        <div class="col-md-3">
				<!-- Info -->	
	            <ul class="list-group">
	                <li class="list-group-item" style="padding:10px;padding-right:5px;padding-top:0px;padding-bottom:0px;padding-left:5px;">
	                    <p class="text-center" style="padding-bottom:2px;padding-left:2px;padding-right:2px;padding-top:2px;margin:3px;">
	                    	<?php
	                    		echo "<strong>{$vname}</strong><br>
	                    		{$vstreet} {$vcity} <br>{$vcountry}";
	                    	?>
	                    </p>
	                </li>
	                <li class="list-group-item" style="padding:10px;padding-right:5px;padding-top:0px;padding-bottom:0px;padding-left:5px;">
	                    <p class="text-center" style="padding-bottom:2px;padding-left:2px;padding-right:2px;padding-top:2px;margin:3px;">
	                    	<?php
	                    		echo "Open: {$vopen}-{$vclose}";
	                    	?>
	                	</p>
	                </li>
	                <li class="list-group-item" style="padding-top:2px;padding-right:2px;padding-bottom:2px;padding-left:2px;">
	                    <p class="text-center" style="padding-bottom:0px;padding-left:2px;padding-right:2px;padding-top:2px;margin:3px;">
	                    	<?php
	                    		if( preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $vtel,  $matches ) ){
    								$result = $matches[1] . ' ' .$matches[2] . ' ' . $matches[3];
	                    			echo "Tel: {$result}<br>";
								}
	                    	?>
	                    </p>
	                </li>
	                <li class="list-group-item" style="padding-top:2px;padding-right:2px;padding-bottom:2px;padding-left:2px;">
	                    <p class="text-center" style="padding-bottom:0px;padding-left:2px;padding-right:2px;padding-top:0px;margin:3px;">
	                    	<?php
	                    		echo "Joined in {$vjoin} <br>";
	                    	?>
	                    </p>
	                </li>
	            </ul>

				<!-- Photos -->
	            <div class="carousel slide" data-ride="carousel" id="carousel-1">
	                <div class="carousel-inner" role="listbox">
	                    <div class="carousel-item active">
	                    	<img class="img-fluid w-100 d-block" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkmltAGwEybf24Y5Fxs_c2F5UxA9SVQtYxZbURhXV4xxV6izUocQ" alt="Slide Image" style="margin-top:10px;">
	                    </div>
	                </div>
	                <div>
	                	<a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
	                		<span class="carousel-control-prev-icon"></span>
	                		<span class="sr-only">Previous</span>
	                	</a>
	                	<a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
	                		<span class="carousel-control-next-icon"></span>
	                		<span class="sr-only">Next</span>
	                	</a>
	                </div>
	                <ol class="carousel-indicators">
	                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
	                    <li data-target="#carousel-1" data-slide-to="1"></li>
	                    <li data-target="#carousel-1" data-slide-to="2"></li>
	                </ol>
	            </div>
	        </div>		

		</div>
	</div>

	<script type="text/javascript">
	    function planVisit() {      
	      visit(true);
	    }

	    function cancelVisit() {
	      visit(false);
	    }

	    function visit(status) {
	      var venueID = <?php echo json_encode($venueID, JSON_HEX_TAG); ?>;
	      $.ajax({
	        type: "POST",
	        url: "venue_info.php?venueID=" + venueID,
	        data: { visited: status },
	        success: function (data){
	          console.log(data);
	          window.location.reload();
	        },
	        error: function (){
	          console.log("Something went wrong!");
	        }
	      });
	    }

	    function addFavorite() {      
	      favorite(true);
	    }

	    function removeFavorite() {
	      favorite(false);
	    }

	    function favorite(status) {
	      var venueID = <?php echo json_encode($venueID, JSON_HEX_TAG); ?>;
	      $.ajax({
	        type: "POST",
	        url: "venue_info.php?venueID=" + venueID,
	        data: { favorite: status },
	        success: function (data){
	          console.log(data);
	          window.location.reload();
	        },
	        error: function (){
	          console.log("Something went wrong!");
	        }
	      });
	    }

	    function showArea(id) {
	    	if(!id)
	    		id = "checkInBox";

	    	document.getElementById(id).style.display = "block";
	    	document.getElementById('checkinBtn').disabled = true;
	    	document.getElementById('reviewBtn').disabled = true;
	    	document.getElementById('suggestionBtn').disabled = true;
	    	if(id === 'checkInBox'){
	    		document.getElementById('checkinBtn').disabled = false;
	    	}
	    	else if(id === 'reviewBox'){
				document.getElementById('reviewBtn').disabled = false;
	    	}
	    	else if(id === 'suggestionBox'){
	    		document.getElementById('suggestionBtn').disabled = false;
	    	}
	    }

	    function hideArea(id) {
	    	document.getElementById(id).style.display = "none";
	    	document.getElementById('checkinBtn').disabled = false;
	    	document.getElementById('reviewBtn').disabled = false;
	    	document.getElementById('suggestionBtn').disabled = false;
	    }

	    function like(self) {
      		likeRequest(self.id, 'like');
	    }

	    function dislike(self) {
	      likeRequest(self.id, 'unlike');
	    }

	    function likeRequest(checkinID, status) {
	      $.ajax({
	        type: "POST",
	        url: "checkIn.php",
	        data: { cid: checkinID, status: status},
	        success: function (data){
	          console.log(data);
	          window.location.reload();
	        },
	        error: function (){
	          console.log("Something went wrong!");
	        }
	      });
	    }

	    function likeReview(self) {
	      likeRequestReview(self.id, 'like');
	    }

	    function dislikeReview(self) {
	      likeRequestReview(self.id, 'unlike');
	    }

	    function likeRequestReview(rid, status) {
	      $.ajax({
	        type: "POST",
	        url: "review.php",
	        data: { rid: rid, status: status},
	        success: function (data){
	          console.log(data);
	          window.location.reload();
	        },
	        error: function (){
	          console.log("Something went wrong!");
	        }
	      });
	    }
  	</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>