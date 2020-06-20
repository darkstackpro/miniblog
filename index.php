<!DOCTYPE html>
<html lang="ru" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Meta tags -->
		<?php
			$title = 'Обычный блог на PHP';
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
					<?php
						require_once 'config/db.php';

						$sql = 'SELECT * FROM `article` ORDER BY `date` DESC';

						$query = $pdo->query($sql);

						while ($row = $query->fetch(PDO::FETCH_OBJ)) {
							echo "
								<div class='warning-inner mb-4'>
									<h2>{$row->title}</h2>
									<p>{$row->excerpt}</p>
									<p><strong>Автор статьи</strong>: {$row->author}</p>
									<a href='/single.php?id={$row->id}'>
										<button class='btn btn-warning'>Читать полностью</button>
									</a>
								</div>
							";
						}
					?>
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