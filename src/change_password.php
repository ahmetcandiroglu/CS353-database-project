<?php
require_once 'navigation_info.php';
$oldPass = $newPass = $confirmPass = "";
$oldPass_err = $newPass_err = $confirmPass_err = "";

if (isset($_POST['btnSave']))
{
  if(empty(trim($_POST['oldPass'])) || empty(trim($_POST['newPass'])) || empty(trim($_POST['confirmPass'])))  {
      $confirmPass_err = "Please complete all the forms!";
  }
  else
  {
    $sql = "SELECT user_password FROM user_table WHERE username = '$username'";
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($query);

    $userPassword = $row['user_password'];
    if(trim($_POST['oldPass']) != $userPassword)
    {
        $oldPass_err = "Old password is incorrect!";
    }
    else
    {
      if(trim($_POST['newPass']) != trim($_POST['confirmPass'])  )
      {
        $confirmPass_err = "Password should be the same!";
      }
      else
      {
        $tempPass = trim($_POST['newPass']);
        $sql = "UPDATE user_table SET user_password = '$tempPass'  WHERE username = '$username'";
        $query = mysqli_query($db, $sql);
        header("refresh:1; url=password_changed.php");
      }
    }
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Change Password</title>
  </head>

  <body>
    <?php include_once "navigation.php"; ?>

    <div class="row col-lg-12">&nbsp;</div>
    <div class="row col-lg-12">&nbsp;</div>

    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">

        <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">
          <div class="panel panel-default panel-main">
          <div class="panel-heading text-center">
            <b><h2>Change password</h2></b>
          </div>

          <div class="panel-body">
            <p class="text-center">Please complete the fields belows to change your password.</p>
            <div class="row col-lg-12">&nbsp;</div>

            <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
              <div class="form-group text-center <?php echo (!empty($oldPass_err)) ? 'has-error' : ''; ?>">
                          <b><label>Old Password</label></b>
                          <input type="password" name="oldPass"class="form-control" value="<?php echo $oldPass; ?>">
                          <span class="help-block"><?php echo $oldPass_err; ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
              <div class="form-group text-center <?php echo (!empty($newPass_err)) ? 'has-error' : ''; ?>">
                          <b><label>New Password</label></b>
                          <input type="password" name="newPass"class="form-control" value="<?php echo $newPass; ?>">
                          <span class="help-block"><?php echo $newPass_err; ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
              <div class="form-group text-center <?php echo (!empty($confirmPass_err)) ? 'has-error' : ''; ?>">
                          <b><label>Confirm Password</label></b>
                          <input type="password" name="confirmPass"class="form-control" value="<?php echo $confirmPass; ?>">
                          <span class="help-block"><?php echo $confirmPass_err; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group text-center">
                  <input type="submit" name="btnSave" class="btn btn-success" value="Save">
                  <a href="redirect.php" class="btn btn-danger" >Cancel</a>
              </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
