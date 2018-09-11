<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"
/>
<title>注文履歴 - Tutti Management System</title>
</head>

<body>
<!-- ここにプログラムを記述します -->
<?php
require('dbconnect.php');
$recordSet = mysqli_query($db, 'SELECT order_id, customer_id, seat_num,
                                max(CASE WHEN item_id = 1 THEN quantity ELSE 0 END) AS "coffee",
                                max(CASE WHEN item_id = 2 THEN quantity ELSE 0 END) AS "tea",
                                max(CASE WHEN item_id = 3 THEN quantity ELSE 0 END) AS "orange",
                                max(CASE WHEN item_id = 4 THEN quantity ELSE 0 END) AS "choco",
                                max(CASE WHEN item_id = 5 THEN quantity ELSE 0 END) AS "apple",
                                max(CASE WHEN item_id = 6 THEN quantity ELSE 0 END) AS "fruit",
                                created, modified
                                FROM history
                                GROUP BY order_id DESC
                                ');
$page = $_REQUEST['page'];
?>
<a href="index.php">トップ画面</a>
<a href="order.php">注文</a>
<h2>注文履歴</h2>

<table width="100%">
  <tr>
    <th scope="col">注文ID</th>
    <th scope="col">お客様ID</th>
    <th scope="col">席番号</th>
    <th scope="col">コーヒー</th>
    <th scope="col">紅茶</th>
    <th scope="col">オレンジジュース</th>
    <th scope="col">チョコレートケーキ</th>
    <th scope="col">アップルパイ</th>
    <th scope="col">フルーツケーキ</th>
    <th scope="col">注文時間</th>
    <th scope="col">変更時間</th>
    <th scope="col">修正</th>
  </tr>
<?php

while ($table = mysqli_fetch_assoc($recordSet)){

?>
  <tr>
    <td><?php print(htmlspecialchars($table['order_id'])); ?></td>
    <td><?php print(htmlspecialchars($table['customer_id'])); ?></td>
    <td><?php print(htmlspecialchars($table['seat_num'])); ?></td>
    <td><?php print(htmlspecialchars($table['coffee'])); ?></td>
    <td><?php print(htmlspecialchars($table['tea'])); ?></td>
    <td><?php print(htmlspecialchars($table['orange'])); ?></td>
    <td><?php print(htmlspecialchars($table['choco'])); ?></td>
    <td><?php print(htmlspecialchars($table['apple'])); ?></td>
    <td><?php print(htmlspecialchars($table['fruit'])); ?></td>
    <td><?php print(htmlspecialchars($table['created'])); ?></td>
    <td><?php print(htmlspecialchars($table['modified'])); ?></td>
    <td><a href="edit.php?order_id=<?php print(htmlspecialchars($table['order_id'])); ?>">修正</a></td>
  </tr>
<?php

}
?>
</table>
</body>
</html>
