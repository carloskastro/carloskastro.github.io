<?php
if (isset($_REQUEST['enviar'])) {
	$email="";
	$name="";
	$subject="";
	$message="";
	$recipient="cacastro970@misena.edu.co";

	if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    } 

	if (isset($_POST['nombres'])) {
		$name=filter_var($_POST['nombres'], FILTER_SANITIZE_STRING);
	}

	if (isset($_POST['asunto'])) {
		$subject=filter_var($_POST['asunto'], FILTER_SANITIZE_STRING);
	}

	if (isset($_POST['mensaje'])) {
		$message=filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);
	}

	  $send=mail($recipient, $subject, $message);
}

?>