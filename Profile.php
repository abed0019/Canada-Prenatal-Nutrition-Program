<?php include 'AccountSettings.php';
$isFormValid = false;

$Nfirstname = "";
$Nlastname = "";
$Nemail = "";
$Nphone = "";
$NphoneExt = "";

$e_Nfirstname = "";
$e_Nlastname = "";
$e_Nemail = "";
$e_Nphone = "";
$e_NphoneExt = "";
$frmInvalidMsg = "";

$CuserName = $_SESSION['userName'];
$Cfirst_name = $_SESSION['first_name'];
$Clast_name = $_SESSION['last_name'];
$Cemail = $_SESSION['email'];
$Cphone = $_SESSION['phone'];
$CphoneExt = $_SESSION['PhoneExt'];


$Nfirstname = $_POST['Nfirstname'];
$Nlastname = $_POST['Nlastname'];
$Nemail = $_POST['Nemail'];
$Nphone = $_POST['Nphone'];
$NphoneExt = $_POST['NphoneExt'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if ((empty($Nfirstname)) || (empty($Nlastname)) || (empty($Nemail)) || (empty($Nphone)) || (empty($NphoneExt))){
		$$frmInvalidMsg = "<br><em style='color:red;'>Please fill in all fields!</em><br><br>";
		} else{
	
		$conn = mysqli_connect("gator3192.hostgator.com", "jtfrage_cpnp", "pass4db", "jtfrage_cpnp");
		$sql = "SELECT userName FROM Authentication WHERE userName='$CuserName';";
		$result = $conn->query($sql);
		$row = mysqli_fetch_array($result);
	
		if ($row['userName'] != $CuserName){
		$frmInvalidMsg = "<br><em style='color:red;'>User does not exist.</em><br><br>";
		}else{
		$isFormValid = true;
		}
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
			$sql = "UPDATE Authentication SET first_name = '$Nfirstname', last_name = '$Nlastname', email = '$Nemail', phone = '$Nphone', PhoneExt = '$NphoneExt'
					Where userName='$CuserName';";
					mysqli_query($mysqli,$sql);
		}
	echo "<br><em style='color:green;'>Your profile information has been updated successfully.<br>Please re-login to see the changes.</em><br><br>";
}
?>
<div id="Profile" class="form-group">
	<h3>Profile</h3>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="form-data">
		<div class="form-group">
			<label for="Lname">Last Name
				<input type='text' class='form-control' name="Nfirstname" placeholder="<?php echo $Cfirst_name; ?>">
			</label>
			<label for="Fname">First Name
				<input type='text' class='form-control' name="Nlastname" placeholder="<?php echo $Clast_name; ?>">
			</label>
		</div>
		<div class="form-group">
			<label for="email">Email
				<input type='text' class='form-control' name="Nemail" placeholder="<?php echo $Cemail; ?>">
			</label>
			<label for="phone">Phone
				<input type='tel' class='form-control' name="Nphone" placeholder="<?php echo $Cphone; ?>">
			</label>
			<label for="phoneExt">Extension
				<input type='tel' class='form-control' name="NphoneExt" placeholder="<?php echo $CphoneExt; ?>">
			</label>
		</div>
		<button type="submit" class="btn btn-success">Update</button>
	</form>
</div>
<?php include 'footer.php' ?>