<?php
  require_once 'navigation_info.php';

  $username = $_SESSION['username'];
  $userTemporary = "";

  //Venue info
  $sql = "SELECT *
          FROM follows
          WHERE followed = '$username'";
  $myQuery = mysqli_query($db, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Favorite Venues</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Import MaterialUI Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
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
				<th>Follower Name</th>
				<th>Follower Username</th>
				<th>Send Message</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php $no 	= 1;
		while ($row = mysqli_fetch_array($myQuery))
		{
      echo "<tr>";
      $followerTempUsername = $row['follower'];
      $userTemporary = $followerTempUsername;
      $sql1 = "SELECT user_firstName, username, user_pic
              FROM user_table
              WHERE username = '$followerTempUsername'";
      $query = mysqli_query($db, $sql1);
      $row1= mysqli_fetch_array($query);
      echo "<td> <img src=\"".$row1['user_pic']."\" height = 100></td>";
      echo "<td>".$row1['user_firstName']."</td>";
      echo "<td>".$row1['username']."</td>";
      echo "<td><a href=redirect_message.php?receiverName=".$row1['username'].">Send Message</a></td>";
      // Owns profile
      if($followerTempUsername == $username){
          $owns = true;
          $follows = true;
      }
      else{
          $sql = "SELECT COUNT(*) as followCount
                  FROM follows
                  WHERE follower = '$username' and followed = '$followerTempUsername'";
          $query = mysqli_query($db, $sql);
          $row = mysqli_fetch_array($query);
          $follows = ($row['followCount'] > 0) ? true : false;
          $owns = false;
      }
        if(!$follows){
          echo '
            <td><button class="btn btn-success" type="button" onclick="followed()" style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;font-size:16px;">
              <i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">add_circle</i>
              &nbsp; Follow
            </button></td>';
        }
        else{
          echo '
            <td><button class="btn btn-danger" type="button" onclick="unfollowed()" style="padding-top:6px;margin-top:2px;margin-right:3px;margin-bottom:2px;margin-left:3px;font-size:16px;">
              <i class="material-icons d-inline" style="width:16px;height:16px;font-size:16px;">remove_circle</i>
              &nbsp; Unfollow
            </button></td>';
        }


      echo "<tr>";
      $no++;
		}

    ?>
		</tbody>
	</table>
</div>
  </div>
  <script type="text/javascript">
    function followed() {
      follow(true);
    }

    function unfollowed() {
      follow(false);
    }

    function follow(status) {
      var pname = <?php echo json_encode($userTemporary, JSON_HEX_TAG); ?>;
      $.ajax({
        type: "POST",
        url: "followers.php",
        data: { followed: status },
        success: function (data){
          console.log(data);
          window.location.reload();
        },
        error: function (){
          console.log("Something went wrong!");
        }
      });
    }
    </script>
</body>
</html>
