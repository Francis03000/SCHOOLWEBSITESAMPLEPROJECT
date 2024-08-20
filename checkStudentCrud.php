<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include_once('API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_POST['checkStud'])) {

    $std_lrn = $_POST['lrn'];
    $year = $_POST['year'];
    $whereClause = "student_LRN='" . $std_lrn . "'AND student_grades.year='" . $year . "'";
    $DBCRUDAPI->selectleftjoinauth3($whereClause);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);

} else if (isset($_POST['updateStudent'])) {
    $student_id = $_POST['student_id'];
    $code = $_POST['code'];
    $code2 = $_POST['code2'];


    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'whatscrazy12@gmail.com';
    $mail->Password = 'daphcgcdirmyoebh';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('whatscrazy12@gmail.com');
    $mail->addAddress($_POST["student_email"]);

    $mail->isHTML(true);

    $mail->Name = "RCNHS GRADES Verification Code";
    $mail->Subject = "RCNHS GRADES Verification Code";
    $mail->Body = "Your one time use code: " . $code2;

    $mail->send();

    $DBCRUDAPI->update('student', ['student_password' => $code], "student_id='$student_id'");
    echo json_encode(array("success" => true));

} else if (isset($_POST['checkStudCode'])) {

    $emailcode = $_POST['emailcode'];
    $student_id = $_POST['student_id'];



    $DBCRUDAPI->select("student", "*", "student_id = '$student_id' AND student_password = '$emailcode'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);

}

?>