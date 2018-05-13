<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#" style="color: white;"><b>Social Network</b></a>
  
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item" >
        <a style="color: white;" class="nav-link active" href="#">Explore &nbsp;</a>
      </li>
      <li class="nav-item">
        <a style="color: white;" class="nav-link" href="redirect.php">Home &nbsp;</a>
      </li>
      <li class="nav-item">
        <a style="color: white;" class="nav-link" href="#">Messages &nbsp;</a>
      </li>
    </ul>
    
    <form class="form-inline my-2 my-lg-0">
      <div class="nav-item">
        <?php
          echo "<a style=\"color: white;\" class=\"nav-link\" href=\"profile.php?profileName=$username\">";

          $images = glob("$userPic");

          if (count($images) > 0) { // make sure at least one image exists
            $img = $images[0]; // first image
            echo '<img src="'.$img.'" height = "30" width = "30">'."&nbsp;&nbsp;";
          } 
          else{
            $img = glob("$nophoto")[0]; // first image
            echo '<img src="'.$img.'" height = "30" width = "30">'."&nbsp;&nbsp;";
          }
        ?>
          
          <?php echo htmlspecialchars($userFullName); ?>&nbsp;
        </a>
      </div>
      <?php
        if($accountType == 1)
        {
          echo '<div class="nav-item">';
          echo '<a style="color: white;" class="nav-link" href="#">My Venues &nbsp;</a>';
          echo '</div>';
        }
      ?>

      <div class="nav-item dropdown">
        <a style="color: white;" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"></a>
        <div class="dropdown-menu dropdown-menu-right" >
          <a class="dropdown-item" href="edit_user.php">Edit profile</a>
          <a class="dropdown-item" href="change_password.php">Change password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Log out</a>
        </div>
      </div>

    </form>
  </div>
</nav>
