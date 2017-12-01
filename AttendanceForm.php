<?php include 'index.php' ;
$isFormValid = false;

$fname = "";
$lname = "";
$attDate = "";

$e_fname = "";
$e_lname = "";
$e_attDate = "";
$frmInvalidMsg = "";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$attDate = $_POST['attDate'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($fname)) { $e_fname = "<br><em>Please enter in this field.</em>"; } 
	if (empty($lname)) { $e_lname = "<br><em>Please enter in this field.</em>"; } 
	if (empty($attDate)) { $e_attDate = "<br><em>Please enter in this field.</em>"; } 
	
	if ((empty($siteID)) || (empty($username)) || (empty($tempPass))){
		$frmInvalidMsg = "<br><em style='color:red;'>Please fill in all fields!</em><br><br>";
		} else{
		$conn = mysqli_connect("gator3192.hostgator.com", "jtfrage_cpnp", "pass4db", "jtfrage_cpnp");
		$sql = "SELECT first_name, last_name, clientID FROM Personal_information WHERE first_name='$fname' and last_name='$lname';";
		$result = $conn->query($sql);
		$row = mysqli_fetch_array($result);
		
		if (($row['first_name'] != $fname) || ($row['last_name'] != $lname)){
		$frmInvalidMsg = "<br><em style='color:red;'>Mother does not exist.</em><br><br>";
		}else{
		$clientID = $row['clientID'];
		}
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
			$sql = "INSERT INTO attendance (attendanceID, clientID, last_name, first_name, attendDate)
					VALUES (DEFAULT, '$clientID', '$lname', '$fname', '$attDate');";
					mysqli_query($mysqli,$sql);
		}
	echo "<br>Your information was sent successfully";
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="form-data">
	<div class="row form-group"><?php echo $frmInvalidMsg; ?>
	<h3><strong>Attendance</strong></h3>
		<label for="inputLname">Last Name
			<input type="text" class="form-control" name="fname" placeholder="Last Name">
		</label>
		<br>
		<label for="inputFname">First Name
			<input type="text" class="form-control" name="lname" placeholder="First Name">
		</label>
		<br>
		<label for="inputAttDate">Date
			<input type="date" class="form-control" name="attDate" placeholder="Date Attended">
		</label>
	</div>
	<button type="submit" class="btn btn-success">Submit</button>
</form>
<?php include 'footer.php' ?>