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

	if (strlen($contact_message) < 20) {
		$error['email'] = "Please enter your message, must be at least 20 characters";
	}


?>