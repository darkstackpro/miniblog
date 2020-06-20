<!DOCTYPE html>
<html lang="ru" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Meta tags -->
		<?php
			$title = 'Контакты';
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
						<h1 class="h1">Контактная форма</h1>
						<div class="mt-4">

							<!-- Form -->
							<form action="" method="post">
								<div class="form-group row">
									<label for="name" class="col-sm-2 col-form-label">Имя</label>
									<div class="col-sm-10">
										<input type="text" name="name" id="name" placeholder="Введите ваше имя..." class="form-control" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="email" class="col-sm-2 col-form-label">Email</label>
									<div class="col-sm-10">
										<input type="email" name="email" id="email" placeholder="Введите ваш email..." class="form-control" required>
									</div>
								</div>

								<textarea name="mess" id="mess" cols="10" rows="10" placeholder="Введите сюда ваш комментарий..." class="form-control" required></textarea>

								<div class="alert alert-danger mt-4" id="error"></div>

								<div class="mt-4 text-right">
									<button type="button" id="contact" class="btn btn-success">Отправить сообщение</button>
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
        	$('#contact').click(function () {
        		var name = $('#name').val();
        		var email = $('#email').val();
        		var mess = $('#mess').val();

        		$.ajax({
        			url: 'ajax/contact.php',
        			type: 'POST',
        			cache: false,
        			data: {
        				'name': name,
        				'email': email,
        				'mess': mess
        			},
        			dataType: 'html',
        			success: function(data) {
        				if(data == 'Готово') {
        					$('#contact').text('Все, готово!');
        					$('#error').hide();
        					$('#name').val('');
        					$('#email').val('');
        					$('#mess').val('');
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