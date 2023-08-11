<?php
date_default_timezone_set("Africa/Kigali");
$exmneId = $_SESSION['examineeSession']['exmne_id'];
$today_time = date('Y-m-d H:i:s');

$selExmneeData = $conn->query("SELECT * FROM tbl_users WHERE id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);

$selExam = $conn->query("SELECT * FROM exam_tbl ORDER BY ex_created DESC ");

$selTotalExam = $conn->query("SELECT COUNT(ex_id) as totExam FROM exam_tbl ")->fetch(PDO::FETCH_ASSOC);

$selTaken = $conn->query("SELECT * FROM exam_attempt ea inner join exam_tbl et on ea.exam_id = et.ex_id  where exmne_id = '$exmneId' ORDER BY exam_attempt_date DESC ");

$resSelTaken = $conn->query("SELECT * FROM exam_attempt ea inner join exam_tbl et on ea.exam_id = et.ex_id  where exmne_id = '$exmneId' and res_accessed = 0 ORDER BY exam_attempt_date DESC ");

$selAvailExam = $conn->query("SELECT * FROM exam_tbl where closing_at > '$today_time' and status = 0 ORDER BY starting_time DESC ");

$selAprrovedExams = $conn->query("SELECT *, ea.id as app_id FROM exam_application ea inner join exam_tbl et on ea.exam_id = et.ex_id inner join tbl_users tu on ea.examne_id = tu.id where is_paid = 1 and closing_at > NOW() and et.status = 0 order by starting_time DESC");

$resAppsNotif = $conn->query("SELECT exam_id, ex_title, is_paid, ea.id as app_id FROM exam_application ea inner join exam_tbl et on ea.exam_id = et.ex_id where examne_id = '$exmneId' and is_accessed = 0 ORDER BY applied_on DESC ");