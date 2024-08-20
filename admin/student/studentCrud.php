<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->selectFullleftjoin4();
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataWhere'])) {
    $section = $_GET['section'];
    $DBCRUDAPI->selectFullleftjoin4("student.student_section = '$section'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataStudent'])) {
    $section = $_GET['section'];
    $DBCRUDAPI->selectFullleftjoin4("student.student_section = '$section'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        try {

            $student_Fname = $_POST["student_Fname"];
            $student_Mname = $_POST["student_Mname"];
            $student_Lname = $_POST["student_Lname"];
            $student_Address = $_POST["student_Address"];
            $student_LRN = $_POST["student_LRN"];
            $student_email = $_POST["student_email"];
            $student_password = $_POST["student_password"];
            $student_section = $_POST["student_section"];


            // $mail = new PHPMailer(true);

            // $mail->isSMTP();
            // $mail->Host = 'smtp.gmail.com';
            // $mail->SMTPAuth = true;
            // $mail->Username = 'whatscrazy12@gmail.com';
            // $mail->Password = 'daphcgcdirmyoebh';
            // $mail->SMTPSecure = 'ssl';
            // $mail->Port = 465;

            // $mail->setFrom('whatscrazy12@gmail.com');
            // $mail->addAddress($_POST["student_email"]);

            // $mail->isHTML(true);

            // $mail->Name = "LPBNHS Student Password";
            // $mail->Subject = "LPBNHS Student Password";
            // $mail->Body = "Your password: " . $_POST["dec_password"];

            // $mail->send();

            $DBCRUDAPI->insert('student', ['student_Fname' => $student_Fname, 'student_Mname' => $student_Mname, 'student_Lname' => $student_Lname, 'student_Address' => $student_Address, 'student_LRN' => $student_LRN, 'student_email' => $student_email, 'student_section' => $student_section]);
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['update'])) {
        try {
            $student_id = $_POST["student_id"];
            $student_Fname = $_POST["student_Fname"];
            $student_Mname = $_POST["student_Mname"];
            $student_Lname = $_POST["student_Lname"];
            $student_Address = $_POST["student_Address"];
            $student_LRN = $_POST["student_LRN"];
            $student_email = $_POST["student_email"];
            $student_password = $_POST["student_password"];
            $student_section = $_POST["student_section"];

            $DBCRUDAPI->update('student', ['student_Fname' => $student_Fname, 'student_Mname' => $student_Mname, 'student_Lname' => $student_Lname, 'student_Address' => $student_Address, 'student_LRN' => $student_LRN, 'student_email' => $student_email, 'student_section' => $student_section], "student_id='$student_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['delete'])) {
        try {
            $student_id = $_POST["student_id"];

            $DBCRUDAPI->delete('student', "student_id='$student_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    }
}


?>