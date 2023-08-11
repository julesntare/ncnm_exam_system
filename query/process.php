<?php
session_start();
include("../conn.php");
extract($_GET);


include('../vendor/autoload.php');

// mailer script
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "jb3butagatifu@gmail.com";
$mail->Password   = "miyove12";

$options = array(
    'cluster' => 'ap2',
    'useTLS' => true
);
$pusher = new Pusher\Pusher(
    'bdd6a9f7643a508c6c3d',
    '986328fd52be3af6097f',
    '1313745',
    $options
);

$exmneSess = $_SESSION['examineeSession']['exmne_id'];

if (isset($_GET['status'])) {
    //* check payment status
    if ($_GET['status'] == 'cancelled') {
        // echo 'YOu cancel the payment';
        header('Location: ../exams-list.php');
    } elseif ($_GET['status'] == 'successful') {
        $txid = $_GET['transaction_id'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK-39c2f16c809817b20ec468e1be76ab89-X"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $res = json_decode($response);
        if ($res->status) {
            $amountPaid = $res->data->charged_amount;
            $amountToPay = $res->data->meta->price;
            if ($amountPaid >= $amountToPay) {
                $loadApp = $conn->query("SELECT * from exam_application where exam_id = '$app_id' and examne_id = '$exmneSess' ");
                if ($loadApp->rowCount() > 0) {
                    echo 'failed';
                } else {
                    $updAppl = $conn->query("INSERT INTO exam_application(exam_id,examne_id, is_paid) VALUES('$app_id','$exmneSess',1)");

                    if ($updAppl) {
                        $exAppl = $conn->lastInsertId();
                        // push to specific examinee
                        $loadExApp = $conn->query("SELECT *, ea.id as app_id from exam_application ea inner join tbl_users tu on ea.examne_id = tu.id  where ea.id = '$exAppl' ")->fetch(PDO::FETCH_ASSOC);
                        $data['message'] = $loadExApp['app_id'];
                        $pusher->trigger('my-channel', 'my-event', $data);

                        $mail->IsHTML(true);
                        $mail->AddAddress($loadExApp['email'], "NCNM Exam Platform");
                        $mail->SetFrom("your email", "NCNM Exam Platform");
                        $mail->Subject = "NCNM application approval";
                        $content = "<b>This is to confirm that you are now allowed to attempt exam whenever it starts. \n\nThank you</b>";

                        $mail->MsgHTML($content);

                        echo 'success';
                        header('Location: ../home.php?page=manage-applications');
                    }
                }
            } else {
                $insFedd = $conn->query("INSERT INTO exam_application(exam_id,examne_id, is_paid) VALUES('$app_id','$exmneSess',0) ");
                echo 'failed';
            }
        } else {
            echo 'failed';
        }
    } elseif ($_GET['status'] == 'failed') {
        header('Location: ../home.php?page=exams-list');
    }
}