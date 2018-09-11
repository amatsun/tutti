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

							<?php
							require('dbconnect.php');
							?>

							<h2>精算</h2>

							<form action="payment_confirm.php" method="post">


							<p>席番号を選択してください</p>

							<select name="seat_number" id="seat_number">
							<?php

							#客のいる座席を取得
							$recordSet = mysqli_query($db, 'SELECT seat_number FROM seat_status WHERE status = 1');
							$num = mysqli_num_rows($recordSet);

							for ($i = 0; $i<$num; $i++) {
							  $table = mysqli_fetch_assoc($recordSet);
							  print('<option value="' . $table['seat_number'] . '">' . $table['seat_number'] . '</option>');
							}
							?></select>
							<p></p>
							<input type="submit" value="内容確認" />
							</form>
						</article>

					</div>
					</div>

						<?php include('./frame.php'); ?>

	</body>
</html>
