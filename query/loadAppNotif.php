<?php
session_start();
include("../conn.php");
$exmneId = $_SESSION['examineeSession']['exmne_id'];
extract($_POST);

$loadData = $conn->query("SELECT exam_id, ex_title, ea.id as app_id FROM exam_application ea inner join exam_tbl et on ea.exam_id = et.ex_id where ea.id = '$myAppId' and examne_id = '$exmneId' ORDER BY applied_on DESC ");

if ($loadData) {
	$data = $loadData->fetch(PDO::FETCH_ASSOC);
	$res = array("res" => $loadData->rowCount() . " " . $data['exam_id'] . " " . $data['ex_title'] . " " . $data['app_id']);
} else {
	$res = array("res" => "failed");
}

echo json_encode($res);