<!DOCTYPE HTML>
<!--
	Striped by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Tutti Management System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Content -->
			<div id="content">
				<div class="inner">

					<!-- Post -->
						<article class="box post post-excerpt">

							<?php require('dbconnect.php'); ?>

							<h2>精算完了</h2>

							<p>
							  席番号：<?php echo htmlspecialchars($_POST['seat_number']); ?>
							  　お客様ID：<?php echo htmlspecialchars($_POST['customer_id']); ?>
							  の精算が完了しました．
							</p>

							<?php
							#座席情報更新
							$sql = sprintf('UPDATE seat_status SET status = 0, customer_id = 0 WHERE seat_number = "%d"',
							        mysqli_real_escape_string($db, $_POST['seat_number'])
							      );
							mysqli_query($db, $sql) or die(mysqli_error($db));
							?>
						</article>

					</div>
					</div>

						<?php include('./frame.php'); ?>

	</body>
</html>
