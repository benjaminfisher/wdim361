<?php
	@$role = $_POST['userRole'];
	@$program = $_POST['program'];
	@$pYear = $_POST['programYear'];
	@$housingType = $_POST['housing'];
	@$travelType = $_POST['travelType'];
	@$cDistance = $_POST['commuteDistance'];
	@$useFrequency = $_POST['useFrequency'];
	@$usePeriod = $_POST['usePeriod'];
	@$pAccess = $_POST['primaryAccess'];
	@$sAccess = $_POST['secondaryAccess'];
	@$siteComments = $_POST['siteComments'];
	@$contact = $_POST['contact'] || FALSE; // Boolean for user testing contact
	@$cName = $_POST['contactName'];
	@$cPhone = $_POST['contactPhoneNumber']; 
	@$cEmail = $_POST['contactEmailAddress'];
	
	date_default_timezone_set('America/Los_Angeles');
	
	var_dump($_REQUEST);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Form Processing</title>
</head>
<body>
	<p><strong>Survey Submitted:</strong> <?php echo date('l F j, Y g:h a'); ?></p>
	
	<p>
	<?php if ($contact == "on" && strlen($cPhone) < 10){ 
		echo "Phone number entered is invalid. It must be at least 10 digits.";
	} else if (){
		
	}
	?>
	</p>
</body>
</html>