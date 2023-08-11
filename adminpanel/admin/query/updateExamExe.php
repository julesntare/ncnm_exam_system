<?php
include("../../../conn.php");

extract($_POST);

$start_time = date($starting_date . ' ' . $starting_time);
$end_time = date($ending_date . ' ' . $ending_time);

$updExam = $conn->query("UPDATE exam_tbl SET ex_title='$examTitle', ex_time_limit='$examLimit', pass_marks='$minmarks', ex_description='$examDesc', exam_cost = '$exam_cost', starting_time = '$start_time',
closing_at = '$end_time', status = '$status' WHERE ex_id='$examId' ");

if ($updExam) {
  $res = array("res" => "success", "msg" => $examTitle);
} else {
  $res = array("res" => "failed");
}

echo json_encode($res);