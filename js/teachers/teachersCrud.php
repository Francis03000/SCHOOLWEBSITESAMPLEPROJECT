<?php

include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {

    $DBCRUDAPI->selectFullleftjointeacher("teachers", "teacher_positions", "teacher_position_id", "teacher_pos_id", "WHERE teacher_pos_id = 15 || teacher_pos_id = 21 || teacher_pos_id = 22 ");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getData1'])) {
    $DBCRUDAPI->selectFullleftjointeacher("teachers", "teacher_positions", "teacher_position_id", "teacher_pos_id", "WHERE teacher_pos_id = 12 || teacher_pos_id = 19 || teacher_pos_id = 20 ");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getData2'])) {
    $DBCRUDAPI->selectFullleftjointeacher("teachers", "teacher_positions", "teacher_position_id", "teacher_pos_id", "WHERE teacher_pos_id = 16 || teacher_pos_id = 17 || teacher_pos_id = 18");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getData3'])) {
    $DBCRUDAPI->selectFullleftjointeacher("teachers", "teacher_positions", "teacher_position_id", "teacher_pos_id", "WHERE teacher_pos_id = 5 || teacher_pos_id = 14 || teacher_pos_id = 13");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getData5'])) {
    $DBCRUDAPI->selectFullleftjointeacher("teachers", "teacher_positions", "teacher_position_id", "teacher_pos_id", "WHERE teacher_pos_id = 11");
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
            $teacher_DOB = $_POST["teacher_DOB"];
            $teacher_address = $_POST["teacher_address"];
            $teacher_contact = $_POST["teacher_contact"];

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

            $DBCRUDAPI->insert('teachers', ['teacher_pos_id' => $teacher_pos_id, 'teacher_profile' => $teacher_profile, 'teacher_fname' => $teacher_fname, 'teacher_mname' => $teacher_mname, 'teacher_lname' => $teacher_lname, 'teacher_DOB' => $teacher_DOB, 'teacher_address' => $teacher_address, 'teacher_contact' => $teacher_contact]);
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['update'])) {
        try {
            $teacher_id = $_POST["teacher_id"];
            $teacher_pos_id = $_POST["teacher_pos_id"];
            $teacher_profile = $_FILES['file']['name'];
            $teacher_fname = $_POST["teacher_fname"];
            $teacher_mname = $_POST["teacher_mname"];
            $teacher_lname = $_POST["teacher_lname"];
            $teacher_DOB = $_POST["teacher_DOB"];
            $teacher_address = $_POST["teacher_address"];
            $teacher_contact = $_POST["teacher_contact"];
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
            $DBCRUDAPI->update('teachers', ['teacher_pos_id' => $teacher_pos_id, 'teacher_profile' => $teacher_profile, 'teacher_fname' => $teacher_fname, 'teacher_mname' => $teacher_mname, 'teacher_lname' => $teacher_lname, 'teacher_DOB' => $teacher_DOB, 'teacher_address' => $teacher_address, 'teacher_contact' => $teacher_contact], "teacher_id='$teacher_id'");
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