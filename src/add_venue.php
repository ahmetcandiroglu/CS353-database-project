<?php
  include_once "navigation_info.php";

  //Get countries and cities
  $sql = "SELECT countryID, countryName FROM country";
  $countries = mysqli_query($db, $sql);
  $sql = "SELECT cityID, cityName FROM city";
  $cities = mysqli_query($db, $sql);

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['saveBtn']) && !empty($_POST['saveBtn'])) {
      
        $name = $_POST['vname']; 
        $streetName = $_POST['streetName'];
        $streetNum = $_POST['streetNum'];
        $status = $_POST['status'];
        $cityID = $_POST['cityID'];
        $openTime = $_POST['openTime'].':00';
        $closeTime = $_POST['closeTime'].':00';
        $desc = mysqli_real_escape_string($db, $_POST['venueDesc']);

        $sql = "INSERT INTO venue (venueName, venueDesc, street_number, street_name, cityID, venueStatus, venueOpenTime, venueCloseTime, managerName) VALUES
        ('$name', '$desc', $streetNum, '$streetName', $cityID, $status, '$openTime', '$closeTime', '$username')";
        echo "$sql";
        $query = mysqli_query($db, $sql);
        $venueID = mysqli_insert_id($db);

        if($query){
            header("location: venue.php?venueID=$venueID");
        }
        else{
            echo "Error";
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <title>Add Venue!</title>
  </head>

	<body>

  		<?php include_once "navigation.php"; ?>

        <br> <br>

        <div class="row">
            <div class="col-lg-6 offset-lg-3">

            <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">

                <div class="panel panel-default panel-main">
                    <div class="panel-heading text-center">
                        <b><h2>Add Venue</h2></b>
                    </div>

                    <div class="panel-body">
                        <p class="text-center">Complete Venue's Information</p>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <b><label for="vname">Venue name</label></b>
                                    <input type="text" name="vname" id="vname" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <b><label>Country </label></b><br>
                                    <select name="countryID" required>
                                        <?php 
                                            while($row = mysqli_fetch_array($countries)){
                                                echo '<option value="'.$row['countryID'].'">'.$row['countryName'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                                <div class="col-lg-3">
                                    <div class="form-group <?php //echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                                        <b><label>City </label></b><br>
                                        <select name="cityID" required>
                                        <?php
                                            while($row = mysqli_fetch_array($cities)){
                                                echo '<option value="'.$row['cityID'].'">'.$row['cityName'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                     <div class="form-group">
                                        <b><label>Street Name</label></b>
                                        <input type="text" name="streetName" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <b><label>Street Number</label></b>
                                        <input type="number" name="streetNum"class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <b><label>Status</label></b>
                                        <div class="input-group">
                                          <input type="radio" name="status" value="1" checked="checked" id="gender-male"/>
                                          <label for="available">&nbsp;Available &nbsp; &nbsp; </label>
                                          <input type="radio" name="status" value="2" id="gender-female"/>
                                          <label for="not-available">&nbsp; Not Available</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group <?php //echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                                        <b><label>Open Time </label></b> <br>
                                        <input id="time" type="time" name="openTime" required>
                                    </div>
                                </div>
                                 <div class="col-lg-3">
                                    <div class="form-group <?php //echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                                        <b><label>Close Time </label></b> <br>
                                        <input id="time" type="time" name="closeTime" required>

                                    </div>
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <b><label for="venueDesc">Venue Description</label></b>
                                <textarea style="resize: none;" maxlength="250" class="form-control" name="venueDesc" id="venueDesc" rows="5" required></textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 offset-lg-4">
                                    <div class="form-group text-center">
                                        <input type="submit" class="btn btn-success" value="Save and Next" name="saveBtn">
                                        <input type="submit" class="btn btn-default" value="Cancel" name="cancelBtn">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </body>
    </head>
</html>
