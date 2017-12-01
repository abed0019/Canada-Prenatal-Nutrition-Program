<?php include 'AccountSettings.php';
$isFormValid = false;

$Oldpass = "";
$Newpass = "";
$ReNewpass = "";

$e_Oldpass = "";
$e_Newpass = "";
$e_ReNewpass = "";
$frmInvalidMsg = "";

$Oldpass = $_POST['Oldpass'];
$Newpass = $_POST['Newpass'];
$ReNewpass = $_POST['ReNewpass'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($Oldpass)) { $e_siteID = "<br><em>Please enter in this field.</em>"; } 
	if (empty($Newpass)) { $e_username = "<br><em>Please enter in this field.</em>"; } 
	if (empty($ReNewpass)) { $e_tempPass = "<br><em>Please enter in this field.</em>"; } 
	if ($Newpass != $ReNewpass) {
		$frmInvalidMsg = "<br><em style='color:red;'>Password did not match!</em><br><br>"; } 
	if ((empty($Oldpass)) || (empty($Newpass)) || (empty($ReNewpass))){
		$frmInvalidMsg = "<br><em style='color:red;'>Please fill in all fields!</em><br><br>";
		} 
	
	$conn = mysqli_connect("gator3192.hostgator.com", "jtfrage_cpnp", "pass4db", "jtfrage_cpnp");
		$sql = "SELECT password FROM Authentication WHERE password='$Oldpass';";
		$result = $conn->query($sql);
		$row = mysqli_fetch_array($result);
	if (($row['password'] != $Oldpass)){
		$frmInvalidMsg = "<br><em style='color:red;'>Password did not match!</em><br><br>";
	}
	else{
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
			$sql = "UPDATE Authentication SET password = '$Newpass' Where password = '$Oldpass';";
					mysqli_query($mysqli,$sql);
		}
	echo "<br><em style='color:green;'>Your password was updated successfully.</em><br><br>";

}
?>
<div id="Password" class="form-group">
	<h3>Password</h3>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="form-data">
		<div class="form-group">
			<label for="password">Old Password *
			<input type="password" class="form-control" name="Oldpass" placeholder="Old Password">
			</label>
		</div>
		<div class="form-group">
			<label for="password">New Password *
				<input type="password" class="form-control" name="Newpass" placeholder="New Password">
			</label>
			<label for="password">Retype New Password *
				<input type="password" class="form-control" name="ReNewpass" placeholder="Retype New Password">
			</label>
		</div>
		<button type="submit" class="btn btn-success">Update</button>
	</form>
</div>
<?php include 'footer.php' ?>