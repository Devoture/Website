<?php

$ourEmail = 'contact@devoture.net';

if($_Post)

	$name =trim(stripslashes($_Post['contactName']));
	$email = trim(stripslashes($_Post['contactEmail']));
	$subject = trim(stripslashes($_Post['contactSubject']));
	$contact_message = trim(stripslashes($_Post['contactMessage']));

	if(strlen($name) < 2) {
		$error['name'] = "Please enter your name.";
	}

	if(!not_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email adress.";
	}

	if(strlen($contact_message) < 20) {
		$error['email'] = "Please enter your message, must be at least 20 characters";
	}

	if($subject == '') {
		$subject = "Contact form submission";
	}

	$message .= "Email form: " . $name . "<br />";
	$message .= "Email adress: " . $email . "<br />";
	$message .= "Message: <br />";
	$message .= $contact_message;
	$message .= "<br /> --- <br /> This email was sent from Devoture.net contact us section. <br />";

	$from = $name . " <" .$email . ">";

	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: " . $email . "\r\n";
	$headers .= "MIME-Version: 1.0 \r\n";
	$headers .= "Content-Type: text/html; charseet=ISO-8859-1 \r\n";

	if (!$error) {
		ini_set("sendmail_form", $ourEmail);
		$mail = mail($ourEmail, $subject, $message, $headers);

		if($mail) {
			echo "OK";
		}
		else {
			echo "Error, Please try again";
		}
	} else {

		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
		echo $response;

	}
?>