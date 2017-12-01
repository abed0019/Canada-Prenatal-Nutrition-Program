<?php include 'AccountSettings.php';
$isFormValid = false;

$NsiteID = "";
$username = "";
$tempPass = "";
$userType = "";
$sitename = "";

$e_NsiteID = "";
$e_username = "";
$e_tempPass = "";
$e_userType = "";
$frmInvalidMsg = "";

$NsiteID = $_POST['NsiteID'];
$username = $_POST['username'];
$tempPass = $_POST['tempPass'];
$userType = $_POST['userType'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($NsiteID))  { $e_NsiteID = "<br><em>Please enter in this field.</em>"; } 
	if (empty($username)) { $e_username = "<br><em>Please enter in this field.</em>"; } 
	if (empty($tempPass)) { $e_tempPass = "<br><em>Please enter in this field.</em>"; } 
	if (empty($userType)) { $e_userType = "<br><em>Please enter in this field.</em>"; } 
	switch($NsiteID){
		case "1001":
		$sitename = "South-East Ottawa CHC";
		break;
		case "1002":
		$sitename = "Centretown CHC";
		break;
		case "1003":
		$sitename = "Somerset West CHC";
		break;
		case "1004":
		$sitename = "Salvation Army Bethany Hope Centre";
		break;
		case "1005":
		$sitename = "Pinecrest-Queensway CHC";
		break;
		case "1006":
		$sitename = "Carlington Community Health Centre";
		break;
		case "1007":
		$sitename = "Centre des services communautaires de Vanier";
		break;
		case "1008":
		$sitename = "St. Mary''s Home Young Parents Outreach Centre";
		break;
	}
	if ((empty($NsiteID)) || (empty($username)) || (empty($tempPass)) || (empty($userType))) {
		$frmInvalidMsg = "<br><em style='color:red;'>Please fill in all fields!</em><br><br>";
	} else {
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
			$sql = "INSERT INTO Authentication (AuID, userName, password, userType, siteID, sitename)
					VALUES (DEFAULT,'$username','$tempPass','$userType','$NsiteID','$sitename');";
					mysqli_query($mysqli,$sql);
		}
	echo "<br><em style='color:green;'>User has been created successfully!</em><br><br>";

}

?>
<div id="Create" class="form-group">
	<h3>Create User</h3>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="form-data">
		<div class="form-group">
			<label for="inputSiteID"><?php echo $e_siteID;?>
				<select class="form-control" name="NsiteID" id="siteID">
					<option value="" disabled selected>Select a siteID</option>
					<option value="1001">1001 - South-East Ottawa CHC</option>
					<option value="1002">1002 - Centretown CHC</option>
					<option value="1003">1003 - Somerset West CHC</option>
					<option value="1004">1004 - Salvation Army Bethany Hope Centre</option>
					<option value="1005">1005 - Pinecrest-Queensway CHC</option>
					<option value="1006">1006 - Carlington Community Health Centre</option>
					<option value="1007">1007 - Centre des services communautaires de Vanier</option>
					<option value="1008">1008 - St. Mary's Home Young Parents Outreach Centre</option>
				</select>
			</label>
		</div>
		<div class="form-group">
		<label for="Username">
			<input type="text" class="form-control" name="username" placeholder="Username">
		</label>
			<label for="Password">
				<input type="password" class="form-control" name="tempPass" placeholder="Temporary Password">
			</label>
		</div>
		<div class="form-group">
			<label for="UserType">
				<select class="form-control" name="userType" id="userType">
					<option value="" disabled selected>Select a User Type</option>
					<option value="1">1 - Admin</option>
					<option value="2">2 - Regualr User</option>
				</select>
			</label>
		</div>
		<button type="submit" class="btn btn-success">Create</button>
	</form>
</div>
<?php include 'footer.php' ?>