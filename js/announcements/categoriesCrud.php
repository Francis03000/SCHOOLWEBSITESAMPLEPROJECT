<?php

    include_once('../../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();

    if(isset($_GET['getData'])){
        $DBCRUDAPI->select("categories","*");
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
                $category_name = $_POST["category_name"];
                $DBCRUDAPI->insert('categories',['category_name'=>$category_name]);
               echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
            
        }else if(isset($_POST['update'])){
           try {
                $category_id = $_POST["category_id"];
                $category_name = $_POST["category_name"];
                $DBCRUDAPI->update('categories',['category_name'=>$category_name,],"category_id='$category_id'");
                echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
             
        }else if(isset($_POST['delete'])){
            try{
            $category_id = $_POST["category_id"];

            $DBCRUDAPI->delete('categories',"category_id='$category_id'");
               echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 

        }
    }


?>