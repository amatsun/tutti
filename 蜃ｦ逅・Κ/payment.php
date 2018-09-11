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

<input type="submit" value="内容確認" />
</form>

</body>
</html>
