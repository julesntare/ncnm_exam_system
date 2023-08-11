<?php
include("../conn.php");
ob_start();

$email = $_POST['email'];
$response = array();

// check if email not already registered
$email_query = $conn->query("SELECT * FROM tbl_users WHERE email='$email'");
$row_length = $email_query->rowCount();
if (isset($_POST['mail_only']) && ($row_length > 0)) {
    $response['status'] = 403;
    $response['msg'] = "Whoops! Email is already exists";
}

if (!isset($_POST['mail_only'])) {
    if ($row_length > 0) {
        $response['status'] = 403;
        $response['msg'] = "Whoops! User is already registered.";
    } else {
        $f_name = $_POST['first_name'];
        $l_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $mobile_no = $_POST['mobile_no'];
        $password = md5($_POST['password']);
        $sector_id = $_POST['sectors_cont'];
        $nid_doc_id = $_FILES['nid_input']['name'];
        $certificate_doc_id = $_FILES['cert_input']['name'];

        // upload profile picture
        $target_dir = "../assets/image_uploader/";
        $temp = explode(".", $_FILES["passport_upload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $target_file = $target_dir . $newfilename;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["passport_upload"]["tmp_name"]);
        if ($check == false) {
            $response['status'] = 403;
            $response['msg'] = "Whoops! File is not an image.";
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $response['status'] = 403;
            $response['msg'] = "Whoops! Sorry, file already exists.";
        }

        // Check file size
        if ($_FILES["passport_upload"]["size"] > 500000) {
            $response['status'] = 403;
            $response['msg'] = "Whoops! Sorry, your file is too large.";
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $response['status'] = 403;
            $response['msg'] = "Whoops! Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            if (move_uploaded_file($_FILES["passport_upload"]["tmp_name"], $target_file)) {
                $q3 = $conn->query("INSERT INTO tbl_users(first_name, last_name, gender, mobile_no, email, password, sector_id, NID_doc, certificate_doc, pass_photo) VALUES ('$f_name', '$l_name', '$gender', '$mobile_no', '$email', '$password', '$sector_id', '$nid_doc_id', '$certificate_doc_id', '$newfilename')");
                if ($q3) {
                    session_start();
                    $_SESSION['examineeSession'] = array(
                        'exmne_id' => $conn->lastInsertId(),
                        'examineenakalogin' => true
                    );
                    $response['status'] = 201;
                    $response['msg'] = "Yay! You are successfully added.";
                } else {
                    $response['status'] = 500;
                    $response['msg'] = "Whoops! Something went wrong. Please try again";
                }
            } else {
                $response['status'] = 500;
                $response['msg'] = "Whoops! Image not uploaded. Please try again";
            }
        }
    }
}
echo json_encode($response);

ob_end_flush();