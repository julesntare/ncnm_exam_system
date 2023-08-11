<?php
include("../../../conn.php");

extract($_POST);

if ($timeLimit == "0") {
	$res = array("res" => "noSelectedTime");
} else {
	$start_time = date($starting_date . ' ' . $starting_time);
	$end_time = date($ending_date . ' ' . $ending_time);
	$insExam = $conn->query("INSERT INTO exam_tbl(ex_title,ex_time_limit,ex_description,pass_marks,exam_cost,starting_time,closing_at) VALUES('$examTitle','$timeLimit','$examDesc','$minmarks','$exam_cost','$start_time','$end_time') ");
	if ($insExam) {
		$res = array("res" => "success", "examTitle" => $examTitle);
	} else {
		$res = array("res" => "failed", "examTitle" => $examTitle);
	}
}

echo json_encode($res);