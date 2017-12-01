<?php include 'index.php';
$sdate = $_POST['reportSdate'];
$edate = $_POST['reportEdate'];
$siteID = $_SESSION['siteID'];
$conn = mysqli_connect("gator3192.hostgator.com", "jtfrage_cpnp", "pass4db", "jtfrage_cpnp");
?>
<h3><strong>General Reports</strong></h3>
<hr>
<label for="inputLname">1. Number of registrants.</label>
<?php 
if($_SESSION['userType'] != 2){
	$sql = "SELECT Count(clientID) 
			FROM Personal_information
			WHERE registration_date between '$sdate' AND '$edate';";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	echo "<input type='text' class='form-control' value='" . $row['Count(clientID)'] . "' disabled>";
} else { 
	$sql = "SELECT Count(clientID) 
			FROM Personal_information, Authentication
			WHERE Personal_information.AuID = Authentication.AuID
			AND Authentication.siteID = '$siteID'
			AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);
	echo "<input type='text' class='form-control' value='" . $row['Count(clientID)'] . "' disabled>";
}
?>
<hr>
<label for="inputLname">2. Number of registrants that are prenatals.</label>
<?php 
if($_SESSION['userType'] != 2){
	$sql = "SELECT Count(prenatelly_registered) 
			FROM Personal_information, other_information
			WHERE Personal_information.other_infoID = other_information.other_infoID
			AND prenatelly_registered='Yes'
			AND Personal_information.registration_date between '$sdate' AND '$edate';";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	echo "<input type='text' class='form-control' value='" . $row['Count(prenatelly_registered)'] . "' disabled>";
} else { 
	$sql = "SELECT Count(prenatelly_registered) 
			FROM other_information, Personal_information, Authentication
			WHERE other_information.other_infoID = Personal_information.other_infoID
			AND Personal_information.AuID = Authentication.AuID
			AND Authentication.siteID = '$siteID'
			AND prenatelly_registered='Yes'
			AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);
	echo "<input type='text' class='form-control' value='" . $row['Count(prenatelly_registered)'] . "' disabled>";
}
?>
<hr>
<label for="inputLname">3. Number of registrants that are postnatals.</label>
<?php 
if($_SESSION['userType'] != 2){
	$sql = "SELECT Count(prenatelly_registered) 
			FROM Personal_information, other_information
			WHERE Personal_information.other_infoID = other_information.other_infoID
			AND prenatelly_registered='No'
			AND Personal_information.registration_date between '$sdate' AND '$edate';";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	echo "<input type='text' class='form-control' value='" . $row['Count(prenatelly_registered)'] . "' disabled>";
} else { 
	$sql = "SELECT Count(prenatelly_registered) 
			FROM other_information, Personal_information, Authentication
			WHERE other_information.other_infoID = Personal_information.other_infoID
			AND Personal_information.AuID = Authentication.AuID
			AND Authentication.siteID = '$siteID'
			AND prenatelly_registered='No'
			AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);
	echo "<input type='text' class='form-control' value='" . $row['Count(prenatelly_registered)'] . "' disabled>";
}
?>
<hr>
<label for="inputLname">4. Average age of registrants.</label>
<?php 
if($_SESSION['userType'] != 2){
	$sql = "SELECT round(AVG(age))  
			FROM Personal_information, other_information
			WHERE Personal_information.other_infoID = other_information.other_infoID
			AND Personal_information.registration_date between '$sdate' AND '$edate';";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	echo "<input type='text' class='form-control' value='" . $row['round(AVG(age))'] . "' disabled>";
} else { 
	$sql = "SELECT round(AVG(age)) 
			FROM other_information, Personal_information, Authentication
			WHERE other_information.other_infoID = Personal_information.other_infoID
			AND Personal_information.AuID = Authentication.AuID
			AND Authentication.siteID = '$siteID'
			AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);
	echo "<input type='text' class='form-control' value='" . $row['round(AVG(age))'] . "' disabled>";
}
?>
<hr>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-condensed">
		<thead>
			<caption>
				<label for="pregnancyOutcomes">Pregnancy Outcomes</label>
			</caption>
		</thead>
		<tbody>
			<tr>
				<th><strong>Births Weight</strong></th>
				<th><strong></strong></th>
				<th colspan="6"><strong>Infant's Health at Birth</strong></th>
				<th><strong></strong></th>
			</tr>
			<tr>
				<td><strong>(Grams)</strong></td>
				<td><strong>No.</strong></td>
				<td><strong><abbr title="Healthy">HE</abbr></strong></td>
				<td><strong><abbr title="Complications">CO</abbr></strong></td>
				<td><strong><abbr title="Unknown">UK</abbr></strong></td>
				<td><strong><abbr title="Miscarriage">MC</abbr></strong></td>
				<td><strong><abbr title="Stillborn">SB</abbr></strong></td>
				<td><strong><abbr title="Perinatal death">PD</abbr></strong></td>
				<td><strong><abbr title="Breastfeed">BFI</abbr></strong></td>
			</tr>
			<tr>
				<td>Under 1500</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight < '1500'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight < '1500'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight < '1500'
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>				
				</td>
			</tr>
			<tr>
				<td>1500 - 2499</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '1500'
								AND babyInformation.baby_weight < '2499'
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>				
				</td>
			</tr>
			<tr>
				<td>2500 - 3999</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '2500'
								AND babyInformation.baby_weight < '3999'
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>				
				</td>
			</tr>
			<tr>
				<td>4000 - 4999</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4000'
								AND babyInformation.baby_weight < '4999'
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>				
				</td>
			</tr>
			<tr>
				<td>Over 4500</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4500'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4500'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight > '4500'
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>				
				</td>
			</tr>
			<tr>
				<td>Unknown</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight = ''
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight = ''
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight = ''
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight = ''
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight = ''
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight = ''
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight = ''
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight = ''
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight = ''
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight = ''
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight = ''
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight = ''
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight = ''
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight = ''
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>
				</td>
				<td>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.baby_weight = ''
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND babyInformation.baby_weight = ''
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
					?>				
				</td>
			</tr>
			<tr>
				<td><strong>Total</strong></td>
				<td><strong>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
				?>
				</strong></td>
				<td><strong>
				<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.health_at_birth = 'Healthy'
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
				?>
				</strong></td>
				<td><strong>
								<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.health_at_birth = 'Complications'
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
				?>
				</strong></td>
				<td><strong>
								<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.health_at_birth = 'Unknown'
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
				?>
				</strong></td>
				<td><strong>
								<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.health_at_birth = 'Miscarriage'
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
				?>
				</strong></td>
				<td><strong>
								<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.health_at_birth = 'Stillborn'
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
				?>
				</strong></td>
				<td><strong>
								<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.health_at_birth = 'Perinatal death'
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
				?>
				</strong></td>
				<td><strong>
								<?php 
					if($_SESSION['userType'] != 2){
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.registration_date between '$sdate' AND '$edate';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_assoc($result);
						echo $row['COUNT(babyID)'];
					} else { 
						$sql = "SELECT COUNT(babyID) 
								FROM babyInformation, Personal_information, Authentication
								WHERE babyInformation.clientID = Personal_information.clientID
								AND babyInformation.duration_of_breastfeeding = 'Continues'
								AND Personal_information.AuID = Authentication.AuID
								AND Authentication.siteID = '$siteID'
								AND Personal_information.registration_date between '$sdate ' AND '$edate ';";
						$result = $conn->query($sql);
						$row = mysqli_fetch_array($result);
						echo $row['COUNT(babyID)'];
					}
				?>
				</strong></td>
			</tr>
		</tbody>
	</table>
</div>