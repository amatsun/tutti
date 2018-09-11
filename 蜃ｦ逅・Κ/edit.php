<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"
/>
<title>注文内容修正 - Tutti Management System</title>
</head>

<body>
<!-- ここにプログラムを記述します -->
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

<a href="index.php">トップ画面</a>
<a href="history.php">注文履歴</a>

<h2>注文内容修正</h2>

<form id="frmUpdate" name="frmUpdate" action="edit_do.php" method="post">

<p>注文ID</p>
<?php echo htmlspecialchars($data['order_id'], ENT_QUOTES); ?>
<input type="hidden" name="order_id" value="<?php echo htmlspecialchars($data['order_id'], ENT_QUOTES); ?>" >

<p>お客様ID</p>
<?php echo htmlspecialchars($data['customer_id'], ENT_QUOTES); ?>
<input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($data['customer_id'], ENT_QUOTES); ?>" >

<p>席番号</p>
<?php echo htmlspecialchars($data['seat_num'], ENT_QUOTES); ?>
<input type="hidden" name="seat_num" value="<?php echo htmlspecialchars($data['seat_num'], ENT_QUOTES); ?>" >

<p>ドリンク</p>
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

<p>ケーキ</p>
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

</body>
</html>
