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

<h2>精算内容確認</h2>

<form action="payment_do.php" method="post">

<p>お客様ID</p>
<?php
$sql = sprintf('SELECT customer_id FROM seat_status WHERE seat_number = "%d" ', $_POST['seat_number']);
$recordSet = mysqli_query($db, $sql);
$table = mysqli_fetch_assoc($recordSet);
echo htmlspecialchars($table['customer_id']);
?>

<input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($table['customer_id']); ?>" >

<p>席番号</p>

<?php echo htmlspecialchars($_POST['seat_number']); ?>
<input type="hidden" name="seat_number" value="<?php echo htmlspecialchars($_POST['seat_number']); ?>" >

<p>注文内容</p>
<table width="100%">
  <tr>
    <th scope="col">注文ID</th>
    <th scope="col">商品名</th>
    <th scope="col">単価</th>
    <th scope="col">数量</th>
    <th scope="col">小計</th>
  </tr>
<?php

$sql = sprintf('SELECT m.item_name, m.value, m.value * i.quantity AS calc, i.* FROM items m, history i WHERE m.item_id = i.item_id AND i.customer_id = "%d" ORDER BY history_id DESC', $table['customer_id']);
$recordSet = mysqli_query($db, $sql);
$sql1 = sprintf('SELECT SUM(m.value * i.quantity) AS sum FROM items m, history i WHERE m.item_id = i.item_id AND i.customer_id = "%d" ORDER BY history_id DESC', $table['customer_id']);
$recordSet1 = mysqli_query($db, $sql1);

while ($table = mysqli_fetch_assoc($recordSet)){
  if ($table['quantity']>0) {
?>
  <tr>
    <td><?php print(htmlspecialchars($table['order_id'])); ?></td>
    <td><?php print(htmlspecialchars($table['item_name'])); ?></td>
    <td><?php print(htmlspecialchars($table['value'])); ?></td>
    <td><?php print(htmlspecialchars($table['quantity'])); ?></td>
    <td><?php print(htmlspecialchars($table['calc'])); ?></td>
  </tr>
<?php
  }
}
?>
</table>

<p>合計金額</p>
<?php
$table = mysqli_fetch_assoc($recordSet1);
print (htmlspecialchars($table['sum']));
?>
円

<input type="submit" value="精算確定" />
</form>

</body>
</html>
