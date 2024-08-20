<?php

include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->select("teacher_positions", "*");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        try {
            $teacher_position_name = $_POST["teacher_position_name"];
            $DBCRUDAPI->insert('teacher_positions', ['teacher_position_name' => $teacher_position_name]);
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['update'])) {
        try {
            $teacher_position_id = $_POST["teacher_position_id"];
            $teacher_position_name = $_POST["teacher_position_name"];
            $DBCRUDAPI->update('teacher_positions', ['teacher_position_name' => $teacher_position_name,], "teacher_position_id='$teacher_position_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['delete'])) {
        try {
            $teacher_position_id = $_POST["teacher_position_id"];
            $DBCRUDAPI->delete('teacher_positions', "teacher_position_id='$teacher_position_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    }
}


?>