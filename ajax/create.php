<?php
	$title = trim( filter_var( $_POST['title'], FILTER_SANITIZE_STRING) );
	$excerpt = trim( filter_var($_POST['excerpt'], FILTER_SANITIZE_STRING) );
	$content = trim($_POST['content']);

	$error = '';

	if ( strlen($title) <= 3 ) {
		$error = 'Введите корректное название статьи!';
	} elseif ( strlen($excerpt) <= 3 ) {
		$error = 'Введите корректное описание статьи!';
	} elseif ( strlen($content) <= 3 ) {
		$error = 'Введите корректный контент статьи!';
	}

	if ($error != '') {
		echo $error;
		exit();
	}

	require_once '../config/db.php';

	$sql = 'INSERT INTO article(title, excerpt, content, date, author) VALUES(?, ?, ?, ?, ?)';
	
	$query = $pdo->prepare($sql);
	$query->execute(
		[$title, $excerpt, $content, time(), $_COOKIE['login']]
	);

	echo 'Готово!';
?>