<?php include 'index.php' ;
?>
<div class="btn-group">
  <a href="Profile.php" class="btn btn-default">Profile</a>
  <a href="Password.php" class="btn btn-default">Password</a>
  <!--<a href="clientInfo.php" class="btn btn-default">Client information</a>-->
  <?php if($_SESSION['userType'] != '2'){
	echo("<a href='Create.php' class='btn btn-default'>Create User</a>");
	echo("<a href='Update.php' class='btn btn-default'>Update User</a>");
	echo("<a href='Remove.php' class='btn btn-default'>Remove User</a>");
  }
  ?>
</div>
