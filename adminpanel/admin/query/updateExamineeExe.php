<?php
include("../../../conn.php");
extract($_POST);

$updCourse = $conn->query("UPDATE tbl_users SET first_name='$exFirstname', last_name='$exLastname', gender='$exGender', email='$exEmail', mobile_no='$exMobile', status='$exStatus' WHERE id='$id' ");
if ($updCourse) {
	$res = array("res" => "success", "exFirstname" => $exFirstname);
} else {
	$res = array("res" => "failed");
}

echo json_encode($res);