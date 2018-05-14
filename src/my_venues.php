<?php
  require_once 'navigation_info.php';

  $username = $_SESSION['username'];

  //Venue info
  $sql = "SELECT venueID, venueName, venueDesc, venueTel, cityID, venuePic, venueOpenTime, venueCloseTime, venueCreated
          FROM venue
          WHERE managerName = '$username'";
  $venueResult = mysqli_query($db, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Venues</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
        include_once "navigation.php";
  ?>
    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>
  <div>
	<table class="data-table">
		<thead>
			<tr>
        <th></th>
				<th>Venue Name</th>
				<th>Venue Telephone</th>
				<th>City</th>
				<th>Open Time</th>
        <th>Close Time </th>
        <th>Venue Created </th>
        <th>View Venue </th>
        <th>Delete Venue </th>
			</tr>
		</thead>
		<tbody>
		<?php $no 	= 1;
		while ($row = mysqli_fetch_array($venueResult))
		{
      echo "<tr>";
      echo "<td> <img src=\"".$row['venuePic']."\" height = 100></td>";
      echo "<td>".$row['venueName']."</td>";
      echo "<td>".$row['venueTel']."</td>";
      $idOFCity = $row['cityID'];
      $sql1 = "SELECT cityName
              FROM city
              WHERE cityID = '$idOFCity'";
      $query = mysqli_query($db, $sql1);
      $row1 = mysqli_fetch_array($query);
      echo "<td>".$row1['cityName']."</td>";
      echo "<td>".$row['venueOpenTime']."</td>";
      echo "<td>".$row['venueCloseTime']."</td>";
      echo "<td>".date('F d, Y', strtotime($row['venueCreated']))."</td>";
      echo "<td><a href=venue.php?venueID=".$row['venueID'].">View Venue</a></td>";
      echo "<td><a href=close_venue.php?venueID=".$row['venueID'].">Close</a></td>";
      echo "<tr>";
      $no++;
		}

    ?>
		</tbody>
	</table>
</div>
  </div>
  <div class = "logFoot" >
  <p><a href="add_venue.php" class="btn btn-success">Add New Venue </a></p>
  </div>
</body>
</html>
