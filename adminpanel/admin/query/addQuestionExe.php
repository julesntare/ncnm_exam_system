<?php
include("../../../conn.php");

extract($_POST);

$selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId' AND exam_question='$question' ");
if ($selQuest->rowCount() > 0) {
	$res = array("res" => "exist", "msg" => $question);
} else {
	$insQuest = $conn->query("INSERT INTO exam_question_tbl(exam_id,exam_question,question_marks,exam_ch1,exam_ch2,exam_ch3,exam_ch4,exam_answer) VALUES('" . $examId . "','" . $question . "','" . $question_marks . "','" . $choice_A . "','" . $choice_B . "','" . $choice_C . "','" . $choice_D . "','" . $correctAnswer . "') ");

	if ($insQuest) {
		$res = array("res" => "success", "msg" => $question);
	} else {
		$res = array("res" => "failed");
	}
}

echo json_encode($res);