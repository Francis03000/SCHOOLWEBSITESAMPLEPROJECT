<?php

include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->selectFullleftjoin("users", "permissions", "permission_id", "user_permission_id");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        try {
            $user_permission_id = $_POST["user_permission_id"];
            $user_profile = $_FILES['file']['name'];
            $user_fname = $_POST["user_fname"];
            $user_mname = $_POST["user_mname"];
            $user_lname = $_POST["user_lname"];
            $user_DOB = $_POST["user_DOB"];
            $user_address = $_POST["user_address"];
            $user_contact = $_POST["user_contact"];
            $user_username = $_POST["user_username"];
            $user_email = $_POST["user_email"];
            $user_password = $_POST["user_password"];
            if (!file_exists("../../assets/images/users/" . $user_fname . "")) {
                mkdir("../../assets/images/users/" . $user_fname . "", 0777, true);
            }

            if (isset($_FILES['file']['name'])) {

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/users/" . $user_fname . "/" . $filename;
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

            $DBCRUDAPI->insert('users', ['user_permission_id ' => $user_permission_id, 'user_profile' => $user_profile, 'user_fname' => $user_fname, 'user_mname' => $user_mname, 'user_lname' => $user_lname, 'user_DOB' => $user_DOB, 'user_address' => $user_address, 'user_contact' => $user_contact, 'user_username ' => $user_username, 'user_email ' => $user_email, 'user_password ' => $user_password,]);
            echo json_encode(array("success" => true));

        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['update'])) {
        try {
            $user_id = $_POST["user_id"];
            $user_permission_id = $_POST["user_permission_id"];
            $user_profile = $_FILES['file']['name'];
            if (empty($user_profile)) {
                $user_profile = $_POST['update_img'];
            }
            $user_fname = $_POST["user_fname"];
            $user_mname = $_POST["user_mname"];
            $user_lname = $_POST["user_lname"];
            $user_DOB = $_POST["user_DOB"];
            $user_address = $_POST["user_address"];
            $user_contact = $_POST["user_contact"];
            $user_username = $_POST["user_username"];
            $user_email = $_POST["user_email"];
            $user_password = $_POST["user_password"];
            unlink("../assets/images/users/" . $user_fname . "/" . $user_profile);
            if (!file_exists("../../assets/images/users/" . $user_fname . "")) {
                mkdir("../../assets/images/users/" . $user_fname . "", 0777, true);
            }

            if (isset($_FILES['file']['name'])) {

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/users/" . $user_fname . "/" . $filename;
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
            $DBCRUDAPI->update('users', ['user_permission_id ' => $user_permission_id, 'user_profile' => $user_profile, 'user_fname' => $user_fname, 'user_mname' => $user_mname, 'user_lname' => $user_lname, 'user_DOB' => $user_DOB, 'user_address' => $user_address, 'user_contact' => $user_contact, 'user_username ' => $user_username, 'user_email ' => $user_email,], "user_id='$user_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['delete'])) {
        try {
            $user_id = $_POST["user_id"];

            $DBCRUDAPI->delete('users', "user_id='$user_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    }
}


?>