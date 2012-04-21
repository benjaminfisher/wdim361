<?php

$title = 'Week 3 | Inclass';
include '_header.php';
include 'miscfunctions.php';


if(!empty($_POST['senderEmail']) && !empty($_POST['senderMessage'])){
	$from = 'noreply@benjaminjfisher.com';
	$to = 'neohell@hotmail.com';
	
	$headers = "From: <".$from.">\nMime-Version: 1.0\nContent-type:text/html; charset:utf-8";
	$subject = 'Email from the website';
	
	$message = '<p>Someone has sent you a message</p>';
	if(!empty($_POST['senderName'])){
		$message .= 'Name = '. $_POST['senderName'] .'<br />';
	}
	
	$errors = array();
	
	if(!isEmail($_POST['senderEmail'])){
		$errors[] = 'That is not a valid email address';
	}
	
	if(empty($errors)){
		$message .= 'Email = '.$_POST['senderEmail'] .'<br /><br />';
		$message .= 'Message = '.$_POST['senderMessage'] .'<br />';

		if(mail($to, $subject, $message, $headers)){
			$msg = 'The email has been sent.';
		} else {
			$errors[] = 'Sorry, unable to send the message.';
		}
	};
	
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
	<label>Message: <textarea name="senderMessage" cols="30" rows="10">Enter your message here...</textarea></label>
	
	<button type="submit">Send</button><button type="reset">Clear</button>
	
</form>

<?php include '_footer.php'; ?>