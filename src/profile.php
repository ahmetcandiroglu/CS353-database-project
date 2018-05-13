<?php
    require_once 'navigation_info.php';

    $accountType = $row['user_profileType'];
    if($accountType == 1)
    {
        header("refresh:1; url=redirect.php");
    }
?>

<html>
<head>
	<title>Profile | CheckMe</title>

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
                    Jean Database
                </h2>

                <!-- Profile Picture -->
                <img class="img-fluid" src="https://png.icons8.com/color/1600/avatar.png">
                
                <!-- Description -->
                <p class="text-center" style="padding-bottom:2px;padding-left:2px;padding-right:2px;padding-top:2px;margin:3px;">
                    <strong>About me</strong><br>
                    I like pizza.
                </p>

                <!-- Info -->
                <ul class="list-group" style="margin-top:5px;">
                    <li class="list-group-item" style="padding:10px;padding-right:5px;padding-top:0px;padding-bottom:0px;padding-left:5px;">
                        <p class="text-center" style="padding-bottom:2px;padding-left:2px;padding-right:2px;padding-top:2px;margin:3px;">
                            Born in 12 April
                        </p>
                    </li>
                    <li class="list-group-item" style="padding-top:2px;padding-right:2px;padding-bottom:2px;padding-left:2px;">
                        <p class="text-center" style="padding-bottom:0px;padding-left:2px;padding-right:2px;padding-top:0px;margin:3px;">
                            Joined in 4 February 2014<br>
                        </p>
                    </li>
                </ul>
            </div>

			<!-- Middle -->
            <div class="col-6 col-md-4 mx-auto">
                <!-- Preferences -->
                <div>
                    <strong style="font-size:14px;">Preferences</strong>
                    <span class="badge badge-info" style="margin:3px;margin-top:0px;margin-bottom:0px;margin-right:3px;margin-left:7px;">Pizza</span>
                    <span class="badge badge-info" style="margin-right:3px;margin-left:0px;">Kebab</span>
                    <span class="badge badge-info" style="margin-right:3px;">Night Life</span>
                </div>
                
                <!-- Buttons -->
                <div style="margin-top:4px;margin-bottom:4px;">
                    <button class="btn btn-success" type="button" style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;font-size:16px;">
                        <i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">add_box</i>
                        &nbsp; Add friend<br>
                    </button>
                    <button class="btn btn-success" type="button" style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;">
                        <i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">message</i>
                        &nbsp; Send Message
                    </button>
                </div>
                
                <!-- Check-In -->
                <div class="d-block">
                    <div class="card" style="margin-top:5px;margin-bottom:5px;">
                        <div class="card-body" style="margin-top:0px;margin-bottom:0px;">
                            <h6 class="text-muted card-subtitle mb-2">
                                Reviewed Pizza Il Forno
                                <i class="material-icons float-right" style="font-size:16px;">thumb_down</i>
                                <span class="badge badge-pill badge-light float-right">+7</span>
                                <i class="material-icons float-right" style="font-size:16px;">thumb_up</i>
                            </h6>
                            <h6 class="text-muted card-subtitle mb-2">22 February 2015</h6>
                            <p class="text-left card-text" style="font-size:14px;">
                                Pizzalar anlatıldığı gibi muhteşem. Tavuk Sezar pizza ve Füme Kaburga efsane. Keşke Nutellalı Pizzaya da yer kalsaydı. Bilkent Station içinde güzel bir yer olmuş.<br>
                            </p>
                            <img class="img-fluid" src="https://lh3.googleusercontent.com/p/AF1QipPribqPaGOErVapQ_ynL938jf-h8rvHLw9UkAon=w600-k" width="100px">
                        </div>
                    </div>
                    <div class="card" style="margin-top:5px;margin-bottom:5px;">
                        <div class="card-body" style="margin-top:5px;margin-bottom:5px;">
                            <h6 class="text-muted card-subtitle mb-2">
                                Checked In Kebab4Life
                                <i class="material-icons float-right" style="font-size:16px;">thumb_down</i>
                                <span class="badge badge-pill badge-light float-right">+5</span>
                                <i class="material-icons float-right" style="font-size:16px;">thumb_up</i>
                            </h6>
                            <h6 class="text-muted card-subtitle mb-2">10 February 2015</h6>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right -->
            <div class="col-3">

                <!-- Friends -->
                <a class="text-primary" href="#">207 Friends</a>
                <div class="card-group">
                    <div class="card">
                        <img class="card-img-top w-100 d-block" src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png">
                    </div>
                    <div class="card">
                        <img class="card-img-top w-100 d-block" src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-teacher-312a499a08079a12-512x512.png">
                    </div>
                    <div class="card">
                        <img class="card-img-top w-100 d-block" src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-boy-389cd1eb1d503149-512x512.png">
                    </div>
                </div>
                <a href="#">See all friends</a>

                <!-- Photos -->
                <div style="margin-top:10px;">
                    <strong>Latest Photos</strong>
                    <div class="carousel slide" data-ride="carousel" id="carousel-1">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="img-fluid w-100 d-block" src="https://thumb10.shutterstock.com/display_pic_with_logo/321742/211526557/stock-photo-man-eating-pizza-211526557.jpg" alt="Slide Image" style="margin-top:3px;">
                            </div>
                        </div>
                        <div>
                            <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="sr-only">Previous</span></a>
                                <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon"></span><span class="sr-only">Next</span>
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
	</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>