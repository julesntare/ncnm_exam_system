<?php
session_start();
include("../conn.php");
extract($_POST);
$exmneId = $_SESSION['examineeSession']['exmne_id'];

$exam_que = $conn->query("SELECT * FROM exam_tbl where ex_id='$appl_id'")->fetch(PDO::FETCH_ASSOC);
$examne_que = $conn->query("SELECT * FROM tbl_users where id='$exmneId'")->fetch(PDO::FETCH_ASSOC);

//* Prepare our rave request
$request = [
	'tx_ref' => time(),
	'amount' => $exam_que['exam_cost'],
	'currency' => 'RWF',
	'payment_options' => 'mobile_money_rwanda',
	'redirect_url' => 'http://localhost/ncnm_exam_system/query/process.php?app_id=' . $appl_id,
	'customer' => [
		'email' => $examne_que['email'],
		'name' => $examne_que['first_name'] . ' ' . $examne_que['last_name']
	],
	'meta' => [
		'price' => $exam_que['exam_cost']
	],
	'customizations' => [
		'title' => 'Paying NCNM ' . $exam_que['ex_title'] . ' Exam',
		'description' => 'This is the payment for requesting exam seat'
	]
];

//* Calling flutterwave endpoint
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => json_encode($request),
	CURLOPT_HTTPHEADER => array(
		'Authorization: Bearer FLWSECK-39c2f16c809817b20ec468e1be76ab89-X',
		'Content-Type: application/json'
	),
));

$response = curl_exec($curl);

curl_close($curl);

$res = json_decode($response);
if ($res->status == 'success') {
	$link = $res->data->link;
	header('Location: ' . $link);
} else {
	echo 'We can not process your payment';
}

echo json_encode($res->status);