<?php

include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->selectFullleftjoin("announcements", "categories", "category_id", "announcement_category_id");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getData2'])) {
    $whereC = " ORDER BY announcements.created_at DESC LIMIT 3";
    $DBCRUDAPI->selectFullleftjoin("announcements", "categories", "category_id", "announcement_category_id");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataAnnounce'])) {
    $whereC = "announcements.created_at >= DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY announcements.created_at DESC LIMIT 3";
    $DBCRUDAPI->selectFullleftjoin("announcements", "categories", "category_id", "announcement_category_id", $whereC);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataAnnouncements'])) {
    $whereC = "announcements.created_at >= DATE_SUB(NOW(), INTERVAL 3 MONTH) ORDER BY announcements.created_at DESC LIMIT 8";
    $DBCRUDAPI->selectFullleftjoin("announcements", "categories", "category_id", "announcement_category_id", $whereC);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataHeadline'])) {
    $whereC = " announcements.headline = 'yes' ORDER BY announcements.created_at DESC LIMIT 3";
    $DBCRUDAPI->selectFullleftjoinannounce("announcements", "categories", "category_id", "announcement_category_id", "$whereC");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataCat'])) {
    $announcement_category_id = $_GET["announcement_category_id"];
    $where = "announcement_category_id = '$announcement_category_id' AND announcements.created_at >= DATE_SUB(NOW(), INTERVAL 3 MONTH) ORDER BY announcements.created_at ";

    $DBCRUDAPI->selectFullleftjoin("announcements", "categories", "category_id", "announcement_category_id", $where);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {


        try {
            $announcement_image = $_FILES['file']['name'];
            $announcement_category_id = $_POST["announcement_category_id"];
            $announcement_title = $_POST["announcement_title"];
            $announcement_description = $_POST["announcement_description"];
            $headline = $_POST["headline"];
            $created_at = $_POST["created_at"];



            if (!file_exists("../../assets/images/announcements/" . $announcement_category_id . "")) {
                mkdir("../../assets/images/announcements/" . $announcement_category_id . "", 0777, true);
            }

            if (isset($_FILES['file']['name'])) {

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/announcements/" . $announcement_category_id . "/" . $filename;
                $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);

                /* Valid extensions */
                $valid_extensions = array("jpg", "jpeg", "png", "gif");

                $response = 0;
                /* Check file extension */
                if (in_array(strtolower($imageFileType), $valid_extensions)) {
                    /* Upload file */
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                        $response = $location;
                    }
                }
            }

            $DBCRUDAPI->insert('announcements', ['announcement_category_id' => $announcement_category_id, 'announcement_image' => $announcement_image, 'announcement_title' => $announcement_title, 'announcement_description' => $announcement_description, 'headline' => $headline, 'created_at' => $created_at]);
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['update'])) {
        try {
            $announcement_id = $_POST["announcement_id"];
            $announcement_category_id = $_POST["announcement_category_id"];
            $announcement_image = $_FILES['file']['name'];
            $created_at = $_POST["created_at"];

            if (empty($announcement_image)) {
                $announcement_image = $_POST['update_img'];
            }

            $announcement_title = $_POST["announcement_title"];
            $announcement_description = $_POST["announcement_description"];
            $headline = $_POST["headline"];



            if (!file_exists("../../assets/images/announcements/" . $announcement_category_id . "")) {
                mkdir("../../assets/images/announcements/" . $announcement_category_id . "", 0777, true);
            }

            if (isset($_FILES['file']['name'])) {

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/announcements/" . $announcement_category_id . "/" . $filename;
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


            $DBCRUDAPI->update('announcements', ['announcement_category_id' => $announcement_category_id, 'announcement_image' => $announcement_image, 'announcement_title' => $announcement_title, 'announcement_description' => $announcement_description, 'headline' => $headline, 'updated_at' => $created_at], "announcement_id ='$announcement_id '");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['delete'])) {
        try {
            $announcement_id = $_POST["announcement_id"];

            $DBCRUDAPI->delete('announcements', "announcement_id ='$announcement_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    }
}


?>