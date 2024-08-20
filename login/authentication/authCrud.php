<?php

session_start();
include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_POST['loginUser'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $whereClause = "user_username='" . $username . "'AND user_password='" . $password . "' || user_email='" . $username . "'AND user_password='" . $password . "'";
    $DBCRUDAPI->selectleftjoinauth($whereClause);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $_SESSION['userFullname'] = strtoupper($datass['user_fname'] . " " . $datass['user_mname'] . " " . $datass['user_lname']);
        $_SESSION['userRoleName'] = $datass['permission_name'];
        $_SESSION['userRoleId'] = $datass['user_permission_id'];
        $_SESSION['user_active_id'] = $datass['user_id'];
        $_SESSION['userEmail'] = $datass['user_email'];
        $_SESSION['userProfile'] = $datass['user_profile'];
        $_SESSION['userContact'] = $datass['user_contact'];
        $_SESSION['userAddress'] = $datass['user_address'];
        $_SESSION['userDOB'] = $datass['user_DOB'];
        $_SESSION['fName'] = $datass['user_fname'];




        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_POST['loginUser2'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $whereClause = "teacher_userName='" . $username . "'AND teacher_password='" . $password . "' || teacher_Email='" . $username . "'AND teacher_password='" . $password . "'";

    $DBCRUDAPI->selectleftjoinauth2($whereClause);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        // $_SESSION['userFullname'] = strtoupper($datass['student_Fname'] . " " . $datass['student_Mname'] . " " . $datass['student_Lname']);
        // $_SESSION['studentLRN'] = $datass['student_LRN'];
        // $_SESSION['studentGrades'] = $datass['grades'];
        // $_SESSION['studentEmail'] = $datass['student_email'];
        // $_SESSION['studentId'] = $datass['student'];


        // $_SESSION['studentSec'] = $datass['strand_acronym'] . " " . $datass['section_name'];



        $_SESSION['userRoleId'] = "-1";




        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_POST['logoutUser'])) {
    session_destroy();
}

?>