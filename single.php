<!DOCTYPE html>
<html lang="ru" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Meta tags -->
		<?php
			require_once 'config/db.php';

			$sql = 'SELECT * FROM `article` WHERE `id` = :id';

			$query = $pdo->prepare($sql);
			$query->execute(['id' => $_GET['id']]);

			$article = $query->fetch(PDO::FETCH_OBJ);

			$title = $article->title;
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

					<div class="warning-inner mb-4">
						<h1><?php echo $article->title; ?></h1>
						<p>Автор: <?php echo $article->author; ?> | Время: <?php echo date('H:i:s', $article->date); ?></p>
						<p><?php echo $article->content; ?></p>
					</div>

					<div class="warning-inner">
						<h3>Форма комментариев</h3>
						<!-- Form -->
						<form action="/single.php?id=<?php echo $_GET['id']; ?>" method="post" class="mt-4 mb-4">
							<div class="form-group row">
								<label for="name" class="col-sm-2 col-form-label">Ваше имя</label>
								<div class="col-sm-10">
									<input type="text" name="name" value="<?php echo $_COOKIE['login']; ?>" class="form-control" required>
								</div>
							</div>

							<textarea name="mess" cols="10" rows="10" placeholder="Введите сюда ваш комментарий..." class="form-control" required></textarea>

							<div class="mt-4 text-right">
								<button type="submit" id="comment" class="btn btn-success">Опубликовать</button>
							</div>
						</form>

						<?php
							if ($_POST['name'] != '' && $_POST['mess'] != '') {
								$name = trim( filter_var($_POST['name'], FILTER_SANITIZE_STRING) );
								$mess = trim( filter_var($_POST['mess'], FILTER_SANITIZE_STRING) );

								$sql = 'INSERT INTO comments(name, mess, article_id) VALUES(?,?,?)';
								
								$query = $pdo->prepare($sql);
								$query->execute(
									[
										$name, $mess, $_GET['id']
									]
								);
							}

							$sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC';
							
							$query = $pdo->prepare($sql);
							$query->execute(
								[
									'id' => $_GET['id']
								]
							);

							$comments = $query->fetchAll(PDO::FETCH_OBJ);

							foreach ($comments as $comment) {
								echo "
									<div class='warning-inner mb-4'>
										<h4>{$comment->name}</h4>
										<p>{$comment->mess}</p>
									</div>
								";
							}
						?>

					</div>

				</div>

				<!-- Sidebar -->
				<?php require 'partials/sidebar.php'; ?>
				
			</div>
		</main>

		<!-- Footer -->
		<?php require 'partials/footer.php'; ?>

		<!-- Scripts -->
        <script src="js/bootstrap.min.js"></script>
	</body>
</html>