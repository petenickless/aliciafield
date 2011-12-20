<?php
	$name        = $_REQUEST['contact_name'];
	$email        = $_REQUEST['contact_email'];
	$query        = $_REQUEST['contact_query'];
	$website	= 'Alicia Field';
	$botcha = $_REQUEST['botcha'];
	
	$to      = "pete@1updesign.org";
	$subject = 'URGENT enquiry from the '.$website.' website';
	$message = 'A query was sent by '.$name.' using the '.$website.' website contact form.'."\r\n".'Their query was'."\r\n".$query."\r\n".'Email Address: '.$email."\r\n";
	$headers = 'From: pete@1updesign.org' . "\r\n" .
	    'Reply-To: webmaster@example.com' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();
	
	if(isset($email) & ($botcha == "gotyah")) {
		echo "were in";
		mail('petenickless@gmail.com', $subject, $message, $headers);
	}
?>