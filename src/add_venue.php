<?php include_once "navigation_info.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap-3.1.1.min.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css" />

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>

    <title>Add Venue!</title>
  </head>

	<body>

  		<?php include_once "navigation.php"; ?>

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
                                <b><h2>Add Venue</h2></b>
                            </div>
                            
                            <div class="panel-body">
                                <p class="text-center">Complete Venue's Information</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group <?php //echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
                                            <b><label>Venue Name</label></b>
                                            <input type="text" name="firstName"class="form-control" value="<?php //echo $firstName; ?>">
                                            <span class="help-block"><?php //echo $firstName_err; ?></span>
                                        </div>
                                    </div>      
                                    <div class="col-lg-3">
                                        <div class="form-group <?php //echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                                            <b><label>Country </label></b>
                                            <div class="dropdown">
                                              <button class="btn btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                China
                                              </button>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">China</a>
                                                <a class="dropdown-item" href="#">Italy</a>
                                                <a class="dropdown-item" href="#">Turkey</a>
                                              </div>
                                            </div>
                                            <span class="help-block"><?php //echo $lastName_err; ?></span>
                                        </div>
                                    </div>  
                                     <div class="col-lg-3">
                                        <div class="form-group <?php //echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                                            <b><label>City </label></b>
                                            <div class="dropdown">
                                              <button class="btn btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Ankara
                                              </button>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Ankara</a>
                                                <a class="dropdown-item" href="#">Izmir</a>
                                                <a class="dropdown-item" href="#">Denizli</a>
                                              </div>
                                            </div>
                                            <span class="help-block"><?php //echo $lastName_err; ?></span>
                                        </div>
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                         <div class="form-group <?php //echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                            <b><label>Street Name</label></b>
                                            <input type="text" name="streeName"class="form-control" value="<?php //echo $username; ?>">
                                            <span class="help-block"><?php //echo $username_err; ?></span>
                                        </div>
                                    </div>                                                      
                                    <div class="col-lg-6">
                                        <div class="form-group <?php //echo (!empty($userEmail_err)) ? 'has-error' : ''; ?>">
                                            <b><label>Street Number</label></b>
                                            <input type="number" name="streeNr"class="form-control" value="<?php //echo $userEmail; ?>">
                                            <span class="help-block"><?php //echo $userEmail_err; ?></span>
                                        </div>
                                    </div>  
                                </div>
                                <div class="row">           
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <b><label>Status</label></b>
                                            <div class="input-group">
                                              <input type="radio" name="gender" value="M" checked="checked" id="gender-male"/>
                                              <label for="available">&nbsp;Available &nbsp; &nbsp; </label>
                                              <input type="radio" name="gender" value="F" id="gender-female"/>
                                              <label for="not-available">&nbsp; Not Available</label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-lg-3">
                                        <div class="form-group <?php //echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                                            <b><label>Open Time </label></b>
                                            <div class="dropdown">
                                              <button class="btn btn-block btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                09:00
                                              </button>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">09:00</a>
                                                <a class="dropdown-item" href="#">10:00</a>
                                                <a class="dropdown-item" href="#">11:00</a>
                                              </div>
                                            </div>
                                            <span class="help-block"><?php //echo $lastName_err; ?></span>
                                        </div>
                                    </div>  
                                     <div class="col-lg-3">
                                        <div class="form-group <?php //echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                                            <b><label>Close Time </label></b>
                                            <div class="dropdown">
                                              <button class="btn btn-block btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                22:00
                                              </button>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">21:00</a>
                                                <a class="dropdown-item" href="#">22:00</a>
                                                <a class="dropdown-item" href="#">23:00</a>
                                              </div>
                                            </div>
                                            <span class="help-block"><?php //echo $lastName_err; ?></span>
                                        </div>
                                    </div>                                     
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                         <div class="form-group <?php //echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                                             <b><label>Categories</label></b>
                                             <div class="btn-group btn-block">
                                                <a href="#" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown"><span class="caret">Categories</span></a>
                                                <ul class="dropdown-menu" style="padding: 10px" id="myDiv">
                                                    <li><p><input type="checkbox" value="id1" style="margin-right: 10px;" name="class">Food</p></li>
                                                    <li><p><input type="checkbox" value="id2" style="margin-right: 10px;" name="class">Fun</p></li>
                                                    <li><p><input type="checkbox" value="id3" style="margin-right: 10px;"name="class"> Nightlife</p></li>
                                                    <li><p><input type="checkbox" value="id4" style="margin-right: 10px;" name="class">Product </p></li>
                                                    <li><p><input type="checkbox" value="id5" style="margin-right: 10px;" name="class">Name</p></li>
                                                    <li><p><input type="checkbox" value="id6" style="margin-right: 10px;" name="class">WI Number</p></li>
                                                    <li><p><input type="checkbox" value="id7" style="margin-right: 10px;" name="class">WI QTY</p></li>
                                                    <li><p><input type="checkbox" value="id8" style="margin-right: 10px;" name="class">Production QTY</p></li>
                                                    <li><p><input type="checkbox" value="id9" style="margin-right: 10px;" name="class">PD Sr.No (from-to)</p></li>
                                                    <li><p><input type="checkbox" value="id10" style="margin-right: 10px;" name="class"> Production Datdsadsasadase</p></li>
                                                    <button class="btn btn-info" onClick="showTable();">Save</button>
                                                </ul>
                                            </div>
                       
                                        </div>
                                    </div>                                                      
                                    <div class="col-lg-6">
                                         <div class="form-group <?php //echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                                             <b><label>Features</label></b>
                                             <div class="btn-group btn-block">
                                                <a href="#" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown"><span class="caret">Features</span></a>
                                                <ul class="dropdown-menu" style="padding: 10px" id="myDiv">
                                                    <li><p><input type="checkbox" value="id1" style="margin-right: 10px;" name="class">Wifi</p></li>
                                                    <li><p><input type="checkbox" value="id2" style="margin-right: 10px;" name="class">Air Conditioned</p></li>
                                                    <li><p><input type="checkbox" value="id3" style="margin-right: 10px;"name="class"> Pool</p></li>
                                                    <li><p><input type="checkbox" value="id4" style="margin-right: 10px;" name="class">Product </p></li>
                                                    <li><p><input type="checkbox" value="id5" style="margin-right: 10px;" name="class">Name</p></li>
                                                    <li><p><input type="checkbox" value="id6" style="margin-right: 10px;" name="class">WI Number</p></li>
                                                    <li><p><input type="checkbox" value="id7" style="margin-right: 10px;" name="class">WI QTY</p></li>
                                                    <li><p><input type="checkbox" value="id8" style="margin-right: 10px;" name="class">Production QTY</p></li>
                                                    <li><p><input type="checkbox" value="id9" style="margin-right: 10px;" name="class">PD Sr.No (from-to)</p></li>
                                                    <li><p><input type="checkbox" value="id10" style="margin-right: 10px;" name="class"> Production Datdsadsasadase</p></li>
                                                    <button class="btn btn-info" onClick="showTable();">Save</button>
                                                </ul>
                                            </div>
                       
                                        </div>
                                    </div>           
                                </div>

                                <div class="form-group">
                                    <b><label for="exampleTextarea">Venue Description</label></b>
                                    <textarea style="resize: none;" maxlength="250" class="form-control" id="venueDesc" rows="5"></textarea>
                                </div>

                                <div class="row">       
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4">
                                        <div class="form-group text-center">
                                            <input type="submit" class="btn btn-success" value="Save and Next">
                                            <input type="submit" class="btn btn-default" value="Cancel">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <

 <?php include_once "footer.php" ?>










