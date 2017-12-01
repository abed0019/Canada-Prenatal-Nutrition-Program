<?php include 'AccountSettings.php';
$isFormValid = false;

$removeUserID = "";

$e_removeUserID = "";


$removeUserID = $_POST['removeUserID'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if ((empty($removeUserID))){$frmInvalidMsg = "<br><em style='color:red;'>Please fill in all fields!</em><br><br>";} 
	
	$conn = mysqli_connect("gator3192.hostgator.com", "jtfrage_cpnp", "pass4db", "jtfrage_cpnp");
		$sql = "SELECT AuID FROM Authentication WHERE AuID='$removeUserID';";
		$result = $conn->query($sql);
		$row = mysqli_fetch_array($result);
	
	if (($row['AuID'] != $removeUserID)){
		$frmInvalidMsg = "<br><em style='color:red;'>User does not exist.</em><br><br>";
	}else{
		
		$isFormValid = true;
	}
}
	
if($isFormValid) {
		try{
			$mysqli = new mysqli("gator3192.hostgator.com", "jtfrage_cpnp", "pass4db", "jtfrage_cpnp");
		}
			catch(mysqli_sql_exception $e){
				echo "Your information was not sent";
		}	
		if (!$mysqli->connect_errno) {
			$sql = "DELETE FROM Authentication WHERE AuID='$removeUserID';";
					mysqli_query($mysqli,$sql);
		}
	echo "<br>Your information was sent successfully";

}

?>
<div id="Remove" class="form-group">
	<h3>Remove User</h3>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="form-data">
			<label for="ReUsername">Enter username's id
				<input type="text" class="form-control" name="removeUserID" id="removeUserID">
			</label>
		<button type="submit" class="btn btn-success">Remove</button>
	</form>
	<?php
	$conn = mysqli_connect("gator3192.hostgator.com", "jtfrage_cpnp", "pass4db", "jtfrage_cpnp");
	$result = mysqli_query($conn,"SELECT AuID, siteID, userName, first_name, last_name FROM jtfrage_cpnp.Authentication WHERE userName!='root'");

	echo "<table class='table table-striped table-bordered table-condensed'>
	<tr><th>AuID</th><th>Site ID</th><th>Username</th><th>First name</th><th>Last name</th></tr>";
	
	while($row = mysqli_fetch_array($result))
	{
	echo "<tr>";
	echo "<td>" . $row['AuID'] . "</td>";
	echo "<td>" . $row['siteID'] . "</td>";
	echo "<td>" . $row['userName'] . "</td>";
	echo "<td>" . $row['first_name'] . "</td>";
	echo "<td>" . $row['last_name'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
	
	?>
</div>
<?php include 'footer.php' ?>