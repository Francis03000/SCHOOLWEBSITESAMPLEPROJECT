<?php

    include_once('../../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();

    if(isset($_GET['getData'])){
        $DBCRUDAPI->select("permissions","*");
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
                $permission_name = $_POST["permission_name"];
                $DBCRUDAPI->insert('permissions',['permission_name'=>$permission_name]);
               echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
            
        }else if(isset($_POST['update'])){
           try {
                $permission_id = $_POST["permission_id"];
                $permission_name = $_POST["permission_name"];
                $DBCRUDAPI->update('permissions',['permission_name'=>$permission_name,],"permission_id='$permission_id'");
                echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
             
        }else if(isset($_POST['delete'])){
            try{
            $permission_id = $_POST["permission_id"];

            $DBCRUDAPI->delete('permissions',"permission_id='$permission_id'");
               echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 

        }
    }


?>