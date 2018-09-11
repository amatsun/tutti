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

<h2>注文画面</h2>
<p>注文完了</p>

<?php $item = $_POST['item'];
      $seat_num = $_POST['seat_number'];
 ?>

<p>お客様ID</p>
<?php
$recordSet = mysqli_query($db, 'SELECT MAX(customer_id) + 1 FROM history');
$customer_id = mysqli_fetch_assoc($recordSet);
echo $customer_id['MAX(customer_id) + 1'];
?>

<p>席番号</p>
<?php echo $seat_num; ?>

<p>ドリンク</p>
<ul>
<li>コーヒー　100円： <?php echo $item[0]; ?>個</li>
<li>紅茶　100円： <?php echo $item[1]; ?>個</li>
<li>オレンジジュース　150円： <?php echo $item[2]; ?>個</li>
</ul>

<p>ケーキ</p>
<ul>
<li>チョコレートケーキ　150円： <?php echo $item[3]; ?>個</li>
<li>アップルパイ　150円： <?php echo $item[4]; ?>個</li>
<li>フルーツケーキ　200円： <?php echo $item[5]; ?>個</li>
</ul>

<?php

#$result = mysqli_query('SELECT COUNT(*) FROM items', $db);
#$row = mysqli_fetch_array($result, MYSQL_ASSOC);
#$count = $row["count(*)"];
#print($count);

#注文IDの繰り上げ
$recordSet = mysqli_query($db, 'SELECT MAX(order_id) + 1 FROM history');
$order_id= mysqli_fetch_assoc($recordSet);

#座席情報更新
$sql = sprintf('UPDATE seat_status SET status = 1, customer_id = "%d" WHERE seat_number = "%d"', $customer_id['MAX(customer_id) + 1'], $seat_num);
mysqli_query($db, $sql) or die(mysqli_error($db));

#注文内容のDB書き込み
for ($i=1; $i<=6; $i++){
  $sql = sprintf('INSERT INTO history SET order_id = "%d", customer_id = "%d", seat_num = "%d", item_id = "%d", quantity="%d", created= NOW() ',
  mysqli_real_escape_string($db, $order_id['MAX(order_id) + 1']),
  mysqli_real_escape_string($db, $customer_id['MAX(customer_id) + 1']),
  mysqli_real_escape_string($db, $seat_num),
  $i,
  mysqli_real_escape_string($db, $item[$i - 1])
  );
  mysqli_query($db, $sql) or die(mysqli_error($db));
}

?>

</body>
</html>
