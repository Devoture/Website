<?php include ('sendmail.php'); ?>
<link rel="stylesheet" href="" type="text/css">
<div class="container">
	<form id="contact" action="<?=htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
		<h3>Contact Form</h3>
		<h4>Contact Us, get a reply within 24hrs</h4>
		<fieldset>
			<input placeholder="Your Name" type="text" name="name" value="<?= $name ?>" tabindex="1" autofocus>
			<span class="error"><?= $name_error ?></span>
		</fieldset>

		<fieldset>
			<input placeholder="Your Website starts with (if applicable) http://" type="text" name="url" value="<?= $url ?>" tableindex="4">
			<span class="error"><?= $url_error ?></span>
		</fieldset>

		<fieldset>
			<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit></button>	
		</fieldset>

		<div class="success"><?= $success ?></div>

	</form>
</div>