<?php
session_start();
include("../conn.php");

extract($_POST);

$password = md5($pass);
$selAcc = $conn->query("SELECT * FROM tbl_users WHERE email='$username' AND password='$password'  ");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

if ($selAcc->rowCount() > 0) {
  $_SESSION['examineeSession'] = array(
    'exmne_id' => $selAccRow['id'],
    'examineenakalogin' => true
  );
  $res = array("res" => "success");
} else {
  $res = array("res" => "invalid");
}

echo json_encode($res);