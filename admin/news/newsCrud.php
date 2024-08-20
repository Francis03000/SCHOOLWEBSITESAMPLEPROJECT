<?php

include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->selectFullleftjoin("news", "categories", "category_id", "news_category_id");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataNews'])) {
    $whereC = "ORDER BY news.created_at DESC LIMIT 3";
    $DBCRUDAPI->selectFullleftjoin("news", "categories", "category_id", "news_category_id", $whereC);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataAnnounce'])) {
    $whereC = "news.created_at >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
    $DBCRUDAPI->selectFullleftjoin("news", "categories", "category_id", "news_category_id", "$whereC");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataHeadline'])) {
    $whereC = " news.headline = 'yes' ORDER BY news.created_at DESC LIMIT 3";
    $DBCRUDAPI->selectFullleftjoin("news", "categories", "category_id", "news_category_id", "$whereC");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataCat'])) {
    $news_category_id = $_GET["news_category_id"];
    $where = "news_category_id = '$news_category_id' AND news.created_at >= DATE_SUB(NOW(), INTERVAL 3 MONTH)";

    $DBCRUDAPI->selectFullleftjoin("news", "categories", "category_id", "news_category_id", $where);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {


        try {
            $news_image = $_FILES['file']['name'];
            $news_category_id = $_POST["news_category_id"];
            $news_title = $_POST["news_title"];
            $news_description = $_POST["news_description"];
            $headline = $_POST["headline"];



            if (!file_exists("../../assets/images/news/" . $news_category_id . "")) {
                mkdir("../../assets/images/news/" . $news_category_id . "", 0777, true);
            }

            if (isset($_FILES['file']['name'])) {

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/news/" . $news_category_id . "/" . $filename;
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

            $DBCRUDAPI->insert('news', ['news_category_id' => $news_category_id, 'news_image' => $news_image, 'news_title' => $news_title, 'news_description' => $news_description, 'headline' => $headline]);
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['update'])) {
        try {
            $news_id = $_POST["news_id"];


            $news_category_id = $_POST["news_category_id"];
            $news_image = $_FILES['file']['name'];
            if (empty($news_image)) {
                $news_image = $_POST['update_img'];
            }

            $news_title = $_POST["news_title"];
            $news_description = $_POST["news_description"];
            $headline = $_POST["headline"];


            if (!file_exists("../../assets/images/news/" . $news_category_id . "")) {
                mkdir("../../assets/images/news/" . $news_category_id . "", 0777, true);
            }

            if (isset($_FILES['file']['name'])) {

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/news/" . $news_category_id . "/" . $filename;
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


            $DBCRUDAPI->update('news', ['news_category_id' => $news_category_id, 'news_image' => $news_image, 'news_title' => $news_title, 'news_description' => $news_description, 'headline' => $headline], "news_id ='$news_id '");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['delete'])) {
        try {
            $news_id = $_POST["news_id"];

            $DBCRUDAPI->delete('news', "news_id ='$news_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    }
}


?>