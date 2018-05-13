<?php
    require_once 'venue_info.php';
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
			<div class="col-4">
				<!-- Name -->
                <h2 class="text-center" style="font-size:32px;margin:9px;">
                	<i class="material-icons" style="color:#4caf50;">restaurant</i>&nbsp;
                	<?php echo htmlspecialchars($vname); ?>
                </h2>
                
				<!-- Profile Picture -->
                <?php
		            $images = glob("$vpic");

		            // Image selection and display:
		            // Display first image
		            if (count($images) > 0) { // make sure at least one image exists
		              $img = $images[0]; // first image
		              echo '<img class="img-fluid" src="'.$img.'">';
		            }
		            else{
		            	$img = glob("$nophoto")[0]; // first image
		            	echo '<img class="img-fluid" src="'.$img.'">';
	          		}
	          	?>
                
				<!-- Description -->
                <p class="text-justify" style="margin:14px;">
                	<?php
                		echo htmlspecialchars($vdesc);
                	?> <br>
                </p>

				<!-- Plan to visit -->
                <div style="margin-top:4px;margin-bottom:4px;">
                	<button class="btn btn-success" type="button" style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;font-size:16px;">
                		<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">bookmark</i>
                		&nbsp; Plan a visit<br>
                	</button>
                    
                </div>
            </div>

            <!-- Middle -->
            <div class="col-6 col-md-4 mx-auto">
				<!-- Featuring -->
	            <div>
	            	<strong style="font-size:14px;">Featuring</strong>
	            	<span class="badge badge-info" style="margin:3px;margin-top:0px;margin-bottom:0px;margin-right:3px;margin-left:7px;">Pizza</span>
	            	<span class="badge badge-info" style="margin-right:3px;margin-left:0px;">Family</span>
	            	<span class="badge badge-info" style="margin-right:3px;">Healthy</span>
	            	<span class="badge badge-info" style="margin-right:3px;">Cosy Place</span>
	            </div>
	            
				<!-- Buttons -->
	            <div style="margin-top:4px;margin-bottom:4px;padding-top:4px;padding-bottom:4px;">
	            	<button class="btn btn-success" type="button" style="margin-left:3px;font-size:16px;">
	            		<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">check_circle</i>&nbsp; Check In<br>
	            	</button>
                    <button class="btn btn-success" type="button" style="margin-left:3px;font-size:16px;">
                    	<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">rate_review</i>&nbsp; Review
                    </button>
                    <button class="btn btn-success" type="button" style="margin-left:3px;font-size:16px;">
                    	<i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">feedback</i>&nbsp;Feedback<br>
                    </button>
                </div>
	            
				<!-- Check-In -->
	            <div class="d-block">
	                <div class="card" style="margin-top:5px;margin-bottom:5px;">
	                    <div class="card-body" style="margin-top:0px;margin-bottom:0px;">
	                        <h6 class="text-muted card-subtitle mb-2">
	                        	Jean, 22 February 2015
	                        	<i class="material-icons float-right" style="font-size:16px;">thumb_down</i>
	                        	<span class="badge badge-pill badge-light float-right">+7</span>
	                        	<i class="material-icons float-right" style="font-size:16px;">thumb_up</i>
	                        </h6>
	                        <p class="text-left card-text" style="font-size:14px;">
	                        	Pizzalar anlatıldığı gibi muhteşem. Tavuk Sezar pizza ve Füme Kaburga efsane. Keşke Nutellalı Pizzaya da yer kalsaydı. Bilkent Station içinde güzel bir yer olmuş.<br>
	                        </p>
	                        <img class="img-fluid" width="100px" style="margin-right:5px;margin-left:5px;">
	                        <img class="img-fluid" src="https://lh3.googleusercontent.com/p/AF1QipPribqPaGOErVapQ_ynL938jf-h8rvHLw9UkAon=w600-k" width="100px">
	                    </div>
	                </div>

	                <div class="card" style="margin-top:5px;margin-bottom:5px;">
	                    <div class="card-body" style="margin-top:5px;margin-bottom:5px;">
	                        <h6 class="text-muted card-subtitle mb-2">
	                        	Sefa, 5 September 2015
	                        	<i class="material-icons float-right" style="font-size:16px;">thumb_down</i>
	                        	<span class="badge badge-pill badge-light float-right">+5</span>
	                        	<i class="material-icons float-right" style="font-size:16px;">thumb_up</i>
	                        </h6>
	                        <p class="text-left card-text" style="font-size:14px;">
	                        	Bildiğiniz klişe mekanları unutunun! İl Forno gerçekten pizza yemek isteyenler için bir numara olmalı. Çalışanlar, ilgi, alaka, sunum harika. Ayrıca fiyatlarda çok uygun. Not küçük boy gayet doyurucu.<br>
	                        </p>
	                    </div>
	                </div>
	            </div>
	        </div>
						
	        <!-- Right -->
	        <div class="col-3">
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
	                    	Tel: +90 312 266 03 02<br>
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

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>