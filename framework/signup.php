<?php if(!$_REQUEST) exit;
	$email 		= $_REQUEST['email'];
	
	$subject 	= "You've been contacted by $email";
	
	$content 	= "The message confirm your subscription to DesignThemes | WordPress Theme Developers";
	$content   .= "Thank you! \n\n";
	
	if(@mail($email, $subject, $content, "From: $email \r\n Reply-To: $email \r\nReturn-Path: $email\r\n")) {
		echo "<h5 class='success'>Message Sent</h5>";
        echo "<br/><p class='success'>Thank you for Subscribing us.</p>";
	}else{
		echo "<h5 class='failure'>Sorry, Try again Later.</h5>";
	}?>