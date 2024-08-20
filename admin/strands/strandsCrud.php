<?php

include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->selectFullleftjoin("strands", "departments", "department_id", "strand_department_id");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        try {

            $strand_name = $_POST["strand_name"];
            $strand_acronym = $_POST["strand_acronym"];
            $strand_department_id = $_POST["strand_department_id"];
            $DBCRUDAPI->insert('strands', ['strand_department_id' => $strand_department_id, 'strand_name' => $strand_name, 'strand_acronym' => $strand_acronym]);
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['update'])) {
        try {
            $strand_id = $_POST['strand_id'];
            $strand_name = $_POST["strand_name"];
            $strand_acronym = $_POST["strand_acronym"];
            $strand_department_id = $_POST["strand_department_id"];
            $DBCRUDAPI->update('strands', ['strand_department_id' => $strand_department_id, 'strand_name' => $strand_name, 'strand_acronym' => $strand_acronym], "strand_id='$strand_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['delete'])) {
        try {
            $strand_id = $_POST["strand_id"];

            $DBCRUDAPI->delete('strands', "strand_id='$strand_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    }
}


?>