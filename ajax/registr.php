<?php
	$name = trim( filter_var( $_POST['name'], FILTER_SANITIZE_STRING) );
	$email = trim( filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) );
	$login = trim( filter_var($_POST['login'], FILTER_SANITIZE_STRING) );
	$pass = trim( filter_var($_POST['pass'], FILTER_SANITIZE_STRING) );

	$error = '';

	if ( strlen($name) <= 3 ) {
		$error = 'Вы забыли ввести имя!';
	} elseif ( strlen($email) <= 3 ) {
		$error = 'Вы забыли ввести email!';
	} elseif ( strlen($login) <= 3 ) {
		$error = 'Вы забыли ввести логин!';
	} elseif ( strlen($pass) <= 3 ) {
		$error = 'Вы забыли ввести пароль!';
	}

	if ($error != '') {
		echo $error;
		exit();
	}

	$hash = 'ztyX7}sh6xX}$A4g%1M~';
	$pass = md5($pass . $hash);

	require_once '../config/db.php';

	$sql = 'INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)';
	
	$query = $pdo->prepare($sql);
	$query->execute(
		[$name, $email, $login, $pass]
	);

	echo 'Готово!';
?>