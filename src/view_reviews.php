<?php
  require_once 'navigation_info.php';
  $username = $_SESSION['username'];



  //Venue info
  $sql = "SELECT R.review_rating as RevRat, R.review_desc, C.checkin_date, C.username, C.venueID as venID
          FROM review AS R, checkin AS C
          WHERE R.checkinID = C.checkinID AND venID = 1" ;
  $myQuery = mysqli_query($db, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Suggestions</title>
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
				<th>Review Rating</th>
				<th>Review Text</th>
				<th>Review Date</th>
				<th>Review Time</th>
        <th>Username </th>
			</tr>
		</thead>
		<tbody>
		<?php $no 	= 1;
		while ($row = mysqli_fetch_array($myQuery))
		{
      echo "<tr>";
      echo "<td>".$row['RevRat']."</td>";
      echo "<td>".$row['R.review_desc']."</td>";
      echo "<td>".date('F d, Y', strtotime($row['C.checkin_date']))."</td>";
      echo "<td>".date('g:i A', strtotime($row['C.checkin_date']))."</td>";
      echo "<td>".$row['C.username']."</td>";
      echo "<tr>";
      $no++;
		}

    ?>
		</tbody>
	</table>
</div>
  </div>
</body>
</html>
