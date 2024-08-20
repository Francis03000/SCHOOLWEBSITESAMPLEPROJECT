<?php

    include_once('../../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();

    if(isset($_GET['getData'])){
        $DBCRUDAPI->select("offices","*");
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
                $office_name = $_POST["office_name"];
                $DBCRUDAPI->insert('offices',['office_name'=>$office_name]);
               echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
            
        }else if(isset($_POST['update'])){
           try {
                $office_id = $_POST["office_id"];
                $office_name = $_POST["office_name"];
                $DBCRUDAPI->update('offices',['office_name'=>$office_name,],"office_id='$office_id'");
                echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
             
        }else if(isset($_POST['delete'])){
            try{
            $office_id = $_POST["office_id"];

            $DBCRUDAPI->delete('offices',"office_id='$office_id'");
               echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 

        }
    }


?>