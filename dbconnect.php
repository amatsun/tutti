<?php
/*
try{
    $db = new PDO('mysql:dbname=tutti_sys;host=127.0.0.1;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo 'DB接続エラー: ' . $e->getMessage();
}*/
$db = mysqli_connect('localhost', 'root', '', 'tutti_sys') or die(mysqli_connect_error());
//mysqli_set_charset($db, 'utf8');
$db->set_charset('utf8');
?>

