<!DOCTYPE html>
<html lang="ru" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Meta tags -->
		<?php
			$title = 'Регистрация';
			require 'partials/meta.php';
		?>

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/png" href="img/favicon.png">

        <!-- Styles -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<!-- Header -->
		<?php require 'partials/header.php'; ?>

		<main class="container mt-5">
			<div class="row">

				<!-- Content -->
				<div class="col-md-8 mb-3">
					<div class="warning-inner">
						<h1 class="h1 text-center">Форма регистрации</h1>
						<div class="mt-4">

							<!-- Form -->
							<form action="" method="post">
								<div class="form-group row">
									<label for="name" class="col-sm-2 col-form-label">Имя</label>
									<div class="col-sm-10">
										<input type="text" name="name" id="name" placeholder="Введите сюда ваше имя..." class="form-control" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="login" class="col-sm-2 col-form-label">Логин</label>
									<div class="col-sm-10">
										<input type="text" name="login" id="login" placeholder="Введите сюда ваш логин..." class="form-control" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="email" class="col-sm-2 col-form-label">Email</label>
									<div class="col-sm-10">
										<input type="email" name="email" id="email" placeholder="Введите сюда ваш email..." class="form-control" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="pass" class="col-sm-2 col-form-label">Пароль</label>
									<div class="col-sm-10">
										<input type="password" name="pass" id="pass" placeholder="Введите сюда ваш пароль..." class="form-control" required>
									</div>
								</div>

								<div class="alert alert-danger" id="error"></div>

								<div class="mt-4 text-right">
									<button type="button" id="registr" class="btn btn-success">Зарегистрироваться</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<!-- Sidebar -->
				<?php require 'partials/sidebar.php'; ?>
				
			</div>
		</main>

		<!-- Footer -->
		<?php require 'partials/footer.php'; ?>

		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script>
        	$('#registr').click(function () {
        		var name = $('#name').val();
        		var email = $('#email').val();
        		var login = $('#login').val();
        		var pass = $('#pass').val();

        		$.ajax({
        			url: 'ajax/registr.php',
        			type: 'POST',
        			cache: false,
        			data: {
        				'name': name,
        				'email': email,
        				'login': login,
        				'pass': pass
        			},
        			dataType: 'html',
        			success: function(data) {
        				if(data == 'Готово') {
        					$('#registr').text('Все, готово!');
        					$('#error').hide();
        				} else {
        					$('#error').show();
        					$('#error').text(data);
        				}
        			}
        		});
        	});
        </script>
	</body>
</html>