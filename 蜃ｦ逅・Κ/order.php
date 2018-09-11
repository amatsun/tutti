<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"
/>
<title>注文画面 - Tutti Management System</title>
</head>

<body>
<!-- ここにプログラムを記述します -->
<?php
require('dbconnect.php');
?>

<a href="index.php">トップ画面</a>
<a href="history.php">注文履歴</a>

<h2>注文画面</h2>

<form action="order_do.php" method="post">

<p>お客様ID</p>
<?php
$recordSet = mysqli_query($db, 'SELECT MAX(customer_id) + 1 FROM history');
$table = mysqli_fetch_assoc($recordSet);
echo $table['MAX(customer_id) + 1'];
?>

<p>席番号</p>

<select name="seat_number" id="seat_number">
<?php

#空いている座席を取得
$recordSet = mysqli_query($db, 'SELECT seat_number FROM seat_status WHERE status = 0');
$num = mysqli_num_rows($recordSet);

for ($i = 0; $i<$num; $i++) {
  $table = mysqli_fetch_assoc($recordSet);
  print('<option value="' . $table['seat_number'] . '">' . $table['seat_number'] . '</option>');
}
?></select>

<p>ドリンク</p>
<ul>
<li>コーヒー　100円
  <select name="item[]" id="item[]">
  <?php
  for ($i = 0; $i<=5; $i++) {
    print('<option value="' . $i . '">' . $i . '個</option>');
  }
  ?></select></li>
</li>
<li>紅茶　100円
  <select name="item[]" id="item[]">
  <?php
  for ($i = 0; $i<=5; $i++) {
    print('<option value="' . $i . '">' . $i . '個</option>');
  }
  ?></select></li>
</li>
<li>オレンジジュース　150円
  <select name="item[]" id="item[]">
  <?php
  for ($i = 0; $i<=5; $i++) {
    print('<option value="' . $i . '">' . $i . '個</option>');
  }
  ?></select></li>
</li>
</ul>

<p>ケーキ</p>
<ul>
<li>チョコレートケーキ　150円
  <select name="item[]" id="item[]">
  <?php
  for ($i = 0; $i<=5; $i++) {
    print('<option value="' . $i . '">' . $i . '個</option>');
  }
  ?></select></li>
<li>アップルパイ　150円
  <select name="item[]" id="item[]">
  <?php
  for ($i = 0; $i<=5; $i++) {
    print('<option value="' . $i . '">' . $i . '個</option>');
  }
  ?></select></li>
</li>
<li>フルーツケーキ　200円
  <select name="item[]" id="item[]">
  <?php
  for ($i = 0; $i<=5; $i++) {
    print('<option value="' . $i . '">' . $i . '個</option>');
  }
  ?></select></li>
</li>
</ul>

<input type="submit" value="新規注文" />
</form>

</body>
</html>
