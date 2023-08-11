<?php
session_start();
include("../conn.php");
extract($_POST);

$exmneId = $_SESSION['examineeSession']['exmne_id'];

$selExAttempt = $conn->query("SELECT * FROM exam_attempt WHERE exmne_id='$exmneId' AND exam_id='$exam_id'  ");

$selAns = $conn->query("SELECT * FROM exam_answers WHERE axmne_id='$exmneId' AND exam_id='$exam_id' ");

if ($selExAttempt->rowCount() > 0) {
	$res = array("res" => "alreadyTaken");
} else if ($selAns->rowCount() > 0) {
	$updLastAns = $conn->query("UPDATE exam_answers SET exans_status='old' WHERE axmne_id='$exmneId' AND exam_id='$exam_id'  ");
	if ($updLastAns) {
		if (!isset($_REQUEST['answer'])) {
			foreach ($_REQUEST['ques'] as $key => $value) {
				$insAns = $conn->query("INSERT INTO exam_answers(axmne_id,exam_id,quest_id) VALUES('$exmneId','$exam_id','$key')");
			}
		} else {
			foreach ($_REQUEST['answer'] as $key => $value) {
				$value = $value['correct'];
				$insAns = $conn->query("INSERT INTO exam_answers(axmne_id,exam_id,quest_id,exans_answer) VALUES('$exmneId','$exam_id','$key','$value')");
			}
		}
		if ($insAns) {
			$insAttempt = $conn->query("INSERT INTO exam_attempt(exmne_id,exam_id)  VALUES('$exmneId','$exam_id') ");
			if ($insAttempt) {
				// send result feedback
				$selResFeed = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id inner join exam_tbl et ON eqt.exam_id = et.ex_id WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$exam_id' AND ea.exans_status='new'");
				$countMarks = 0;
				$countTotalMarks = 0;
				$passMarks = 0;
				while ($resFeedRow = $selResFeed->fetch(PDO::FETCH_ASSOC)) {
					if ($resFeedRow['exam_answer'] == $resFeedRow['exans_answer']) {
						$countMarks += $resFeedRow['question_marks'];
					}
					$countTotalMarks += $resFeedRow['question_marks'];
					$passMarks = $resFeedRow['pass_marks'];
				}
				$ans = ($countMarks / $countTotalMarks) * 100;
				if (($passMarks <= $ans) == 1) {
					$conn->query("INSERT INTO exam_res_feedback(exmne_id,exam_id,grade) VALUES('$exmneId','$exam_id', 1) ");
				} else {
					$conn->query("INSERT INTO exam_res_feedback(exmne_id,exam_id,grade) VALUES('$exmneId','$exam_id', 0) ");
				}
				$res = array("res" => "success");
			} else {
				$res = array("res" => "failed");
			}
		} else {
			$res = array("res" => "failed");
		}
	}
} else {

	if (!isset($_REQUEST['answer'])) {
		foreach ($_REQUEST['ques'] as $key => $value) {
			$insAns = $conn->query("INSERT INTO exam_answers(axmne_id,exam_id,quest_id) VALUES('$exmneId','$exam_id','$key')");
		}
	} else {
		foreach ($_REQUEST['answer'] as $key => $value) {
			$value = $value['correct'];
			$insAns = $conn->query("INSERT INTO exam_answers(axmne_id,exam_id,quest_id,exans_answer) VALUES('$exmneId','$exam_id','$key','$value')");
		}
	}
	if ($insAns) {
		$insAttempt = $conn->query("INSERT INTO exam_attempt(exmne_id,exam_id)  VALUES('$exmneId','$exam_id') ");
		if ($insAttempt) {
			// send result feedback
			$selResFeed = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id inner join exam_tbl et ON eqt.exam_id = et.ex_id WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$exam_id' AND ea.exans_status='new'");
			$countMarks = 0;
			$countTotalMarks = 0;
			$passMarks;
			while ($resFeedRow = $selResFeed->fetch(PDO::FETCH_ASSOC)) {
				if ($resFeedRow['exam_answer'] == $resFeedRow['exans_answer']) {
					$countMarks += $resFeedRow['question_marks'];
				}
				$countTotalMarks += $resFeedRow['question_marks'];
				$passMarks = $resFeedRow['pass_marks'];
			}
			$ans = ($countMarks / $countTotalMarks) * 100;
			if (($passMarks <= $ans) == 1) {
				$conn->query("INSERT INTO exam_res_feedback(exmne_id,exam_id,grade) VALUES('$exmneId','$exam_id', 1) ");
			} else {
				$conn->query("INSERT INTO exam_res_feedback(exmne_id,exam_id,grade) VALUES('$exmneId','$exam_id', 0) ");
			}
			$res = array("res" => "success");
		} else {
			$res = array("res" => "failed");
		}
	} else {
		$res = array("res" => "failed");
	}
}

echo json_encode($res);