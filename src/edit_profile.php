<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Edit profile!</title>
  </head>
  
    <body>
    	<div class="row col-lg-12">&nbsp;</div>
    	<div class="row col-lg-12">&nbsp;</div>
    	<div class="row col-lg-12">&nbsp;</div>
    	<div class="row col-lg-12">&nbsp;</div>
    	<div class="row col-lg-12">&nbsp;</div>
    	<div class="row">
    		<div class="col-lg-3"></div>
    		<div class="col-lg-6">
 
            <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">

				    	<div class="panel panel-default panel-main">
							<div class="panel-heading text-center">
								<b><h2>Edit Profile</h2></b>
							</div>
							
							<div class="panel-body">
								<p class="text-center">Update your account.</p>



								<div class="row">
									<div class="col-lg-6">
										<div class="form-group <?php //echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Name</label></b>
						                    <input type="text" name="firstName"class="form-control" value="<?php //echo $firstName; ?>">
						                    <span class="help-block"><?php //echo $firstName_err; ?></span>
						                </div>
									</div>		
									<div class="col-lg-6">
										<div class="form-group <?php //echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Last Name</label></b>
						                    <input type="text" name="lastName"class="form-control" value="<?php //echo $lastName; ?>">
						                    <span class="help-block"><?php //echo $lastName_err; ?></span>
						                </div>
									</div>	
								</div>
								<div class="row">
									<div class="col-lg-6">
										 <div class="form-group <?php //echo (!empty($username_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Username</label></b>
						                    <input type="text" name="username"class="form-control" value="<?php //echo $username; ?>">
						                    <span class="help-block"><?php //echo $username_err; ?></span>
						                </div>
									</div>														
									<div class="col-lg-6">
										<div class="form-group <?php //echo (!empty($userEmail_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Email</label></b>
						                    <input type="text" name="userEmaili"class="form-control" value="<?php //echo $userEmail; ?>">
						                    <span class="help-block"><?php //echo $userEmail_err; ?></span>
						                </div>
									</div>	
								</div>
								<div class="row">			
									<div class="col-lg-6">
						                <div class="form-group <?php //echo (!empty($city_err)) ? 'has-error' : ''; ?>">
						                    <b><label>City</label></b>
						                    <input type="text" name="city" class="form-control" value="<?php //echo $city; ?>">
						                    <span class="help-block"><?php //echo $city_err; ?></span>
						                </div>
									</div>					                  
					            </div>

								<div class="row">		
									<div class="col-lg-4"></div>
									<div class="col-lg-4">
										<div class="form-group text-center">
						                    <input type="submit" class="btn btn-success" value="Save">
						                    <input type="submit" class="btn btn-default" value="Cancel">
						                </div>
						            </div>
						        </div>
							</div>
						</div>
					</form>
				</div>

			</div>
			    	<div class="row col-lg-12">&nbsp;</div>
    	<div class="row col-lg-12">&nbsp;</div>
			<div class="row">	
				<div class="col-lg-3"></div>		
				<div class="col-lg-6">
		        	<form action="upload_photo.php">
						  <input type="file" name="profilepic" accept="image/*">
						  <input type="submit">
					</form>
				</div>
			</div>
									
	


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>