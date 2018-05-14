<?php
	// Include config file
	require_once 'navigation_info.php';
	$userFirstName_err = $userLastName_err = $username_err = $userEmail_err = $userCity_err = "";
	$userFirstNameValue = $userLastNameValue = $usernameValue = $EmailValue = $cityValue = "";

	if (isset($_POST['btnSave']))
	{
	  if(empty(trim($_POST['firstName'])) || empty(trim($_POST['lastName'])) || empty(trim($_POST['username'])) || empty(trim($_POST['userEmaili'])) || empty(trim($_POST['city'])) )
	  {
	      $userCity_err = "Please complete all the forms!";
	  }
	  else
	  {
	    $userFirstNameValue = trim($_POST['firstName']);
	    $userLastNameValue = trim($_POST['lastName']);
	    $usernameValue = trim($_POST['username']);
	    $EmailValue =  trim($_POST['userEmaili']);
	    $cityValue =  trim($_POST['city']);
	    $sql = "SELECT * FROM user_table WHERE username = '$usernameValue' ";
	    $query = mysqli_query($db, $sql);
	    $rowcount=mysqli_num_rows($query);

	    $sql = "SELECT * FROM user_table WHERE user_email = '$EmailValue' ";
	    $query = mysqli_query($db, $sql);
	    $rowcount1=mysqli_num_rows($query);

	    if( ($rowcount == 1 && $usernameValue != $usernameOfUser) || ($rowcount1 == 1 && $EmailValue != $userEmail) )
	    {
	      if($rowcount == 1 && $usernameValue != $usernameOfUser)
	          $username_err = "This username is already taken!";
	      else
	          $userEmail_err = "This email is already taken!";
	    }
	    else
	    {
	      $sql = "UPDATE user_table SET username = '$usernameValue', user_firstName = '$userFirstNameValue', user_lastName = '$userLastNameValue', user_email = '$EmailValue', city = '$cityValue'   WHERE username = '$username'";
	      $query = mysqli_query($db, $sql);
	      $_SESSION['username'] = $usernameValue;
	      header("location: profile_edited.php");
	    }

	  }
	}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

	<title>Edit User Profile</title>
</head>

<body>
	<?php include_once "navigation.php"; ?>
	
	<br> <br>

	<div class="row">
		
		<div class="col-lg-6 offset-lg-3">

        <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">

	    	<div class="panel panel-default panel-main">
				<div class="panel-heading text-center">
					<b><h2>Edit Profile</h2></b>
				</div>

				<div class="panel-body">
					<p class="text-center">Update your account.</p>
            		<div class="row col-lg-12">&nbsp;</div>


						<div class="row">
							<div class="col-lg-6">
								<div class="form-group <?php echo (!empty($userFirstName_err)) ? 'has-error' : ''; ?>">
				                    <b><label>Name</label></b>
				                    <input type="text" name="firstName"class="form-control" value="<?php echo htmlspecialchars($userFirstName); ?>">
				                    <span class="help-block"><?php echo $userFirstName_err; ?></span>
				                </div>
							</div>
							<div class="col-lg-6">
								<div class="form-group <?php echo (!empty($userLastName_err)) ? 'has-error' : ''; ?>">
				                    <b><label>Last Name</label></b>
				                    <input type="text" name="lastName"class="form-control" value="<?php echo htmlspecialchars($userLastName); ?>">
				                    <span class="help-block"><?php echo $userLastName_err; ?></span>
				                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								 <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
				                    <b><label>Username</label></b>
				                    <input type="text" name="username"class="form-control" value="<?php echo htmlspecialchars($username); ?>">
				                    <span class="help-block"><?php echo $username_err; ?></span>
				                </div>
							</div>
							<div class="col-lg-6">
								<div class="form-group <?php echo (!empty($userEmail_err)) ? 'has-error' : ''; ?>">
				                    <b><label>Email</label></b>
				                    <input type="text" name="userEmaili"class="form-control" value="<?php echo htmlspecialchars($userEmail); ?>">
				                    <span class="help-block"><?php echo $userEmail_err; ?></span>
				                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
				                <div class="form-group <?php echo (!empty($userCity_err)) ? 'has-error' : ''; ?>">
				                    <b><label>City</label></b>
				                    <input type="text" name="city" class="form-control" value="<?php echo htmlspecialchars($userCity); ?>">
				                    <span class="help-block"><?php echo $userCity_err; ?></span>
				                </div>
							</div>
				      	</div>
            			<div class="row">
							<div class="col-lg-3">
				                <div class="form-group">
				                    <b><label><?php echo htmlspecialchars($userFirstName); ?>'s Photo</label></b>
                            		<p>
			                          <?php
			                          $images = glob("$userPic");

			                          //display first image
			                          if (count($images) > 0) { // make sure at least one image exists
			                              $img = $images[0]; // first image
			                            echo '<img src="'.$img.'" alt="random image" height = "100">'."&nbsp;&nbsp;";
			                          } else {
			                          	$img = glob("$nophoto")[0];
			                            echo '<img src="'.$img.'" alt="random image" height = "100">'."&nbsp;&nbsp;";
			                          }

			                          ?>
                          			</p>
				                </div>
                          		<a href="change_photo.php" class="btn btn-primary">Upload</a>
							</div>
				      	</div>
				      	<hr>
						<div class="row">
							<div class="col-lg-4 offset-lg-4">
								<div class="form-group text-center">
				                    <input type="submit" name="btnSave"class="btn btn-success" value="Save">
				                    <a href="redirect.php" class="btn btn-link" >Cancel</a>
				                </div>
				            </div>
						</div>
					</div>
				</form>
			</div>
		</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
