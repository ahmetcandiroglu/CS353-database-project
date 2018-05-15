<?php
 //Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username = $firstName = $lastName = $password = $userEmail = $date = $month = $year = $city = $confirm_password = $gender = $type = "";
$username_err = $firstName_err = $lastName_err = $city_err = $userEmail_err = $date_err = $month_err = $year_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    }

    else{
        // Prepare a select statement
        //Take the data for the given username
        $tempUserName = trim($_POST["username"]);
        $sql = "SELECT * FROM user_table WHERE username = '$tempUserName' ";
        $query = mysqli_query($db, $sql);
        $rowcount=mysqli_num_rows($query);

        //Check if there exist this username or Email
        //Give the corresponding message
        if($rowcount == 1 ){
            $username_err = "This username is already taken.";
        }
        else {
          $username = trim($_POST["username"]);

        }
      }
      // Validate password
      if(empty(trim($_POST['password']))){
          $password_err = "Please enter a password.";
      }
      else if(strlen(trim($_POST['password'])) < 6){
          $password_err = "Password must have atleast 6 characters.";
      }
      else{
          $password = trim($_POST['password']);
      }
      if(empty(trim($_POST['firstName']))){
          $firstName_err = "Please enter your first name!";
      }
      if(empty(trim($_POST['lastName']))){
          $lastName_err = "Please enter your last name!";
      }
      if(empty(trim($_POST['userEmaili']))){
          $userEmail_err = "Please enter your email!";
      }
      //if(empty(trim($_POST['city']))){
          //$city_err = "Please enter your city!";
     // }
      if(empty(trim($_POST['dayOfBirth']))){
          $date_err = "Please enter birth date!";
      }
      if(empty(trim($_POST['monthOfBirth']))){
          $month_err = "Please enter birth month!";
      }
      if(empty(trim($_POST['yearOfBirth']))){
          $year_err = "Please enter birth year!";
      }


      // Validate confirm password
      if(empty(trim($_POST["confirm_password"]))){
          $confirm_password_err = 'Please confirm password.';
      } else{
          $confirm_password = trim($_POST['confirm_password']);
          if($password != $confirm_password){
              $confirm_password_err = 'Password did not match.';
          }
      }

      // Check input errors before inserting in database
      if( empty($firstName_err) &&  empty($lastName_err) &&  empty($username_err) &&  empty($userEmail_err) &&  empty($password_err) &&  empty($confirm_password_err) &&  /*empty($city_err) && */ empty($date_err) &&  empty($month_err) &&  empty($year_err) ){
          $firstName = trim($_POST['firstName']);
          $lastName = trim($_POST['lastName']);
          $username = trim($_POST['username']);
          $userEmail = trim($_POST['userEmaili']);
          $password = trim($_POST['password']);
          //$city = trim($_POST['city']);
          $date = trim($_POST['dayOfBirth']);
          $month = trim($_POST['monthOfBirth']);
          $year = trim($_POST['yearOfBirth']);
          $gender = trim($_POST['gender']);
          $type = trim($_POST['type']);
          $userBirthday = $year."-".$month."-".$date;

          //Update City
		  $selected_key = $_POST['city'];
		  $ct = $selected_key;
		  $sqlc = "SELECT cityID FROM city WHERE cityName = '$ct'";
		  $queryc = mysqli_query($db, $sqlc);
		  $rowc = mysqli_fetch_array($queryc);
		  $cityID = $rowc['cityID'];
		  echo $cityID;

          //DO NOT FORGET TO CHANGE CITY ID
          $sql = "";
          if($gender == 'F'){
          	$sql = "INSERT INTO user_table(username, user_firstName, user_lastName, user_email, user_password, user_birthdate, user_gender,user_cityID, user_profileType, user_pic) VALUES ('$username', '$firstName', '$lastName', '$userEmail', '$password', '$userBirthday', '$gender', '$cityID', '$type','images/common/emptyWomen.png' )";
          }
          else{
          	$sql = "INSERT INTO user_table(username, user_firstName, user_lastName, user_email, user_password, user_birthdate, user_gender,user_cityID, user_profileType, user_pic) VALUES ('$username', '$firstName', '$lastName', '$userEmail', '$password', '$userBirthday', '$gender', '$cityID', '$type','images/common/no photo.png' )";
          }
          
          $query = mysqli_query($db, $sql);
          session_start();
          $_SESSION['username'] = $username;
          header("location: redirect.php");
      }

}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Sign up!</title>
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
								<b><h2>Sign Up</h2></b>
							</div>

							<div class="panel-body">
								<p class="text-center">Please fill in this form to create an account.</p>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group <?php echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Name</label></b>
						                    <input type="text" name="firstName"class="form-control" value="<?php echo $firstName; ?>">
						                    <span class="help-block"><?php echo $firstName_err; ?></span>
						                </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Last Name</label></b>
						                    <input type="text" name="lastName"class="form-control" value="<?php echo $lastName; ?>">
						                    <span class="help-block"><?php echo $lastName_err; ?></span>
						                </div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										 <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Username</label></b>
						                    <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
						                    <span class="help-block"><?php echo $username_err; ?></span>
						                </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group <?php echo (!empty($userEmail_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Email</label></b>
						                    <input type="text" name="userEmaili"class="form-control" value="<?php echo $userEmail; ?>">
						                    <span class="help-block"><?php echo $userEmail_err; ?></span>
						                </div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Password</label></b>
						                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
						                    <span class="help-block"><?php echo $password_err; ?></span>
						                </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Confirm Password</label></b>
						                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
						                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
						                </div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
						                <div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Choose your City</label></b>
						                    <div class="dropdown show">
											  <select id="city" name="city">                    
												<?php 
													$cities = "SELECT cityName FROM city";
													$querycities = mysqli_query($db, $cities);

													echo "<option value='0'>--Select City--</option>";
													while($rowc = mysqli_fetch_assoc($querycities)){
														echo "<option value='";
														echo $rowc['cityName'];
														echo "'>";
														echo $rowc['cityName'];
														echo "</option>";
													}
												?>
												
											</select>
											</div>
						                    <span class="help-block"><?php echo $city_err; ?></span>
						                </div>
									</div>
									<div class="col-lg-2">
										<div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Date</label></b>
						                    <input type="number" min="1" max="31" name="dayOfBirth" class="form-control" value="<?php echo $date; ?>">
						                    <span class="help-block"><?php echo $date_err; ?></span>
						                </div>
						            </div>
									<div class="col-lg-2">
										<div class="form-group <?php echo (!empty($month_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Month</label></b>
						                    <input type="number" min="1" max="12" name="monthOfBirth" class="form-control" value="<?php echo $month; ?>">
						                    <span class="help-block"><?php echo $month_err; ?></span>
						                </div>
						            </div>
									<div class="col-lg-2">
										<div class="form-group <?php echo (!empty($year_err)) ? 'has-error' : ''; ?>">
						                    <b><label>Year</label></b>
						                    <input type="number" min="1900" max="2005" name="yearOfBirth" class="form-control" value="<?php echo $year; ?>">
						                    <span class="help-block"><?php echo $year_err; ?></span>
						                </div>
						            </div>
					                </div>

					            <div class="row">
									<div class="col-lg-6">
										<div class="form-group">
						                    <b><label>Gender</label></b>
							                <div class="input-group">
							                  <input type="radio" name="gender" value="M" checked="checked" id="gender-male"/>
							                  <label for="gender-male">Male &nbsp; &nbsp;</label>
							                  <input type="radio" name="gender" value="F" id="gender-female"/>
							                  <label for="gender-female">Female</label>
							                </div>
						                </div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<b><label>Account Type </label></b>
							                <div class="input-group">
							                  <input type="radio" name="type" value="1"  id="type-manager"/>
							                  <label for="type-manager">Manager &nbsp; &nbsp;</label>
							                  <input type="radio" name="type" value="2" checked="checked" id="type-normalUser"/>
							                  <label for="type-normalUser">User</label>
							                </div>
						                </div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-4"></div>
									<div class="col-lg-4">
										<div class="form-group text-center">
						                    <input type="submit" class="btn btn-success" value="Register">
						         </div>
						            </div>
						        </div>
					        		<p class="text-center">Already have an account? <a href="login.php"><b>Login here</b></a>.</p>
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
