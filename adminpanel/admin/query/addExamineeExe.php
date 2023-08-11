<?php
include("../../../conn.php");

extract($_POST);

$selExamineeEmail = $conn->query("SELECT * FROM tbl_users WHERE email='$email' ");

if ($selExamineeEmail->rowCount() > 0) {
	$res = array("res" => "emailExist", "msg" => $email);
} else if ($password != $cpassword) {
	$res = array("res" => "passwordNotMatch", "msg" => "Passwords not match!");
} else {
	$insData = $conn->query("INSERT INTO tbl_users(first_name,last_name,gender,mobile_no,email,password) VALUES('$first_name','$last_name','$gender','$mobile','$email','$password') ");
	if ($insData) {
		$res = array("res" => "success", "msg" => $email);
	} else {
		$res = array("res" => "failed");
	}
}

echo json_encode($res);