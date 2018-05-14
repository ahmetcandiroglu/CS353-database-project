<?php
	// Include config file
	require_once 'navigation_info.php';
	$userFirstName_err = $userLastName_err = $username_err = $userEmail_err = $userCity_err = "";
	$userFirstNameValue = $userLastNameValue = $usernameValue = $EmailValue = $cityValue = "";

	if (isset($_POST['btnSave']))
	{

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
					<b><h2>Send Message</h2></b>
				</div>

				<div class="panel-body">
            		<div class="row col-lg-12">&nbsp;</div>


						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
				                    <b><label>From</label></b>
				                    <input type="text" name="firstName"class="form-control" value="<?php echo htmlspecialchars($userFirstName); ?>">
				                </div>
							</div>
						</div>
						<div class="row">
              <div class="col-lg-12">
								<div class="form-group">
				                    <b><label>To</label></b>
				                    <input type="text" name="firstName"class="form-control" value="<?php echo htmlspecialchars($userFirstName); ?>">
				                </div>
							</div>
						</div>
            <div class="row">
              <div class="col-lg-12">
								<div class="form-group">
				                    <b><label>Message</label></b>
                            <textarea class="form-control" name="message" rows="5" id="myMessage"></textarea>
				                </div>
							</div>
						</div>
				      	<hr>
						<div class="row">
							<div class="col-lg-4 offset-lg-4">
								<div class="form-group text-center">
				                    <input type="submit" name="btnSave"class="btn btn-success" value="Send">
				                    <input type="submit" name="btnCancel"class="btn btn-info" value="Cancel">
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
