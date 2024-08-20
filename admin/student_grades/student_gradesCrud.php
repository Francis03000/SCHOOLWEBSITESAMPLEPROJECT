<?php

include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->selectFullleftjoinstudentGrades();
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        try {


            $grades = $_FILES['file']['name'];
            $student = $_POST["student"];
            $section = $_POST["section"];
            $grading = $_POST["grading"];
            $year = $_POST["year"];


            if (!file_exists("../../assets/images/grades/" . $student . "")) {
                mkdir("../../assets/images/grades/" . $student . "", 0777, true);
            }

            if (isset($_FILES['file']['name'])) {

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/grades/" . $student . "/" . $filename;
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
            $DBCRUDAPI->insert('student_grades', ['section' => $section, 'student' => $student, 'grading' => $grading, 'year' => $year, 'grades' => $grades]);
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['update'])) {
        try {
            $grades = $_FILES['file']['name'];
            if (empty($grades)) {
                $grades = $_POST['update_img'];
            }
            $students_grades_id = $_POST["students_grades_id"];
            $section = $_POST["section"];
            $student = $_POST["student"];
            $year = $_POST["year"];
            $grading = $_POST["grading"];

            if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {
                $newFilename = $_FILES['file']['name'];

                $newLocation = "../../assets/images/grades/" . $student . "/" . $newFilename;
                $newImageFileType = pathinfo($newLocation, PATHINFO_EXTENSION);
                $newImageFileType = strtolower($newImageFileType);

                $valid_extensions = array("jpg", "jpeg", "png", "gif");

                if (in_array(strtolower($newImageFileType), $valid_extensions)) {

                    $oldLocation = "../../assets/images/grades/" . $student . "/" . $grades;
                    if (file_exists($oldLocation)) {
                        unlink($oldLocation);
                    }

                    if (move_uploaded_file($_FILES['file']['tmp_name'], $newLocation)) {
                        $grades = $newFilename;
                    }
                }
            }
            $DBCRUDAPI->update('student_grades', ['section' => $section, 'student' => $student, 'grading' => $grading, 'year' => $year, 'grades' => $grades], "students_grades_id='$students_grades_id'");
            if ($DBCRUDAPI) {
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false));
            }
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['delete'])) {
        try {
            $students_grades_id = $_POST["students_grades_id"];

            $DBCRUDAPI->delete('student_grades', "students_grades_id='$students_grades_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    }
}


?>