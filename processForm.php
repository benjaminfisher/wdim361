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
	
	<?php
		if($contact == "on"):
			if(strlen($cName) == 0 || strlen($cEmail) == 0): ?>
				<p>Please fill in all contact information if you wish to be contacted for user testing.</p>
			<?php elseif (strlen($cPhone) < 10): ?>
				<p>Please enter your full phone number.</p>
			<?php endif;
		else:
			$cName = "Anonymous";
		endif;
	?>
	
	<p>Thanx for so much information <?php echo strtoupper($cName); ?>. We will promptly sell it to the highest bidder.</p>
	
	<?php if(strlen($cEmail) > 0): ?>
		<p>So your email address was <?php echo strtolower($cEmail); ?> again?</p>
	<?php endif; ?>
	
</body>
</html>