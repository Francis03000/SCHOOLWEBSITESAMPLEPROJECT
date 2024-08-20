<?php

    include_once('../../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();

    if(isset($_GET['getData'])){
        $DBCRUDAPI->selectFullleftjoin("announcements","categories","category_id","announcement_category_id");
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
                $announcement_category_id = $_POST["announcement_category_id"];
                $announcement_image = $_POST["announcement_image"];
                $announcement_title = $_POST["announcement_title"];
                $announcement_description = $_POST["announcement_description"];
                $DBCRUDAPI->insert('announcements',['announcement_category_id'=>$announcement_category_id,'announcement_image'=>$announcement_image,'announcement_title'=>$announcement_title,'announcement_description'=>$announcement_description]);
               echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
            
        }else if(isset($_POST['update'])){
           try {
                $announcement_id  = $_POST["announcement_id"];
                $announcement_category_id = $_POST["announcement_category_id"];
                $announcement_image = $_POST["announcement_image"];
                $announcement_title = $_POST["announcement_title"];
                $announcement_description = $_POST["announcement_description"];
                $DBCRUDAPI->update('announcements',['announcement_category_id'=>$announcement_category_id,'announcement_image'=>$announcement_image,'announcement_title'=>$announcement_title,'announcement_description'=>$announcement_description],"announcement_id ='$announcement_id '");
                echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
             
        }else if(isset($_POST['delete'])){
            try{
            $announcement_id = $_POST["announcement_id"];

            $DBCRUDAPI->delete('announcements',"announcement_id ='$announcement_id'");
               echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 

        }
    }


?>