<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

	<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>

	<title>Explore People</title>
</head>

  <body>
	  <?php 
	    include_once "navigation_info.php";
	    include_once "navigation.php";   
	  ?>

	  <div class="container">	
	  	<div class="row">&nbsp;</div>	
	  	<div class="row">&nbsp;</div>
		<div class="row">
			<div class="col-lg-12">
				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for people.." title="Type in a name">
					<table id="myTable">
					  <tr class="header">
					  	<th style="width:5%;"></th>
					    <th style="width:40%;">Name</th>
					    <th style="width:40%;">City</th>
					  </tr>
					  
					  <?php 
					  	$sql = "SELECT username,user_firstName, user_cityID, user_pic FROM user_table";
					  	$query = mysqli_query($db, $sql);

					  	while($rowc = mysqli_fetch_assoc($query)){
					  		if($rowc['username'] != $username){
					  			$cid = $rowc['user_cityID'];
						  		$sql1 = "SELECT cityName FROM city WHERE cityID = '$cid'";
						  		$query1 = mysqli_query($db, $sql1);
						  		$city = mysqli_fetch_assoc($query1);

						  		echo "<tr>";
						  			echo "<td><a href='profile.php?profileName=";
						  			echo $rowc['username'];
						  			echo "'><img src='"; echo $rowc['user_pic']; echo"' class='rounded-circle' style='width: 30px; height: 30px;' alt='Cinque Terre'></a></td>";
						    		echo "<td><a href='profile.php?profileName=";
						    		echo $rowc['username'];
						    		echo "'>";
						    	    echo $rowc['user_firstName']; echo "</td>";
						    		echo "<td>";
						    		echo $city['cityName'];
						    		echo "</td>";
						  		echo "</tr>";
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

		