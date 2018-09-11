<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"
/>
<title>注文内容修正完了 - Tutti Management System</title>
</head>

<body>
<!-- ここにプログラムを記述します -->
<?php
require('dbconnect.php');
?>
<a href="index.php">トップ画面</a>
<a href="order.php">注文</a>
<a href="history.php">注文履歴</a>

<h2>注文内容修正</h2>
<p>注文内容の修正が完了しました</p>

<?php $item = $_POST['item'];
      $order_id = $_POST['order_id'];
      $customer_id = $_POST['customer_id'];
      $seat_num = $_POST['seat_num'];
 ?>

 <p>注文ID</p>
 <?php echo htmlspecialchars($order_id, ENT_QUOTES); ?>

 <p>お客様ID</p>
 <?php echo htmlspecialchars($customer_id, ENT_QUOTES); ?>

 <p>席番号</p>
 <?php echo htmlspecialchars($seat_num, ENT_QUOTES); ?>

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

#注文内容のDB書き込み
for ($i=0; $i<=5; $i++){
  $sql = sprintf('UPDATE history SET quantity = %d, modified = NOW() WHERE order_id = %d AND item_id = %d',
  mysqli_real_escape_string($db, $item[$i]),
  mysqli_real_escape_string($db, $order_id),
  mysqli_real_escape_string($db, $i+1)
  );
  mysqli_query($db, $sql) or die(mysqli_error($db));
}

?>

</body>
</html>
