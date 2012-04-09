<?php
	$program = $_POST['program'];
	$pYear = $_POST['programYear'];
	$housingType = $_POST['housing'];
	$travelType = $_POST['travelType'];
	$cDistance = $_POST['commuteDistance'];
	$useFrequency = $_POST['useFrequency'];
	$usePeriod = $_POST['usePeriod'];
	$pAccess = $_POST['primaryAccess'];
	$sAccess = $_POST['secondaryAccess'];
	$siteComments = $_POST['siteComments'];
	$contact = $_POST['contact']; // Boolean for user testing contact
	$sName = $_POST['studentName'];
	$sPhone = $_POST['studentPhoneNumber']; 
	$sEmail = $_POST['studentEmailAddress'];
	
	date_default_timezone_set('America/Los_Angeles');

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Form Processing</title>
</head>
<body>
	<p><?php echo date('l F j, Y g:h a'); ?></p>
	
	<p>
	<?php if ($phone && strlen($phone) < 10){ 
		echo "Phone number entered is invalid. It must be at least 10 digits.";
	} else {
		echo "First: $fName, Last: $lName, Email: $email, Phone: $phone";
	}
	?>
	
	</p>
</body>
</html>