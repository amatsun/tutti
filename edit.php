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

							$order_id = $_REQUEST['order_id'];
							$sql_pivot = sprintf('SELECT order_id, customer_id, seat_num,
							                                max(CASE WHEN item_id = 1 THEN quantity ELSE 0 END) AS "coffee",
							                                max(CASE WHEN item_id = 2 THEN quantity ELSE 0 END) AS "tea",
							                                max(CASE WHEN item_id = 3 THEN quantity ELSE 0 END) AS "orange",
							                                max(CASE WHEN item_id = 4 THEN quantity ELSE 0 END) AS "choco",
							                                max(CASE WHEN item_id = 5 THEN quantity ELSE 0 END) AS "apple",
							                                max(CASE WHEN item_id = 6 THEN quantity ELSE 0 END) AS "fruit",
							                                created, modified
							                                FROM history
							                                WHERE order_id = "%d"
							                                GROUP BY order_id DESC',
							                                mysqli_real_escape_string($db, $order_id)
							                              );
							                              $recordSet = mysqli_query($db, $sql_pivot);
							                              $data = mysqli_fetch_assoc($recordSet);
							?>

							<h2>注文内容修正</h2>

							<form id="frmUpdate" name="frmUpdate" action="edit_do.php" method="post">

							<h3>注文ID</h3>
							<?php echo htmlspecialchars($data['order_id'], ENT_QUOTES); ?>
							<input type="hidden" name="order_id" value="<?php echo htmlspecialchars($data['order_id'], ENT_QUOTES); ?>" >

							<h3>お客様ID</h3>
							<?php echo htmlspecialchars($data['customer_id'], ENT_QUOTES); ?>
							<input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($data['customer_id'], ENT_QUOTES); ?>" >

							<h3>席番号</h3>
							<?php echo htmlspecialchars($data['seat_num'], ENT_QUOTES); ?>
							<input type="hidden" name="seat_num" value="<?php echo htmlspecialchars($data['seat_num'], ENT_QUOTES); ?>" >

							<h3>ドリンク</h3>
							<ul>
							<li>コーヒー　100円
							  <select name="item[]" id="item[]">
							    <?php
							    for ($i = 0; $i<=5; $i++) {
							      if ($i == $data['coffee']) {
							        print('<option value="' . $i . '" selected>' . $i . '個</option>');
							      } else {
							        print('<option value="' . $i . '">' . $i . '個</option>');
							      }
							    }
							  ?></select></li>
							</li>
							<li>紅茶　100円
							  <select name="item[]" id="item[]">
							  <?php
							  for ($i = 0; $i<=5; $i++) {
							    if ($i == $data['tea']) {
							      print('<option value="' . $i . '" selected>' . $i . '個</option>');
							    } else {
							      print('<option value="' . $i . '">' . $i . '個</option>');
							    }
							  }
							  ?></select></li>
							</li>
							<li>オレンジジュース　150円
							  <select name="item[]" id="item[]">
							  <?php
							  for ($i = 0; $i<=5; $i++) {
							    if ($i == $data['orange']) {
							      print('<option value="' . $i . '" selected>' . $i . '個</option>');
							    } else {
							      print('<option value="' . $i . '">' . $i . '個</option>');
							    }
							  }
							  ?></select></li>
							</li>
							</ul>

							<h3>ケーキ</h3>
							<ul>
							<li>チョコレートケーキ　150円
							  <select name="item[]" id="item[]">
							  <?php
							  for ($i = 0; $i<=5; $i++) {
							    if ($i == $data['choco']) {
							      print('<option value="' . $i . '" selected>' . $i . '個</option>');
							    } else {
							      print('<option value="' . $i . '">' . $i . '個</option>');
							    }
							  }
							  ?></select></li>
							<li>アップルパイ　150円
							  <select name="item[]" id="item[]">
							  <?php
							  for ($i = 0; $i<=5; $i++) {
							    if ($i == $data['apple']) {
							      print('<option value="' . $i . '" selected>' . $i . '個</option>');
							    } else {
							      print('<option value="' . $i . '">' . $i . '個</option>');
							    }
							  }
							  ?></select></li>
							</li>
							<li>フルーツケーキ　200円
							  <select name="item[]" id="item[]">
							  <?php
							  for ($i = 0; $i<=5; $i++) {
							    if ($i == $data['fruit']) {
							      print('<option value="' . $i . '" selected>' . $i . '個</option>');
							    } else {
							      print('<option value="' . $i . '">' . $i . '個</option>');
							    }
							  }
							  ?></select></li>
							</li>
							</ul>

							<input type="submit" value="注文内容修正" />
							</form>
						</article>

					</div>
				</div>

						<?php include('./frame.php'); ?>

	</body>
</html>
