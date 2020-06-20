<?php
	$name = trim( filter_var( $_POST['name'], FILTER_SANITIZE_STRING) );
	$email = trim( filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) );
	$mess = trim( filter_var($_POST['mess'], FILTER_SANITIZE_STRING) );

	$error = '';

	if ( strlen($name) <= 3 ) {
		$error = 'Вы забыли ввести имя!';
	} elseif ( strlen($email) <= 3 ) {
		$error = 'Вы забыли ввести email!';
	} elseif ( strlen($mess) <= 3 ) {
		$error = 'Вы забыли ввести сообщение!';
	}

	if ($error != '') {
		echo $error;
		exit();
	}

	$myEmail = 'email@darkstack.pro';
	$subject = "=?utf-8?B?" . base64_encode('Новое сообщение с сайта') . "?=";
	$headers = "From $email\r\nReplay-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

	mail($myEmail, $subject, $mess, $headers);
	
	echo "Готово!";
?>