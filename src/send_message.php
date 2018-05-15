<?php
	// Include config file
	require_once 'navigation_info.php';
	$message_err = "";
	$message = "";

	$receiverUsername = $_SESSION['messageReceiver'];

	if (isset($_POST['btnSend']))
	{
    // Check if username is empty
    if(empty(trim($_POST["message"]))){
        $message_err = 'Please enter a message.';
    } else{
        $message = trim($_POST["message"]);
        $sql = "INSERT INTO messages(sender, receiver, message) VALUES ('$username', '$receiverUsername', '$message') ";
        $query = mysqli_query($db, $sql);
				unset($_SESSION['messageReceiver']);
				header("location:profile.php?profileName=$receiverUsername");
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
					<b><h2>Send Message</h2></b>
				</div>

				<div class="panel-body">
            		<div class="row col-lg-12">&nbsp;</div>


						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
				                    <b><label>From</label></b>
				                    <input disabled type="text" name="senderUsername"class="form-control" value="<?php echo htmlspecialchars($username); ?>">
				                </div>
							</div>
						</div>
						<div class="row">
              <div class="col-lg-12">
								<div class="form-group">
				                    <b><label>To</label></b>
				                    <input disabled type="text" name="receiverUsername"class="form-control" value="<?php echo htmlspecialchars($receiverUsername); ?>">
				                </div>
							</div>
						</div>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group <?php echo (!empty($message_err)) ? 'has-error' : ''; ?>">
                    <label><b>Message</b></label>
                    <textarea class="form-control" name="message" rows="5" id="myMessage"></textarea>
                    <span class="help-block"><?php echo $message_err; ?></span>
                </div>
							</div>
						</div>
				      	<hr>
						<div class="row">
							<div class="col-lg-4 offset-lg-4">
								<div class="form-group text-center">
				                    <input type="submit" name="btnSend"class="btn btn-success" value="Send">
                            <a href="profile.php?profileName=<?php echo $receiverUsername; ?>">
                              <button class="btn btn-info" type="button" id="cancelMes"
                                style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;>
                                  <i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;"></i>
                                   Cancel
                              </button>
                            </a>
                          </a>
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
