<?php

$title = 'Week 3 | Homework';
include '_header.php';
include 'miscfunctions.php';

$subjects = array('General question', 'Give me praise', 'Mean-spirited comment', 'Political comment', 'Meaning of Life');

function subject_validator($subject){
	$error = array();
	switch ($subject) {
		case 2:
			$error['msg'] = "Since you're just a big meanie, I'm not going to send this message.";
			$error['test'] = FALSE;
			return $error;
			break;
			
		case 3:
			$error['msg'] = "When I want your political opinion, I'll ask for it.";
			$error['test'] = FALSE;
			return $error;
			break;
		
		default:
			$error['msg'] = '';
			$error['test'] = TRUE;
			return $error;
			break;
	};
}

function message_validator($message){
	$message = trim(strip_tags($message));
	$result = array();
	
	if(strlen($message) > 60){
		$result['test'] = FALSE;
		$result['msg'] = "TL:DR";
	}elseif(stripos($message, "scary") > 0){
		$result['test'] = FALSE;
		$result['msg'] = "Sorry, your message is just to frightening for the mail server to handle.";
	} else{
		$result['test'] = TRUE;
		$result['msg'] = $message;
	}
	
	return $result;
};


if(!empty($_POST['senderEmail']) && !empty($_POST['senderMessage'])){
	$from = 'noreply@benjaminjfisher.com';
	$to = 'neohell@hotmail.com';
	
	$headers = "From: <".$from.">\nMime-Version: 1.0\nContent-type:text/html; charset:utf-8";
	
	$message = '<p>Someone has sent you a message</p>';
	if(!empty($_POST['senderName'])){
		$message .= 'Name = '. $_POST['senderName'] .'<br />';
	}
	
	$errors = array();
	
	if(!isEmail($_POST['senderEmail'])){
		$errors[] = 'That is not a valid email address';
	};
	
	$subjectVal = subject_validator($_POST['subject']);
	$msgVal = message_validator($_POST['senderMessage']);
	
	if (!$subjectVal['test']) {
		$errors[] = $subjectVal['msg'];
	} else {
		$subject = "Website Comment: ".$subjects[$_POST['subject']];
	}
	
	if (!$msgVal['test']) {
		$errors[] = $msgVal['msg'];
	}

	if(empty($errors)){
		$message .= 'Email = '.$_POST['senderEmail'] .'<br /><br />';
		$message .= 'Message = '.$msgVal['msg'] .'<br />';

		if(mail($to, $subject, $message, $headers)){
			$msg = 'The email has been sent.';
		} else {
			$errors[] = 'Sorry, unable to send the message.';
		}
	}
	
	if(!empty($msg)){
		print '<div class="msg">'.$msg .'</div>';
	}

	if(!empty($errors)){
		foreach ($errors as $error) {
			print '<div class="error">'.$error.'</div>';
		}
	}
	
}
?>

<h1>Email Form</h1>
<form action="" method="post">
	<label>Name: <input type="" name="senderName" required placeholder="Your name..."/></label>
	<label>Email: <input type="" name="senderEmail" required placeholder="Your email address..."/></label>
	<label>Subject:
		<select name="subject">
			<option value="0"><?php echo $subjects[0]; ?></option>
			<option value="1"><?php echo $subjects[1]; ?></option>
			<option value="2"><?php echo $subjects[2]; ?></option>
			<option value="3"><?php echo $subjects[3]; ?></option>
			<option value="4"><?php echo $subjects[4]; ?></option>
		</select>
	</label>
	<label>Message: <textarea name="senderMessage" cols="30" rows="10">Enter your message here...</textarea></label>
	
	<button type="submit">Send</button><button type="reset">Clear</button>
	
</form>

<?php include '_footer.php'; ?>