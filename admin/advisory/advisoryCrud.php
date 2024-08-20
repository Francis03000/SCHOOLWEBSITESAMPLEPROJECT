<?php

include_once('../../API/DBCRUDAPI.php');
$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->selectFullleftjoin3();
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataDep'])) {
    $strand_department_id = $_GET["strand_department_id"];

    $where = "strands.strand_department_id = '$strand_department_id'";
    $DBCRUDAPI->selectFullleftjoin("strands", "departments", "department_id", "strand_department_id", $where);
    // $DBCRUDAPI->selectFullleftjoin2($where);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else if (isset($_GET['getDataDepUlit'])) {
    $strand_department_id = $_GET["strand_department_id"];
    $grade_level = $_GET["grade_level"];

    $where = "strands.strand_name ='$grade_level'";

    $DBCRUDAPI->selectFullleftjoin3($where);
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
} else {
    if (isset($_POST['addNew'])) {
        try {

            $section_name = $_POST["section_name"];
            $adviser_name = $_POST["adviser_name"];
            $strand_acronym_id = $_POST["strand_acronym_id"];
            $DBCRUDAPI->insert('advisory', ['strand_acronym_id' => $strand_acronym_id, 'section_name' => $section_name, 'adviser_name' => $adviser_name]);
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['update'])) {
        try {
            $advisory_id = $_POST['advisory_id'];
            $section_name = $_POST["section_name"];
            $adviser_name = $_POST["adviser_name"];
            $strand_acronym_id = $_POST["strand_acronym_id"];
            $DBCRUDAPI->update('advisory', ['strand_acronym_id' => $strand_acronym_id, 'section_name' => $section_name, 'adviser_name' => $adviser_name], "advisory_id='$advisory_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    } else if (isset($_POST['delete'])) {
        try {
            $advisory_id = $_POST["advisory_id"];

            $DBCRUDAPI->delete('advisory', "advisory_id='$advisory_id'");
            echo json_encode(array("success" => true));
        } catch (Exception $th) {
            echo json_encode(array("message" => $th->getMessage()));
        }

    }
}


?>