<?php
session_start();
include_once('../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../sendemail/phpmailer/src/Exception.php';
require '../sendemail/phpmailer/src/PHPMailer.php';
require '../sendemail/phpmailer/src/SMTP.php';
function send_password_reset($get_name, $get_email, $token)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'whatscrazy12@gmail.com';
    $mail->Password = 'daphcgcdirmyoebh';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('whatscrazy12@gmail.com', $get_name);

    $mail->addAddress($get_email);

    $mail->isHTML(true);

    $mail->Subject = "Reset Password Notification";

    $email_template = "<a href='http://localhost/RCNHSWEBSITE/login/password-change.php?token=$token&email=$get_email'>Click me</a> ";

    $mail->Body = $email_template;
    $mail->send();
}


if (isset($_POST['password_reset_link'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);

    if (mysqli_num_rows($check_email_run) > 0)
        ; {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email'];

        $update_token = "UPDATE users SET user_isVerified='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if ($update_token_run) {
            send_password_reset($get_name, $get_email, $token);
            $_SESSION['status'] = "We emailed you a password reset link";
            header("Location: password-reset.php");
            exit(0);
        } else {
            $_SESSION['status'] = "Something went wrong. #1";
            header("Location: password-reset.php");
            exit(0);
        }
    }

}


?>