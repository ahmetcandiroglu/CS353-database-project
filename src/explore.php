<?php
	include_once "navigation_info.php";
?>


<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<style type="text/css">
				#myInput {
		    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
		    background-position: 10px 12px; /* Position the search icon */
		    background-repeat: no-repeat; /* Do not repeat the icon image */
		    width: 100%; /* Full-width */
		    font-size: 16px; /* Increase font-size */
		    padding: 12px 20px 12px 40px; /* Add some padding */
		    border: 1px solid #ddd; /* Add a grey border */
		    margin-bottom: 12px; /* Add some space below the input */
		}

		#myTable {
		    border-collapse: collapse; /* Collapse borders */
		    width: 100%; /* Full-width */
		    border: 1px solid #ddd; /* Add a grey border */
		    font-size: 18px; /* Increase font-size */
		}

		#myTable th, #myTable td {
		    text-align: left; /* Left-align text */
		    padding: 12px; /* Add padding */
		}

		#myTable tr {
		    /* Add a bottom border to all table rows */
		    border-bottom: 1px solid #ddd; 
		}

		#myTable tr.header, #myTable tr:hover {
		    /* Add a grey background color to the table header and on hover */
		    background-color: #f1f1f1;
		}
	</style>
	<title>Explore</title>
</head>

  <body>
  <?php 
    include_once "navigation.php";   
  ?>

	<div class="container text-center">	
	  	<div class="row">&nbsp;</div>	
	  	<div class="row">&nbsp;</div>
	  	<div class="row">&nbsp;</div>	
	  	<div class="row">&nbsp;</div>
	  	<div class="row">&nbsp;</div>	
	  	<div class="row">&nbsp;</div>
	  	<form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">
		<div class="row">
			<div class="col-lg-12">
				<script language="javascript" type="text/javascript">
			    function dynamicdropdown(listindex)
			    {
			        switch (listindex)
			        {
			        case "2" :
			            document.getElementById("city").options[0]=new Option("Select city","");
			            document.getElementById("city").options[1]=new Option("Ankara","4");
			            document.getElementById("city").options[2]=new Option("Istanbul","5");
			            break;
			        case "3" :
			            document.getElementById("city").options[0]=new Option("Select city","");
			            document.getElementById("city").options[1]=new Option("London","6");
			            document.getElementById("city").options[2]=new Option("Liverpool","7");
			            document.getElementById("city").options[3]=new Option("Brighton","8");
			            break;
			        }
			        return true;
			    }
			    </script>
			 
			 	<div class="row">
			 		<div class="col-lg-3"></div>
					 <div class="col-lg-5"> 
				    <div class="countrydiv" id="countrydiv"><b>Country:</b>
				        <select id="country1" name="country1" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
				        <option value="0">Select Country</option>
				        <option value="2">Turkey</option>
				        <option value="3">United Kingdom</option>
				        </select>
				    </div>
				</div>
				 </div>
				<div class="row">&nbsp;</div>	
	  			<div class="row">&nbsp;</div>
				 <div class="row">	
				 <div class="col-lg-3"></div>
				 <div class="col-lg-5"> 
				    <div class="citydiv" id="citydiv"><b>City:</b>
				        <script type="text/javascript" language="JavaScript">
				        document.write('<select name="city" id="city"><option value="0">Select City</option></select>')
				        </script>
				    </div>
				</div>
				 </div>
				 <div class="row">&nbsp;</div>	
	  			<div class="row">&nbsp;</div>
				 <div class="row">	
					 <div class="col-lg-3"></div>
					 <div class="col-lg-5">
					 	<div class="categorydiv" id="categorydiv"><b>Category:</b>
					 		<select id="category" name="category"> 
						 		<?php 
	                                $categories = "SELECT categoryID, categoryName FROM category";
	                                $querycat = mysqli_query($db, $categories);

	                                echo "<option value='0'>Select Category</option>";
	                                while($rowcat = mysqli_fetch_assoc($querycat)){
	                                    echo "<option value='";
	                                    echo $rowcat['categoryID'];
	                                    echo "'>";
	                                    echo $rowcat['categoryName'];
	                                    echo "</option>";
	                                }
	                            ?>
	                        </select>
	                    </div>
	                </div>
	            </div>
	             <div class="row">&nbsp;</div>	
	  			<div class="row">&nbsp;</div>
				 <div class="row">	
					 <div class="col-lg-3"></div>
					 <div class="col-lg-5">
					 	<div class="featurediv" id="featurediv"><b>Feature:</b>
					 		<select id="feature" name="feature"> 
						 		<?php 
	                                $features = "SELECT featureName FROM feature";
	                                $queryfea = mysqli_query($db, $features);

	                                echo "<option value='0'>Select Feature</option>";
	                                while($rowfea = mysqli_fetch_assoc($queryfea)){
	                                    echo "<option value='";
	                                    echo $rowfea['featureName'];
	                                    echo "'>";
	                                    echo $rowfea['featureName'];
	                                    echo "</option>";
	                                }
	                            ?>
	                        </select>
	                    </div>
	                </div>
	            </div>
	    
	
	             <div class="row">&nbsp;</div>	
	  			<div class="row">&nbsp;</div>
	            <div class="row ">
	            	<div class="col-lg-3"></div>
					<div class="col-lg-5 text-center">
		                <form action="explore.php" method="post">
						    <input type="submit" id="btnSearch1" name="btnSearch1" value="Explore" />
						</form>
		            </div>
				</div>
			</div>
		</div>
	</form>

<div class="row">
	<div class="col-lg-12">
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for venue.." title="Type in a name">
			<table id="myTable">
					  <tr class="header">
					  	<th style="width:5%;"></th>
					  	<th style="width:5%;"></th>
					    <th style="width:20%;">Name</th>
					    <th style="width:17%;">City</th>
					    <th style="width:15%;">Tel</th>
					    <th style="width:38%;">Desc</th>
					  </tr>
					  
					  <?php 

					  if(isset($_POST['btnSearch1']))   {
						  	$selected_country = $_POST['country1'];
							$selected_city = $_POST['city'];
							$selected_category = $_POST['category'];
							$selected_feature = $_POST['feature'];

							//None is selected
						  	if($selected_feature == 0 && $selected_category == 0 && $selected_city == 0 && $selected_country == 0){							
								echo "Select at least one";
							}
							//Each city in the coutry
							if($selected_feature == 0 && $selected_category == 0 && $selected_city == 0 && $selected_country != 0){
								$findc = "SELECT cityID, cityName FROM city WHERE countryID = '$selected_country'";
								$quer = mysqli_query($db, $findc);

								while($rowcountry = mysqli_fetch_assoc($quer)){
									$cit = $rowcountry['cityID'];

									$count = "SELECT venueID, venueName, venueDesc, venueTel, venuePic FROM venue WHERE cityID = '$cit'";
									$quer2 = mysqli_query($db, $count);
									
									$i = 1;
									while($rowcity = mysqli_fetch_assoc($quer2)){
									echo "<tr>";
										echo "<td>"; echo $i; echo "</td>";
							  			echo "<td><a href='venue.php?venueID=";
							  			echo $rowcity['venueID'];
							  			echo "'><img src='"; echo $rowc['venuePic']; echo"' class='rounded-circle' style='width: 30px; height: 30px;' alt='Cinque Terre'></a></td>";
							    		echo "<td><a href='venue.php?venueID=";
							    		echo $rowcity['venueID'];
							    		echo "'>";
							    	    echo $rowcity['venueName']; echo "</td><td>";
							    	    echo $rowcountry['cityName'];
							    	    echo "</td><td>";
							    	    echo $rowcity['venueTel'];
							    	    echo "</td><td>";
							    	    echo $rowcity['venueDesc'];
							    	    echo "</td>";
							  		echo "</tr>";
							  		$i++;
									}
								}
							}
							if($selected_feature == 0 && $selected_category == 0 && $selected_city != 0 ){
								//Only the city is selected							
								$count3 = "SELECT venueID, venueName, venueDesc, venueTel, venuePic FROM venue WHERE cityID = '$selected_city'";
								$quer3 = mysqli_query($db, $count3);

								$cnam = "SELECT cityName FROM city WHERE cityID = '$selected_city'";
								$quer4 = mysqli_query($db, $cnam);

								$r = mysqli_fetch_assoc($quer4);
								$cityName = $r['cityName'];

								$i = 1;
								while($rowcity = mysqli_fetch_assoc($quer3)){
								echo "<tr>";
									echo "<td>"; echo $i; echo "</td>";
						  			echo "<td><a href='venue.php?venueID=";
						  			echo $rowcity['venueID'];
						  			echo "'><img src='"; echo $rowc['venuePic']; echo"' class='rounded-circle' style='width: 30px; height: 30px;' alt='Cinque Terre'></a></td>";
						    		echo "<td><a href='venue.php?venueID=";
						    		echo $rowcity['venueID'];
						    		echo "'>";
						    	    echo $rowcity['venueName']; echo "</td><td>";
						    	    echo $cityName;
						    	    echo "</td><td>";
						    	    echo $rowcity['venueTel'];
						    	    echo "</td><td>";
						    	    echo $rowcity['venueDesc'];
						    	    echo "</td>";
						  		echo "</tr>";
						  		$i++;
								}
							}
							//Only category is selected
							if($selected_feature == 0 && $selected_category != 0 && $selected_city == 0 && $selected_country == 0){
								$count4 = "SELECT venueID FROM cat_venue WHERE categoryID = '$selected_category'";
								$quer4 = mysqli_query($db, $count4);

								$i = 1;
								while($row = mysqli_fetch_assoc($quer4)){
									$id = $row['venueID'];
									$count5 = "SELECT venueID, venueName, venueDesc, venueTel, venuePic, cityID FROM venue WHERE venueID = '$id'";	
									$quer5 = mysqli_query($db, $count5);

									$meh = mysqli_fetch_assoc($quer5);
									$citID = $meh['cityID'];

									$cnam = "SELECT cityName FROM city WHERE cityID = '$citID'";
									$quer6 = mysqli_query($db, $cnam);

									$r = mysqli_fetch_assoc($quer6);
									$cityName = $r['cityName'];								

									echo "<tr>";
										echo "<td>"; echo $i; echo "</td>";
							  			echo "<td><a href='venue.php?venueID=";
							  			echo $meh['venueID'];
							  			echo "'><img src='"; echo $rowc['venuePic']; echo"' class='rounded-circle' style='width: 30px; height: 30px;' alt='Cinque Terre'></a></td>";
							    		echo "<td><a href='venue.php?venueID=";
							    		echo $meh['venueID'];
							    		echo "'>";
							    	    echo $meh['venueName']; echo "</td><td>";
							    	    echo $cityName;
							    	    echo "</td><td>";
							    	    echo $meh['venueTel'];
							    	    echo "</td><td>";
							    	    echo $meh['venueDesc'];
							    	    echo "</td>";
							  		echo "</tr>";
							  		$i++;
								}							
							}
							//Category and country is selected 
							if($selected_feature == 0 && $selected_category != 0 && $selected_city == 0 && $selected_country != 0){
								$findc = "SELECT cityID, cityName FROM city WHERE countryID = '$selected_country'";
								$quer = mysqli_query($db, $findc);

								while($rowcountry = mysqli_fetch_assoc($quer)){
									$cit = $rowcountry['cityID'];

									$count = "SELECT venueID FROM venue WHERE cityID = '$cit' ";//INTERSECT SELECT venueID FROM cat_venue WHERE categoryID = '$selected_category'";
									$quer2 = mysqli_query($db, $count);
									
									$i = 1;
									while($row = mysqli_fetch_assoc($quer2)){
										$vid = $row['venueID'];
										$count11 = "SELECT venueID, venueName, venueDesc, venueTel, venuePic, cityID FROM venue WHERE venueID = '$vid'";
										$quer11 = mysqli_query($db, $count11);
										$rowcity = mysqli_fetch_assoc($quer11);

										$cnam = "SELECT cityName FROM city WHERE cityID = '$cit'";
										$quer6 = mysqli_query($db, $cnam);
										$name = mysqli_fetch_assoc($quer6);
										
										echo "<tr>";
											echo "<td>"; echo $i; echo "</td>";
								  			echo "<td><a href='venue.php?venueID=";
								  			echo $rowcity['venueID'];
								  			echo "'><img src='"; echo $rowc['venuePic']; echo"' class='rounded-circle' style='width: 30px; height: 30px;' alt='Cinque Terre'></a></td>";
								    		echo "<td><a href='venue.php?venueID=";
								    		echo $rowcity['venueID'];
								    		echo "'>";
								    	    echo $rowcity['venueName']; echo "</td><td>";
								    	    echo $name['cityName'];
								    	    echo "</td><td>";
								    	    echo $rowcity['venueTel'];
								    	    echo "</td><td>";
								    	    echo $rowcity['venueDesc'];
								    	    echo "</td>";
								  		echo "</tr>";
								  		$i++;

									}
								}

							}
							//Category and city are selected
							if($selected_feature == 0 && $selected_category != 0 && $selected_city != 0){
								$count = "SELECT venueID FROM venue WHERE cityID = '$selected_city' INTERSECT SELECT venueID FROM cat_venue WHERE categoryID = '$selected_category'";
								$quer2 = mysqli_query($db, $count);
								
								$i = 0;
								while($row = mysqli_fetch_assoc($quer2)){
									$vid = $row['venueID'];
									$count11 = "SELECT venueID, venueName, venueDesc, venueTel, venuePic, cityID FROM venue WHERE venueID = '$vid'";
									$quer11 = mysqli_query($db, $count11);
									$rowcity = mysqli_fetch_assoc($quer11);

									$cid = $row['cityID'];
									$cnam = "SELECT cityName FROM city WHERE cityID = '$cid'";
									$quer6 = mysqli_query($db, $cnam);
									$name = mysqli_fetch_assoc($quer6);
									
									echo "<tr>";
										echo "<td>"; echo $i; echo "</td>";
							  			echo "<td><a href='venue.php?venueID=";
							  			echo $rowcity['venueID'];
							  			echo "'><img src='"; echo $rowc['venuePic']; echo"' class='rounded-circle' style='width: 30px; height: 30px;' alt='Cinque Terre'></a></td>";
							    		echo "<td><a href='venue.php?venueID=";
							    		echo $rowcity['venueID'];
							    		echo "'>";
							    	    echo $rowcity['venueName']; echo "</td><td>";
							    	    echo $name['cityName'];
							    	    echo "</td><td>";
							    	    echo $rowcity['venueTel'];
							    	    echo "</td><td>";
							    	    echo $rowcity['venueDesc'];
							    	    echo "</td>";
							  		echo "</tr>";
							  		$i++;
								}
							}
							//Category, Feature and city are selected
							if($selected_feature != 0 && $selected_category != 0 && $selected_city != 0){
								$count = "SELECT venueID FROM venue WHERE cityID = '$selected_city' INTERSECT SELECT venueID FROM cat_venue WHERE categoryID = '$selected_category'
															INTERSECT SELECT venueID FROM feature WHERE featureName = '$selected_feature' ";
								$quer2 = mysqli_query($db, $count);
								
								$i = 0;
								while($row = mysqli_fetch_assoc($quer2)){
									$vid = $row['venueID'];
									$count11 = "SELECT venueID, venueName, venueDesc, venueTel, venuePic, cityID FROM venue WHERE venueID = '$vid'";
									$quer11 = mysqli_query($db, $count11);
									$rowcity = mysqli_fetch_assoc($quer11);

									$cid = $row['cityID'];
									$cnam = "SELECT cityName FROM city WHERE cityID = '$cid'";
									$quer6 = mysqli_query($db, $cnam);
									$name = mysqli_fetch_assoc($quer6);
									
									echo "<tr>";
										echo "<td>"; echo $i; echo "</td>";
							  			echo "<td><a href='venue.php?venueID=";
							  			echo $rowcity['venueID'];
							  			echo "'><img src='"; echo $rowc['venuePic']; echo"' class='rounded-circle' style='width: 30px; height: 30px;' alt='Cinque Terre'></a></td>";
							    		echo "<td><a href='venue.php?venueID=";
							    		echo $rowcity['venueID'];
							    		echo "'>";
							    	    echo $rowcity['venueName']; echo "</td><td>";
							    	    echo $name['cityName'];
							    	    echo "</td><td>";
							    	    echo $rowcity['venueTel'];
							    	    echo "</td><td>";
							    	    echo $rowcity['venueDesc'];
							    	    echo "</td>";
							  		echo "</tr>";
							  		$i++;
								}
							}
							//Only feature is selected
							if($selected_feature != 0 && $selected_category == 0 && $selected_city == 0 && $selected_country == 0){
								$count4 = "SELECT venueID FROM feature WHERE featureName = '$selected_feature'";
								$quer4 = mysqli_query($db, $count4);

								$i = 1;
								while($row = mysqli_fetch_assoc($quer4)){
									$id = $row['venueID'];
									$count5 = "SELECT venueID, venueName, venueDesc, venueTel, venuePic, cityID FROM venue WHERE venueID = '$id'";	
									$quer5 = mysqli_query($db, $count5);

									$meh = mysqli_fetch_assoc($quer5);
									$citID = $meh['cityID'];

									$cnam = "SELECT cityName FROM city WHERE cityID = '$citID'";
									$quer6 = mysqli_query($db, $cnam);

									$r = mysqli_fetch_assoc($quer6);
									$cityName = $r['cityName'];								

									echo "<tr>";
										echo "<td>"; echo $i; echo "</td>";
							  			echo "<td><a href='venue.php?venueID=";
							  			echo $meh['venueID'];
							  			echo "'><img src='"; echo $rowc['venuePic']; echo"' class='rounded-circle' style='width: 30px; height: 30px;' alt='Cinque Terre'></a></td>";
							    		echo "<td><a href='venue.php?venueID=";
							    		echo $meh['venueID'];
							    		echo "'>";
							    	    echo $meh['venueName']; echo "</td><td>";
							    	    echo $cityName;
							    	    echo "</td><td>";
							    	    echo $meh['venueTel'];
							    	    echo "</td><td>";
							    	    echo $meh['venueDesc'];
							    	    echo "</td>";
							  		echo "</tr>";
							  		$i++;
								}							
							}
							//Category and Feature are selected
							if($selected_feature != 0 && $selected_category != 0 && $selected_city != 0){
								$count = "SELECT venueID FROM cat_venue WHERE categoryID = '$selected_category'
															INTERSECT SELECT venueID FROM feature WHERE featureName = '$selected_feature' ";
								$quer2 = mysqli_query($db, $count);
								
								$i = 0;
								while($row = mysqli_fetch_assoc($quer2)){
									$vid = $row['venueID'];
									$count11 = "SELECT venueID, venueName, venueDesc, venueTel, venuePic, cityID FROM venue WHERE venueID = '$vid'";
									$quer11 = mysqli_query($db, $count11);
									$rowcity = mysqli_fetch_assoc($quer11);

									$cid = $row['cityID'];
									$cnam = "SELECT cityName FROM city WHERE cityID = '$cid'";
									$quer6 = mysqli_query($db, $cnam);
									$name = mysqli_fetch_assoc($quer6);
									
									echo "<tr>";
										echo "<td>"; echo $i; echo "</td>";
							  			echo "<td><a href='venue.php?venueID=";
							  			echo $rowcity['venueID'];
							  			echo "'><img src='"; echo $rowc['venuePic']; echo"' class='rounded-circle' style='width: 30px; height: 30px;' alt='Cinque Terre'></a></td>";
							    		echo "<td><a href='venue.php?venueID=";
							    		echo $rowcity['venueID'];
							    		echo "'>";
							    	    echo $rowcity['venueName']; echo "</td><td>";
							    	    echo $name['cityName'];
							    	    echo "</td><td>";
							    	    echo $rowcity['venueTel'];
							    	    echo "</td><td>";
							    	    echo $rowcity['venueDesc'];
							    	    echo "</td>";
							  		echo "</tr>";
							  		$i++;
								}
							}


						}	
					
					  ?>
					</table>
				</div>
			</div>
		</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>

									