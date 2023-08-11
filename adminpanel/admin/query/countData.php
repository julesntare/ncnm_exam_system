<?php
// Count All Exam
$selExam = $conn->query("SELECT COUNT(ex_id) as totExam FROM exam_tbl ")->fetch(PDO::FETCH_ASSOC);
// Count All Users
$selUsers = $conn->query("SELECT COUNT(*) as totUsers FROM tbl_users ")->fetch(PDO::FETCH_ASSOC);