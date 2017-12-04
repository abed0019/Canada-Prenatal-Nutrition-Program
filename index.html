<?php
session_start();

$isFormValid = false;
$_SESSION['last_acted_on'] = time();


// Set form fields
$UserName = "";
$Password = "";
$noAdminMsg = "";

// Set error fields
$e_UserName = "";
$e_Password = "";

//Set all Form Fields
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$UserName = $_POST['UserName'];
	$Password = $_POST['Password'];
}

// Check for empty fields
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($UserName)) { $e_UserName = "<br><em style='color:red;'>Please enter a username.</em>"; } 
	if (empty($Password)) { $e_Password = "<br><em style='color:red;'>Please enter a password.</em>"; } 
	if ((empty($UserName)) || (empty($Password))){
		$frmInvalidMsg = "<br><em style='color:red;'>Please fill in all fields!</em><br><br>";
	} else {
		$isFormValid = true;
	}
}
// If the form is valid, insert data into database
if($isFormValid) {
	
	// Create connection
	$conn = mysqli_connect("gator3192.hostgator.com", "jtfrage_cpnp", "pass4db", "jtfrage_cpnp");
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = "SELECT siteID, userType, last_name, first_name, email, phone, password, userName, PhoneExt FROM jtfrage_cpnp.Authentication WHERE userName = '$UserName' and password = '$Password'";
	$result = $conn->query($sql);
	
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$_SESSION['siteID'] = $row['siteID'];
		$_SESSION['userType'] = $row['userType'];
		$_SESSION['last_name'] = $row['last_name'];
		$_SESSION['first_name'] = $row['first_name'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['phone'] = $row['phone'];
		$_SESSION['userName'] = $row['userName'];
		$_SESSION['PhoneExt'] = $row['PhoneExt'];
		
		$_SESSION['last_acted_on'] = time();
		
		header('Location: index.php');
		die();
	} else {
		$noAdminMsg = "<div style='color:red;'>The username/password you have entered is invalid.</div>";
	}
}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge; IE=11; IE=10; IE=9; IE=8; IE=7 ">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>St. Mary's Home</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/style.css">
		<!--Script-->
		<script src="js/jquery-3.2.0.min.js"></script>
		<script src="js/html5shiv.js"></script>		
	</head>
	<body>
	<div class="container Absolute-Center is-Responsive">
		<div class="row inputLimit">
			<img class="img-responsive img-center" src="img/buns.png">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="form-data">
				<div><?php echo $e_UserName; ?></div>
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" id="UserName" class="form-control" placeholder="Username" name="UserName" value='<?php echo $UserName; ?>'>         
				</div>
				<div><?php echo $e_Password; ?></div>
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" class="form-control" placeholder="Password" id="Password" name="Password">    
				</div>
				<div class="form-group text-center">
					<a href="#" onclick="myFunction()">Forgot Password</a>
				</div>
				<button type="submit" class="btn btn-primary btn-lg btn-block">Log in</button>						
			</form>  
		</div>				   
	</div>
	</body>
	<script>
function myFunction() {
    alert("Please contact your system administrator!");
}
</script>
</html>
