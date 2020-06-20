<?php
	if ($_COOKIE['login'] == '') {
		header('Location: /registr.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Meta tags -->
		<?php
			$title = 'Добавление статьи';
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
						<h1 class="h1 text-center">Добавление статьи</h1>
						<div class="mt-4">

							<!-- Form -->
							<form action="" method="post">
								<div class="form-group row">
									<label for="title" class="col-sm-2 col-form-label">Заголовок</label>
									<div class="col-sm-10">
										<input type="text" name="title" id="title" class="form-control" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="excerpt" class="col-sm-2 col-form-label">Отрывок</label>
									<div class="col-sm-10">
										<textarea name="excerpt" id="excerpt" class="form-control" required></textarea>
									</div>
								</div>

								<label for="content">Контент</label>
								<textarea name="content" id="content" cols="10" rows="10" class="form-control" required></textarea>

								<div class="alert alert-danger mt-4" id="error"></div>

								<div class="mt-4 text-right">
									<button type="button" id="create" class="btn btn-success">Опубликовать</button>
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
        	$('#create').click(function () {
        		var title = $('#title').val();
        		var excerpt = $('#excerpt').val();
        		var content = $('#content').val();

        		$.ajax({
        			url: 'ajax/create.php',
        			type: 'POST',
        			cache: false,
        			data: {
        				'title': title,
        				'excerpt': excerpt,
        				'content': content
        			},
        			dataType: 'html',
        			success: function(data) {
        				if(data == 'Готово') {
        					$('#create').text('Все, готово!');
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