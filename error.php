<!DOCTYPE html>
<html lang="ru" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Meta tags -->
		<?php
			$title = 'Ошибка 404';
			require 'partials/meta.php';
		?>

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/png" href="img/favicon.png">

        <!-- Styles -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">

		<style>
			.container {
			    width: auto;
			    max-width: 680px;
			    padding: 0 15px;
			}
		</style>
	</head>

	<body class="d-flex flex-column h-100">
		<!-- Header -->
		<?php require 'partials/header.php'; ?>

		<!-- Content -->
		<main role="main" class="flex-shrink-0">
			<div class="container">
				<h1 class="h1 mt-5">Ошибка 404</h1>
				<p class="lead">К сожалению, страницу, которую вы ищите больше не существует на данном сайте по причине ее леквидации на сервере.</p>
				<p>Но вы можете ее поискать <a href="/">на главной</a> странице сайта.</p>
			</div>
		</main>

		<!-- Footer -->
		<?php require 'partials/footer.php'; ?>

		<!-- Scripts -->
        <script src="js/bootstrap.min.js"></script>
	</body>
</html>