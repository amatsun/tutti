<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"
/>
<title>注文完了 - Tutti Management System</title>
</head>

<body>
<!-- ここにプログラムを記述します -->
<?php
require('dbconnect.php');
?>
<a href="index.php">トップ画面</a>
<a href="order.php">注文</a>
<a href="history.php">注文履歴</a>

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

</body>
</html>
