<?php

    include_once('../../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();

    if(isset($_GET['getData'])){
        $DBCRUDAPI->select("schoolyears","*");
        $data = $DBCRUDAPI->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($data)){
            $res[] = $datass;
        }
        echo json_encode($res);
    }
    else{
        if(isset($_POST['addNew'])){
            try{
                $schoolyear_from = $_POST["schoolyear_from"];
                $schoolyear_to = $_POST["schoolyear_to"];
                $DBCRUDAPI->insert('schoolyears',['schoolyear_from'=>$schoolyear_from,'schoolyear_to'=>$schoolyear_to]);
               echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
            
        }else if(isset($_POST['update'])){
           try {
                $schoolyear_id = $_POST["schoolyear_id"];
                $schoolyear_from = $_POST["schoolyear_from"];
                $schoolyear_to = $_POST["schoolyear_to"];
                $DBCRUDAPI->update('schoolyears',['schoolyear_from'=>$schoolyear_from,'schoolyear_to'=>$schoolyear_to],"schoolyear_id='$schoolyear_id'");
                echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
             
        }else if(isset($_POST['delete'])){
            try{
            $schoolyear_id = $_POST["schoolyear_id"];

            $DBCRUDAPI->delete('schoolyears',"schoolyear_id='$schoolyear_id'");
               echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 

        }
    }


?>