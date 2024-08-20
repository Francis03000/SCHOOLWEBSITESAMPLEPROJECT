<?php

include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->selectFullleftjoin("teachers", "teacher_positions", "teacher_position_id", "teacher_pos_id");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        try {
            $teacher_pos_id = $_POST["teacher_pos_id"];
            $teacher_profile = $_FILES['file']['name'];
            $teacher_fname = $_POST["teacher_fname"];
            $teacher_mname = $_POST["teacher_mname"];
            $teacher_lname = $_POST["teacher_lname"];
            $teacher_userName = $_POST["teacher_userName"];
            $teacher_Email = $_POST["teacher_Email"];
            $teacher_password = $_POST["teacher_password"];

            if (!file_exists("../../assets/images/teachers/" . $teacher_fname . "")) {
                mkdir("../../assets/images/teachers/" . $teacher_fname . "", 0777, true);
            }

            if (isset($_FILES['file']['name'])) {

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/teachers/" . $teacher_fname . "/" . $filename;
                $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);

                /* Valid extensions */
                $valid_extensions = array("jpg", "jpeg", "png");

                $response = 0;
                /* Check file extension */
                if (in_array(strtolower($imageFileType), $valid_extensions)) {
                    /* Upload file */
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                        $response = $location;
                    }
                }
            }

            $DBCRUDAPI->insert('teachers', ['teacher_pos_id' => $teacher_pos_id, 'teacher_profile' => $teacher_profile, 'teacher_fname' => $teacher_fname, 'teacher_mname' => $teacher_mname, 'teacher_lname' => $teacher_lname, 'teacher_userName' => $teacher_userName, 'teacher_Email' => $teacher_Email, 'teacher_password' => $teacher_password]);
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['update'])) {
        try {
            $teacher_id = $_POST["teacher_id"];
            $teacher_pos_id = $_POST["teacher_pos_id"];
            $teacher_profile = $_FILES['file']['name'];
            if (empty($teacher_profile)) {
                $teacher_profile = $_POST['update_img'];
            }

            $teacher_fname = $_POST["teacher_fname"];
            $teacher_mname = $_POST["teacher_mname"];
            $teacher_lname = $_POST["teacher_lname"];
            $teacher_userName = $_POST["teacher_userName"];
            $teacher_Email = $_POST["teacher_Email"];
            $teacher_password = $_POST["teacher_password"];

            unlink("../assets/images/teachers/" . $teacher_fname . "/" . $teacher_profile);
            if (!file_exists("../../assets/images/teachers/" . $teacher_fname . "")) {
                mkdir("../../assets/images/teachers/" . $teacher_fname . "", 0777, true);
            }

            if (isset($_FILES['file']['name'])) {

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/teachers/" . $teacher_fname . "/" . $filename;
                $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);

                /* Valid extensions */
                $valid_extensions = array("jpg", "jpeg", "png");

                $response = 0;
                /* Check file extension */
                if (in_array(strtolower($imageFileType), $valid_extensions)) {
                    /* Upload file */
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                        $response = $location;
                    }
                }
            }
            $DBCRUDAPI->update('teachers', ['teacher_pos_id' => $teacher_pos_id, 'teacher_profile' => $teacher_profile, 'teacher_fname' => $teacher_fname, 'teacher_mname' => $teacher_mname, 'teacher_lname' => $teacher_lname, 'teacher_userName' => $teacher_userName, 'teacher_Email' => $teacher_Email, 'teacher_password' => $teacher_password], "teacher_id='$teacher_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['delete'])) {
        try {
            $teacher_id = $_POST["teacher_id"];

            $DBCRUDAPI->delete('teachers', "teacher_id='$teacher_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    }
}


?>