<?php
include("../../../conn.php");

include('../vendor/autoload.php');

// mailer script
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require '../PHPMailer/src/Exception.php';
// require '../PHPMailer/src/PHPMailer.php';
// require '../PHPMailer/src/SMTP.php';

// $mail = new PHPMailer();
// $mail->IsSMTP();
// $mail->Mailer = "smtp";

// $mail->SMTPDebug  = 1;
// $mail->SMTPAuth   = TRUE;
// $mail->SMTPSecure = "tls";
// $mail->Port       = 587;
// $mail->Host       = "smtp.gmail.com";
// $mail->Username   = "your email";
// $mail->Password   = "your email password";

// $options = array(
//   'cluster' => 'ap2',
//   'useTLS' => true
// );
// $pusher = new Pusher\Pusher(
//   'bdd6a9f7643a508c6c3d',
//   '986328fd52be3af6097f',
//   '1313745',
//   $options
// );

extract($_POST);

$updAppl = $conn->query("UPDATE exam_application SET is_paid = '$applStatus' WHERE id='$exAppl' ");

if ($updAppl) {
  $res = array("res" => "success");

  // push to specific examinee
  // $loadExApp = $conn->query("SELECT * from exam_application where id = '$exAppl' ")->fetch(PDO::FETCH_ASSOC);
  // $data['message'] = $loadExApp['id'];
  // $pusher->trigger('my-channel', 'my-event', $data);

  // $mail->IsHTML(true);
  // $mail->AddAddress("recipient email", "NCNM Exam Platform");
  // $mail->SetFrom("your email", "NCNM Exam Platform");
  // $mail->Subject = "NCNM application approval";
  // $content = "<b>This is to confirm that you are now allowed to attempt exam whenever it starts. \n\nThank you</b>";

  // $mail->MsgHTML($content);
  // if (!$mail->Send()) {
  //   $res = array("res" => "failed");
  // }
} else {
  $res = array("res" => "failed");
}

echo json_encode($res);