<?php

	// define variables and set to empty values
	$name_error = $email_error = $url_error = "";
	$name = $email = $message = $url = $success = "";

	//form is submitted with POST method
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$name_error = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$name_error = "Only letters and white space allowed"; 
			}
		}

	if (empty($_POST["email"])) {
		$email_error = "Email is required";
	} else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email_error = "Invalid email format"; 
		}
	}

	if (empty($_POST["url"])) {
		$url_error = "";
	} else {
		$url = test_input($_POST["url"]);
	// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
		$url_error = "Invalid URL"; 
		}
	}

	if (empty($_POST["message"])) {
		$message = "";
	} else {
	    $message = test_input($_POST["message"]);
	}
	  
	if ($name_error == '' and $email_error == '' and $url_error == '' ){
		$message_body = '';
		unset($_POST['submit']);
		foreach ($_POST as $key => $value){
			$message_body .=  "$key: $value\n";
		}

		$to = 'contact@devoture.net';
		$subject = 'DEVOTURE.NET Contact Us Form Submit';
		if (mail($to, $subject, $message)){
			$success = "Message sent, thank you for contacting us!";
			name = $email = $message = $url = '';
		}
	}

	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>