<?php

include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->selectFullleftjoin("galleries", "categories", "category_id", "gallery_category_id");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);

} else if (isset($_GET['getData2'])) {
    $cur_Year = $_GET['cur_Year'];
    $DBCRUDAPI->selectFullleftjoin("galleries", "categories", "category_id", "gallery_category_id", "galleries.created_at LIKE '%$cur_Year%'");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);

} else if (isset($_GET['getDataCat'])) {
    $gallery_category_id = $_GET['gallery_category_id'];
    $where = "gallery_category_id = '$gallery_category_id' ";
    $DBCRUDAPI->selectFullleftjoin("galleries", "categories", "category_id", "gallery_category_id", $where);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);

} else if (isset($_GET['getDataHeadline'])) {
    $whereC = "gallery_id != '' ORDER BY galleries.created_at DESC LIMIT 12";
    $DBCRUDAPI->selectFullleftjoin("galleries", "categories", "category_id", "gallery_category_id", $whereC);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataGalYear'])) {

    $DBCRUDAPI->selectGalYear();
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        try {
            $gallery_image = $_FILES['file']['name'];
            $gallery_category_id = $_POST["gallery_category_id"];

            if (!file_exists("../../assets/images/gallery/" . $gallery_category_id . "")) {
                mkdir("../../assets/images/gallery/" . $gallery_category_id . "", 0777, true);
            }

            if (isset($_FILES['file']['name'])) {

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/gallery/" . $gallery_category_id . "/" . $filename;
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
            $DBCRUDAPI->insert('galleries', ['gallery_category_id' => $gallery_category_id, 'gallery_image' => $gallery_image]);
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['update'])) {
        try {
            $gallery_id = $_POST["gallery_id"];
            $gallery_category_id = $_POST["gallery_category_id"];
            $gallery_image = $_FILES['file']['name'];
            if (empty($gallery_image)) {
                $gallery_image = $_POST['update_img'];
            }

            if (!file_exists("../../assets/images/gallery/" . $gallery_category_id . "")) {
                mkdir("../../assets/images/gallery/" . $gallery_category_id . "", 0777, true);
            }

            if (isset($_FILES['file']['name'])) {

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/gallery/" . $gallery_category_id . "/" . $filename;
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
            $DBCRUDAPI->update('galleries', ['gallery_category_id' => $gallery_category_id, 'gallery_image' => $gallery_image], "gallery_id ='$gallery_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['delete'])) {
        try {
            $gallery_id = $_POST["gallery_id"];

            $DBCRUDAPI->delete('galleries', "gallery_id='$gallery_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    }
}


?>