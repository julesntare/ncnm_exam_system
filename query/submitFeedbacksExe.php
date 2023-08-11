<?php
session_start();
include("../conn.php");
extract($_POST);

$exmneSess = $_SESSION['examineeSession']['exmne_id'];

$selMyFeedbacks = $conn->query("SELECT * FROM feedbacks_tbl WHERE exmne_id='$exmneSess' ");
$insFedd = $conn->query("INSERT INTO feedbacks_tbl(exmne_id,fb_exmne_subject,fb_feedbacks) VALUES('$exmneSess','$fb_subject','$myFeedbacks') ");

if ($insFedd) {
	$res = array("res" => "success");
} else {
	$res = array("res" => "failed");
}

echo json_encode($res);