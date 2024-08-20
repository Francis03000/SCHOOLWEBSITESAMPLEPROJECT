<?php

include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->select("departments", "*");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
}
if (isset($_GET['getDistincDepart'])) {
    $DBCRUDAPI->select("departments", "DISTINCT department_name as dep_name, department_id");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        try {
            $department_name = $_POST["department_name"];
            $department_acronym = $_POST["department_acronym"];
            $DBCRUDAPI->insert('departments', ['department_name' => $department_name, 'department_acronym' => $department_acronym]);
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['update'])) {
        try {
            $department_id = $_POST["department_id"];
            $department_name = $_POST["department_name"];
            $department_acronym = $_POST["department_acronym"];
            $DBCRUDAPI->update('departments', ['department_name' => $department_name, 'department_acronym' => $department_acronym], "department_id='$department_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['delete'])) {
        try {
            $department_id = $_POST["department_id"];

            $DBCRUDAPI->delete('departments', "department_id='$department_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    }
}


?>