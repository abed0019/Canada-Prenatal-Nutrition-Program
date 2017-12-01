<?php include 'index.php';

$isFormValid = false;

// Set form fields
$registrationDate = "";
$firstName = "";
$lastName = "";
$clientBirthDate = "";
$address = "";
$city = "";
$province = "";
$postalCode = "";
$phoneNumber = "";
$altphoneNumber = "";
$emailAddress = "";
$emergencyFirstName = "";
$emergencyLastName = "";
$emergencyPhone = "";
$languageE = "";
$languageF = "";
$languageO = "";
$referredBy = "";
$pointOfEntry = "";
$transportationW = "";
$transportationC = "";
$transportationB = "";
$transportationNT = "";
$numOfChildrenChildCare = "";
$attendOtherPrograms = "";
$casInvolvement = "";
$casWorkerInformation = "";
$registeringPrenatally = "";
$reasonForAttendingLAP = "";
$reasonForAttendingLACB = "";
$reasonForAttendingLAH = "";
$reasonForAttendingLAB = "";
$reasonForAttendingMOM = "";
$reasonForAttendingREF = "";
$reasonForAttendingTALK = "";
$reasonForAttendingVOUCH = "";
$bornOutsideCanada = "";
$bornOutsideCanadaL = "";
$bornOutsideCanadaY = "";
$incomeFamily = "";
$numberPeopleSupportedByIncome = "";
$foodShortage1 = "";
$foodBank = "";
$gestatDiabetes = "";
$highschoolDiploma = "";
$pastSmoke = "";
$aroundSmoke = "";
$numDrinkWhilePregnant = "";
$currentDrink = "";
$numDrugsWhilePregnant = "";
$streetDrugs = "";
$partnerAbuse = "";
$threatenedRelationship = "";
$foodAllergies = "";
$casWorkerInformation = "";
$clientAge = "";


//Set all Form Fields
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$registrationDate = $_POST['registrationDate'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$clientBirthDate = $_POST['clientBirthDate'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$province = $_POST['province'];
	$postalCode = $_POST['postalCode'];
	$phoneNumber = $_POST['phoneNumber'];
	$altphoneNumber = $_POST['altphoneNumber'];
	$emailAddress = $_POST['emailAddress'];
	$emergencyFirstName = $_POST['emergencyFirstName'];
	$emergencyLastName = $_POST['emergencyLastName'];
	$emergencyPhone = $_POST['emergencyPhone'];
	if(isset($_POST['languageSpokenEnglish'])){$languageE = '1';}else{$languageE = '0';}
	if(isset($_POST['languageSpokenFrench'])){$languageF = '1';}else{$languageF = '0';}
	if(!empty($_POST['languageSpokenOther'])){$languageO = $_POST['languageSpokenOther'];}else{$languageO = '';}
	if(!empty($_POST['casWorkerInformation'])){$casWorkerInformation = $_POST['casWorkerInformation'];}else{$casWorkerInformation = '';}
	$referredBy = $_POST['referredBy'];
	$pointOfEntry = $_POST['pointOfEntry'];
	if(isset($_POST['transportationWalk'])){$transportationW = '1';}else{$transportationW = '0';}
	if(isset($_POST['transportationCar'])){$transportationC = '1';}else{$transportationC = '0';}
	if(isset($_POST['transportationBus'])){$transportationB = '1';}else{$transportationB = '0';}
	if(isset($_POST['transportationNeedTickets'])){$transportationNT = '1';}else{$transportationNT = '0';}	
	$numOfChildrenChildCare = $_POST['numOfChildrenChildCare'];
	$attendOtherPrograms = $_POST['attendOtherPrograms'];
	$casInvolvement = $_POST['casInvolvement'];
	$casWorkerInformation = $_POST['casWorkerInformation'];
	$foodAllergies = $_POST['food_Allergies'];
	$registeringPrenatally = $_POST['registeringPrenatally'];
	if(isset($_POST['learnAboutPregnancy'])){$reasonForAttendingLAP = '1';}else{$reasonForAttendingLAP = '0';}
	if(isset($_POST['learnAboutCaringForBaby'])){$reasonForAttendingLACB = '1';}else{$reasonForAttendingLACB = '0';}
	if(isset($_POST['learnAboutHealthEating'])){$reasonForAttendingLAH = '1';}else{$reasonForAttendingLAH = '0';}
	if(isset($_POST['learnAboutBreastfeeding'])){$reasonForAttendingLAB = '1';}else{$reasonForAttendingLAB = '0';}
	if(isset($_POST['toMeetOtherMoms'])){$reasonForAttendingMOM = '1';}else{$reasonForAttendingMOM = '0';}
	if(isset($_POST['wasRefferedHere'])){$reasonForAttendingREF = '1';}else{$reasonForAttendingREF = '0';}
	if(isset($_POST['speakToProfessional'])){$reasonForAttendingTALK = '1';}else{$reasonForAttendingTALK = '0';}
	if(isset($_POST['getFoodVouchers'])){$reasonForAttendingVOUCH = '1';}else{$reasonForAttendingVOUCH = '0';}
	$bornOutsideCanada = $_POST['bornOutsideCanada'];
	$bornOutsideCanadaL = $_POST['bornOutsideCanadaLocation'];
	$bornOutsideCanadaY = $_POST['bornOutsideCanadaYear'];
	$incomeFamily = $_POST['incomeFamily'];
	$numberPeopleSupportedByIncome = $_POST['numberPeopleSupportedByIncome'];
	$foodShortage1 = $_POST['foodShortage1'];
	$foodBank = $_POST['foodBank'];
	$gestatDiabetes = $_POST['gestatDiabetes'];
	$highschoolDiploma = $_POST['highschoolDiploma'];
	$pastSmoke = $_POST['pastSmoke'];
	$aroundSmoke = $_POST['aroundSmoke'];
	$numDrinkWhilePregnant = $_POST['numDrinkWhilePregnant'];
	$currentDrink = $_POST['currentDrink'];
	$numDrugsWhilePregnant = $_POST['numDrugsWhilePregnant'];
	$streetDrugs = $_POST['streetDrugs'];
	$partnerAbuse = $_POST['partnerAbuse'];
	$threatenedRelationship = $_POST['threatenedRelationship'];
	$clientAge = ($_POST['registrationDate'] - $_POST['clientBirthDate']); 
}


// Set error fields
$e_registrationDate = "";
$e_firstName = "";
$e_lastName = "";
$e_clientBirthDate = "";
$e_address = "";
$e_city = "";
$e_province = "";
$e_postalCode = "";
$e_phoneNumber = "";
$e_altphoneNumber = "";
$e_emailAddress = "";
$e_emergencyFirstName = "";
$e_emergencyLastName = "";
$e_emergencyPhone = "";
$e_languageE = "";
$e_languageF = "";
$e_languageO = "";
$e_referredBy = "";
$e_pointOfEntry = "";
$e_transportationW = "";
$e_transportationC = "";
$e_transportationB = "";
$e_transportationNT = "";
$e_numOfChildrenChildCare = "";
$e_attendOtherPrograms = "";
$e_casInvolvement = "";
$e_casWorkerInformation = "";
$e_registeringPrenatally = "";
$e_reasonForAttendingLAP = "";
$e_reasonForAttendingLACB = "";
$e_reasonForAttendingLAH = "";
$e_reasonForAttendingLAB = "";
$e_reasonForAttendingMOM = "";
$e_reasonForAttendingREF = "";
$e_reasonForAttendingTALK = "";
$e_reasonForAttendingVOUCH = "";
$e_bornOutsideCanada = "";
$e_bornOutsideCanadaL = "";
$e_bornOutsideCanadaY = "";
$e_incomeFamily = "";
$e_numberPeopleSupportedByIncome = "";
$e_foodShortage1 = "";
$e_foodBank = "";
$e_gestatDiabetes = "";
$e_highschoolDiploma = "";
$e_pastSmoke = "";
$e_aroundSmoke = "";
$e_numDrinkWhilePregnant = "";
$e_currentDrink = "";
$e_numDrugsWhilePregnant = "";
$e_streetDrugs = "";
$e_partnerAbuse = "";
$e_threatenedRelationship = "";
$e_foodAllergies = "";

// Check for empty fields
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($registrationDate)) { $e_registrationDate = "<br><em>Please enter in this field.</em>"; } 
	if (empty($firstName)) { $e_firstName = "<br><em>Please enter in this field.</em>"; } 
	if (empty($lastName)) { $e_lastName = "<br><em>Please enter in this field.</em>"; } 
	if (empty($clientBirthDate)) { $e_clientBirthDate = "<br><em>Please enter in this field.</em>"; } 
	if (empty($address)) { $e_address = "<br><em>Please enter in this field.</em>"; } 
	if (empty($city))   { $e_city = "<br><em>Please enter in this field.</em>"; } 
	if (empty($province))   { $e_province = "<br><em>Please enter in this field.</em>"; } 
	if (empty($postalCode))   { $e_postalCode = "<br><em>Please enter in this field.</em>"; } 
	if (empty($phoneNumber))   { $e_phoneNumber = "<br><em>Please enter in this field.</em>"; } 
	if (empty($altphoneNumber))   { $e_altphoneNumber = "<br><em>Please enter in this field.</em>"; } 
	if (empty($emailAddress))   { $e_emailAddress = "<br><em>Please enter in this field.</em>"; } 
	if (empty($emergencyFirstName))   { $e_emergencyFirstName = "<br><em>Please enter in this field.</em>"; } 
	if (empty($emergencyLastName))	{$e_emergencyLastName ="<br><em>Please enter in this field.</em>";}
	if (empty($emergencyPhone))	{$e_emergencyPhone ="<br><em>Please enter in this field.</em>";}
	if (empty($referredBy))	{$e_referredBy ="<br><em>Please enter in this field.</em>";}
	if (empty($pointOfEntry))	{$e_pointOfEntry ="<br><em>Please enter in this field.</em>";}
	if (empty($numOfChildrenChildCare))	{$e_numOfChildrenChildCare ="<br><em>Please enter in this field.</em>";}
	if (empty($attendOtherPrograms))	{$e_attendOtherPrograms ="<br><em>Please enter in this field.</em>";}
	if (empty($casInvolvement))	{$e_casInvolvement ="<br><em>Please enter in this field.</em>";}
	if (empty($bornOutsideCanada))	{$e_bornOutsideCanada ="<br><em>Please enter in this field.</em>";}
	if (empty($incomeFamily))	{$e_incomeFamily ="<br><em>Please enter in this field.</em>";}
	if (empty($numberPeopleSupportedByIncome))	{$e_numberPeopleSupportedByIncome ="<br><em>Please enter in this field.</em>";}
	if (empty($foodShortage1))	{$e_foodShortage1 ="<br><em>Please enter in this field.</em>";}
	if (empty($foodBank))	{$e_foodBank ="<br><em>Please enter in this field.</em>";}
	if (empty($gestatDiabetes))	{$e_gestatDiabetes ="<br><em>Please enter in this field.</em>";}
	if (empty($highschoolDiploma))	{$e_highschoolDiploma ="<br><em>Please enter in this field.</em>";}
	if (empty($pastSmoke))	{$e_pastSmoke ="<br><em>Please enter in this field.</em>";}
	if (empty($aroundSmoke))	{$e_aroundSmoke ="<br><em>Please enter in this field.</em>";}
	if (empty($numDrinkWhilePregnant))	{$e_numDrinkWhilePregnant ="<br><em>Please enter in this field.</em>";}
	if (empty($currentDrink))	{$e_currentDrink ="<br><em>Please enter in this field.</em>";}
	if (empty($numDrugsWhilePregnant))	{$e_numDrugsWhilePregnant ="<br><em>Please enter in this field.</em>";}
	if (empty($streetDrugs))	{$e_streetDrugs ="<br><em>Please enter in this field.</em>";}
	if (empty($partnerAbuse))	{$e_partnerAbuse ="<br><em>Please enter in this field.</em>";}
	if (empty($threatenedRelationship))	{$e_threatenedRelationship ="<br><em>Please enter in this field.</em>";}
	if (empty($foodAllergies))	{$e_foodAllergies ="<br><em>Please enter in this field.</em>";}
	if ((empty($registrationDate)) || (empty($firstName)) || (empty($lastName)) || (empty($clientBirthDate)) || (empty($address)) || (empty($city)) || (empty($province)) || (empty($postalCode)) || (empty($phoneNumber)) || (empty($altphoneNumber))|| (empty($emailAddress))|| (empty($emergencyFirstName))|| (empty($emergencyLastName))|| (empty($emergencyPhone))|| (empty($referredBy))|| (empty($pointOfEntry))|| (empty($numOfChildrenChildCare))|| (empty($attendOtherPrograms))|| (empty($casInvolvement))|| (empty($bornOutsideCanada))|| (empty($incomeFamily))|| (empty($numberPeopleSupportedByIncome))|| (empty($foodShortage1))|| (empty($foodBank))|| (empty($gestatDiabetes))|| (empty($highschoolDiploma))|| (empty($pastSmoke))|| (empty($aroundSmoke))|| (empty($numDrinkWhilePregnant))|| (empty($currentDrink))|| (empty($numDrugsWhilePregnant))|| (empty($streetDrugs))|| (empty($partnerAbuse))|| (empty($threatenedRelationship))) {
		$frmInvalidMsg = "<br><em style='color:red;'>Please fill in all fields!</em><br><br>";
	} else {
		$isFormValid = true;
	}
}

// If the form is valid, insert data into database
if($isFormValid) {
	try{
		$mysqli = new mysqli("gator3192.hostgator.com", "jtfrage_cpnp", "pass4db", "jtfrage_cpnp");
	}
		catch(mysqli_sql_exception $e){
            echo "Your information was not sent";
    }	
	if (!$mysqli->connect_errno) {
					$sql1 = "insert into clientLanguage(clID,english,french,other)
							values
							(DEFAULT,'$languageE','$languageF','$languageO')
							;";
							mysqli_query($mysqli,$sql1);
							$clID = mysqli_insert_id($mysqli);
					$sql2 = "insert into clientReason(crID,learn_pregnancy,learn_care,learn_h_eating,learn_breastfeeding,meet_others,referred,speak_professional,vouchers)
							values
							(DEFAULT,'$reasonForAttendingLAP','$reasonForAttendingLACB','$reasonForAttendingLAH','$reasonForAttendingLAB','$reasonForAttendingMOM','$reasonForAttendingREF','$reasonForAttendingTALK','$reasonForAttendingVOUCH')
							;";
							mysqli_query($mysqli,$sql2);
							$crID = mysqli_insert_id($mysqli);
					$sql3 = "insert into clientTranspo(ctID,walk,car,bus,need_bus_ticket)
							values
							(DEFAULT,'$transportationW','$transportationC','$transportationB','$transportationNT')
							;";
							mysqli_query($mysqli,$sql3);
							$ctID = mysqli_insert_id($mysqli);
					$sql4 = "insert into other_information(other_infoID,referred,point_of_entry,attending_other_programs,CAS_involvement,CAS_invol_info,food_allergies,prenatelly_registered,born_outside_canada,born_outside_canada_location,born_outside_canada_years_in_canada,monthly_family_income,family_members_in_family,missed_meals_past_6_month,how_often_food_bank,been_told_diabetes,obtained_highschool_diploma,smoked_past_6_months,smoking_around_you,pregancy_alchool_comsuption,current_alchool_comsuption,drug_usage_while_pregnant,drug_usage_currently,partner_verbal_abuse,partner_physical_abusy)
							values
							(DEFAULT,'$referredBy','$pointOfEntry','$attendOtherPrograms','$casInvolvement','$casWorkerInformation','$foodAllergies','$registeringPrenatally','$bornOutsideCanada','$bornOutsideCanadaL','$bornOutsideCanadaY','$incomeFamily','$numberPeopleSupportedByIncome','$foodShortage1','$foodBank','$gestatDiabetes','$highschoolDiploma','$pastSmoke','$aroundSmoke','$numDrinkWhilePregnant','$currentDrink','$numDrugsWhilePregnant','$streetDrugs','$partnerAbuse','$threatenedRelationship')
							;";
							mysqli_query($mysqli,$sql4);
							$other_infoID = mysqli_insert_id($mysqli);
					$sql5 = "insert into Personal_information(clientID,other_infoID,crID,ctID,clID,registration_date,first_name,last_name,date_of_birth,address,city,province,postal_code,phone_number,alt_phone_number,email,emergancy_contact_first_name,emergancy_contact_last_name,emergancy_contact_phone_number,age) 
							values
							(DEFAULT,'$other_infoID','$crID','$ctID','$clID','$registrationDate','$firstName','$lastName','$clientBirthDate','$address','$city','$province','$postalCode','$phoneNumber','$altphoneNumber','$emailAddress','$emergencyFirstName','$emergencyLastName','$emergencyPhone','$clientAge')
							;";
							mysqli_query($mysqli,$sql5);
							
	}
	echo "<br><em style='color:green;'>Registration form has been sent successfully.</em><br><br>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<?php echo $frmInvalidMsg; ?>
	<div class="row form-group"><h3><strong>Registration Date</strong></h3>
		<label for="inputRDate"><?php echo $e_registrationDate;?>
			<input type="date" class="form-control" name="registrationDate" id="registrationDate" placeholder="Registration Date:">
		</label>
		<!--<h3>Upload file</h3>
		<label for="inputClientPic">
			<input type="file" class="form-control-file" id="clientPicture" aria-describedby="clientPictureHelp">
		</label>
		-->
	</div>
	<div class="row form-group"><h3><strong>Personal Information</strong></h3>
		<label for="inputFname"><?php echo $e_firstName;?>
			<input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
		</label>
		<label for="inputLname"><?php echo $e_lastName;?>
			<input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
		</label>
		<label for="inputDOB"><?php echo $e_clientBirthDate;?>
			<input type="date" class="form-control" name="clientBirthDate" id="clientBirthDate" placeholder="Date of Birth:">
		</label>
	</div>
	<div class="row form-group">
		<label for="inputAddress"><?php echo $e_address;?>
			<input type="text" class="form-control" name="address" id="address" placeholder="Address">
		</label>
		<label for="inputCity"><?php echo $e_city;?>
			<input type="text" class="form-control" name="city" id="city" placeholder="City">
		</label>
		<label for="inputProvince"><?php echo $e_province;?>
			<select class="form-control" name="province" id="province" aria-describedby="provinceHelp" placeholder="Province">
				<option value="" disabled selected>Select a Province</option>
				<option value="Alberta">Alberta</option>
				<option value="British Columbia">British Columbia</option>
				<option value="Manitoba">Manitoba</option>
				<option value="New Brunswick">New Brunswick</option>
				<option value="New Foundland">Newfoundland</option>
				<option value="Northwest Territories">Northwest Territories</option>
				<option value="Nova Scotia">Nova Scotia</option>
				<option value="Nunavut">Nunavut</option>
				<option value="Ontario">Ontario</option>
				<option value="Prince Edward Island">Prince Edward Island</option>
				<option value="Quebec">Québec</option>
				<option value="Saskatchewan">Saskatchewan</option>
				<option value="Yukon">Yukon</option>
			</select>
		</label>
		<label for="inputPostalCode"><?php echo $e_postalCode;?>
			<input type="text" class="form-control" name="postalCode" id="postalCode" placeholder="Postal Code">
		</label>
	</div>
	<div class="row form-group">
		<label for="inputTel"><?php echo $e_phoneNumber;?>
			<input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Phone Number">
		</label>
		<label for="inputAltTel"><?php echo $e_altphoneNumber;?>
			<input type="tel" class="form-control" name="altphoneNumber" id="altphoneNumber" placeholder="Alternative Telephone">
		</label>
		<label for="inputEmail"><?php echo $e_emailAddress;?>
			<input type="email" class="form-control" name="emailAddress" id="emailAddress" placeholder="Email">
		</label>
	</div>
	<div class="row form-group"><h3><strong>Emergency Contact</strong></h3>
		<label for="inputEmerFName"><?php echo $e_emergencyFirstName;?>
			<input type="text" class="form-control" name="emergencyFirstName" id="emergencyFirstName" aria-describedby="emergencyFirstNameHelp" placeholder="First Name">
		</label>
		<label for="inputEmerLName"><?php echo $e_emergencyLastName;?>
			<input type="text" class="form-control" name="emergencyLastName" id="emergencyLastName" aria-describedby="emergencyLastNameHelp" placeholder="Last Name">
		</label>
		<label for="inputEmerPhone"><?php echo $e_emergencyPhone;?>
			<input type="tel" class="form-control" name="emergencyPhone" id="emergencyPhone" aria-describedby="emergencyPhoneHelp" placeholder="Phone Number">
		</label>
	</div>
	<div class="row form-group"><h3><strong>OTHER INFORMATION</strong></h3>
		<label for="inputEmerFName"></label><br>
		<label>Language spoken at home:</label>
		<label class="checkbox-inline"><?php echo $e_languageE;?>
			<input type="checkbox" name="languageSpokenEnglish" id="languageSpokenEnglish" value="English">English
		</label>
		<label class="checkbox-inline"><?php echo $e_languageF;?>
			<input type="checkbox" name="languageSpokenFrench" id="languageSpokenFrench" value="French">French
		</label>
		<label class="checkbox-inline"><?php echo $e_languageO;?>
			<input type="checkbox" name="languageSpokenOther" id="languageSpokenOther" value="Other">Other
		</label>
	</div>
	<div class="row form-group">
		<label for="inputRefBy">Referred by
			<input type="text" class="form-control" name="referredBy" id="referredBy" aria-describedby="referredByHelp" placeholder="Referred By">
		</label>
		<label for="inputProvince">Point of Entry
			<select class="form-control" name="pointOfEntry" id="pointOfEntry" placeholder="Province">
				<option value="" disabled selected>Point of Entry</option>
				<option value="Friend">Friend</option>
				<option value="Ottawa Public Health">Ottawa Public Health</option>
				<option value="Current/former client">Current/former client</option>
				<option value="OW">OW</option>
				<option value="CAS">CAS</option>
				<option value="Internet">Internet</option>
				<option value="Family">Family</option>
				<option value="Other">Other</option>
			</select>
		</label>
	</div>
	<div class="row form-group">
		<label for="inputRefBy">Transportation:<br>
			<label class="checkbox-inline">
				<input type="checkbox" name="transportationWalk" id="transportationWalk" value="Walk">Walk
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" name="transportationCar" id="transportationCar" value="Car">Car
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" name="transportationBus" id="transportationBus" value="Bus">Bus
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" name="transportationNeedTickets" id="transportationNeedTickets" value="NeedTickets">Need Bus Tickets
			</label>
		</label>
	</div>
	<div class="row form-group">
		<label for="inputNumOfChildrenChildCare">Number of children in childcare<br>
			<input type="number" name="numOfChildrenChildCare" id="numOfChildrenChildCare" min="0" placeholder="">
		</label>
	</div>
	<div class="row form-group">
		<label for="inputOtherPrograms">Do you attend any other Buns in the Oven (CPNP) prenatal nutrition programs?<br>
			<input type="radio" class="form-check-input" name="attendOtherPrograms" id="attendOtherProgramsYes" value="Yes">Yes
			<input type="radio" class="form-check-input" name="attendOtherPrograms" id="attendOtherProgramsNo" value="No">No
		</label>
	</div>
	<div class="row form-group">
		<label for="inputCASInvolve">CAS Involvement<br>
			<input type="radio" class="form-check-input" name="casInvolvement" id="casInvolvementYes" value="Yes">Yes
			<input type="radio" class="form-check-input" name="casInvolvement" id="casInvolvementNo" value="No">No
			<input type="text" class="form-control" name="casWorkerInformation" id="casWorkerInformation" placeholder="Worker information">
		</label>
	</div>
	<div class="row form-group">
		<label for="inputFoodAllergies">Food Allergies<br>
			<input type="text" class="form-control" name="food_Allergies" id="food_Allergies" placeholder="Food Allergies">
		</label>
	</div>
	<div class="row form-group">
		<label for="inputPrenatal">Is the participant registering prenatally?<br>
			<input type="radio" class="form-check-input" name="registeringPrenatally" id="registeringPrenatallyYes" value="Yes">Yes
			<input type="radio" class="form-check-input" name="registeringPrenatally" id="registeringPrenatallyNo" value="No">No
		</label>
	</div>
	<div class="row form-group">
		<label for="inputEmerFName"><h3><strong>Questions</strong></h3></label><br>
		<label for="inputFoodAllergies">Why did you come to this program? (Select all that apply)<br>
			<input type="checkbox" name="learnAboutPregnancy" id="learnAboutPregnancy">To learn about pregnancy<br>
			<input type="checkbox" name="learnAboutCaringForBaby" id="learnAboutCaringForBaby">To learn about caring for a baby<br>
			<input type="checkbox" name="learnAboutHealthEating" id="learnAboutHealthEating">To learn about health eating<br>
			<input type="checkbox" name="learnAboutBreastfeeding" id="learnAboutBreastfeeding">To learn about breastfeeding<br>
			<input type="checkbox" name="toMeetOtherMoms" id="toMeetOtherMoms">To meet others women/moms<br>
			<input type="checkbox" name="wasRefferedHere" id="wasRefferedHere">Was referred here<br>
			<input type="checkbox" name="speakToProfessional" id="speakToProfessional">To speak to a professional<br>
			<input type="checkbox" name="getFoodVouchers" id="getFoodVouchers">To get food, vouchers
		</label>
	</div>
	<div class="row form-group">
		<label for="inputBornOutside">Were you born outside of Canada?<br>
			<input type="radio" class="form-check-input" name="bornOutsideCanada" id="bornOutsideCanada" value="Yes">Yes
			<input type="radio" class="form-check-input" name="bornOutsideCanada" id="bornOutsideCanada" value="No">No
			<input type="text" class="form-control" name="bornOutsideCanadaLocation" id="bornOutsideCanadaLocation" placeholder="Location">
			<input type="number" class="form-control" name="bornOutsideCanadaYear" id="bornOutsideCanadaYear" min="0" placeholder="Years in Canada">
		</label>
	</div>
	<div class="row form-group">
		<label for="inputCASInvolve">About how much is your total monthly family income<br>
			<input type="radio" class="form-check-input" name="incomeFamily" value="income1250">Less than $1,250<br>
			<input type="radio" class="form-check-input" name="incomeFamily" value="over1250">$1,251 - $1,670<br>
			<input type="radio" class="form-check-input" name="incomeFamily" value="above1671">$1,671 - $2,500<br>
			<input type="radio" class="form-check-input" name="incomeFamily" value="over2500">Over $2,500<br>
			<input type="radio" class="form-check-input" name="incomeFamily" value="incomeUknown">Do not know
		</label>
	</div>
	<div class="row form-group">
		<label for="inputIncomeSupport">How many adults(including yourself) and children does this income support?<br>
			<input type="number" class="form-control" name="numberPeopleSupportedByIncome" id="numberPeopleSupportedByIncome" min="0">
		</label>
	</div>
	<div class="row form-group">
		<label for="inputFoodSecurity"><h4>Food Security</h4></label>
		<label for="inputFoodSecurity1">In the past 6 months have you ever missed meals or been hungry because you did not have enough money to buy food?<br>
			<input type="radio" class="form-check-input" name="foodShortage1" id="foodShortageYes" value="Yes">Yes
			<input type="radio" class="form-check-input" name="foodShortage1" id="foodShortageNo" value="No">No
		</label>
	</div>
	<div class="row form-group">
		<label for="inputFoodSecurity2">How often do you get food from a food bank or go to a meal club? (specify in months)<br>
			<input type="number" class="form-check-input" name="foodBank" id="foodBank">
		</label>
	</div>
	<div class="row form-group">
		<label for="gestationalDiabetes">Have you been told you have or are at risk for gestational diabetes?<br>
			<input type="radio" class="form-check-input" name="gestatDiabetes" id="gestationalDiabetesYes" value="Yes">Yes
			<input type="radio" class="form-check-input" name="gestatDiabetes" id="gestationalDiabetesNo" value="No">No
		</label>
	</div>
	<div class="row form-group">
		<label for="highDiploma">Have you obtained a high school diploma or equivalent?<br>
			<input type="radio" class="form-check-input" name="highschoolDiploma" id="diplomaYes" value="Yes">Yes
			<input type="radio" class="form-check-input" name="highschoolDiploma" id="diplomaNo" value="No">No
		</label>
	</div>
	<div class="row form-group">
		<label for="inputTobaccoUse"><h4>Tobacco Use</h4></label><br>
		<label for="inputTobaccoUse1">In the past 6 months, have you smoked cigarettes or used other tobacco products?<br>
			<input type="radio" class="form-check-input" name="pastSmoke" id="smokeInPastYes" value="Yes">Yes
			<input type="radio" class="form-check-input" name="pastSmoke" id="smokeInPastNo" value="No">No
		</label>
	</div>
	<div class="row form-group">
		<label for="inputTobaccoUse2">Does anyone smoke around you or your children?<br>
			<input type="radio" class="form-check-input" name="aroundSmoke" id="anyoneSmokeAroundYouYes" value="Yes">Yes
			<input type="radio" class="form-check-input" name="aroundSmoke" id="anyoneSmokeAroundYouNo" value="No">No
		</label>
	</div>
	<div class="row form-group">
		<label for="inputAlcoholUse"><h4>Alcohol Use</h4></label><br>
		<label for="inputAlcoholUse1">Since you became pregnant, how often did you drink alcohol?<br>
			<input type="number" class="form-control" name="numDrinkWhilePregnant" id="numDrinkWhilePregnant" min="0">
		</label>
	</div>
	<div class="row form-group">
		<label for="inputAlcoholUse2">Currently, do you drink alcohol?<br>
			<input type="radio" class="form-check-input" name="currentDrink" id="currentlyDrinkAlcoholYes" value="Yes">Yes
			<input type="radio" class="form-check-input" name="currentDrink" id="currentlyDrinkAlcoholNo" value="No">No
		</label>
	</div>
	<div class="row form-group">
		<label for="inputDrugUse"><h4>Drug Use</h4></label><br>
		<label for="inputDrugUse1">Since you became pregnant, how often did you use street drugs?<br>
			<input type="number" class="form-control" name="numDrugsWhilePregnant" id="numDrugsWhilePregnant" min="0">
		</label>
	</div>
	<div class="row form-group">
		<label for="inputDrugUse2">Currently, do you use street drugs?<br>
			<input type="radio" class="form-check-input" name="streetDrugs" id="currentlyUseDrugsYes" value="Yes">Yes
			<input type="radio" class="form-check-input" name="streetDrugs" id="currentlyUseDrugsNo" value="No">No
		</label>
	</div>
	<div class="row form-group">
		<label for="inputAbuse"><h4>Abuse</h4></label><br>
		<label for="inputAbuse1">Does your partner put you down, yell at you, call you names, or blame you when something goes wrong?<br>
			<input type="radio" class="form-check-input" name="partnerAbuse" id="partnerAbuseYes" value="Yes">Yes
			<input type="radio" class="form-check-input" name="partnerAbuse" id="partnerAbuseNo" value="No">No
		</label>
	</div>
	<div class="row form-group">
		<label for="inputAbuse2">Are you in a relationship where you have been made to feel afraid, threatened or physically hurt?<br>
			<input type="radio" class="form-check-input" name="threatenedRelationship" id="threatenedRelationshipYes" value="Yes">Yes
			<input type="radio" class="form-check-input" name="threatenedRelationship" id="threatenedRelationshipNo" value="No">No
		</label>
	</div>
	<button type="submit" class="btn btn-success">Submit</button>							
</form>
<script>
//$(function(){
//	$("#registrationDate").datepicker();
//	$("#clientBirthDate").datepicker();
//	$("#numOfChildrenChildCare").spinner();
//	$("#phoneNumber").intlTelInput();
//});
</script>
<?php include 'footer.php' ?>