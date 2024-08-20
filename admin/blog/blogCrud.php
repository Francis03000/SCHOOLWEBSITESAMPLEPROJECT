<?php

    include_once('../../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();

    if(isset($_GET['getData'])){
        $DBCRUDAPI->select("blog","*");
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
                $date = $_POST["date"];
                $title = $_POST["title"];
                $created_By = $_POST["created_By"];
                $content = $_POST["content"];
                $DBCRUDAPI->insert('blog',['date'=>$date,'title'=>$title,'created_By'=>$created_By,'content'=>$content]);
               echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
            
        }else if(isset($_POST['update'])){
           try {
                $blog_id = $_POST["blog_id"];
                $date = $_POST["date"];
                $title = $_POST["title"];
                $created_By = $_POST["created_By"];
                $content = $_POST["content"];
                $DBCRUDAPI->update('blog',['date'=>$date,'title'=>$title,'created_By'=>$created_By,'content'=>$content],"blog_id='$blog_id'");
                echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
             
        }else if(isset($_POST['delete'])){
            try{
            $blog_id = $_POST["blog_id"];

            $DBCRUDAPI->delete('blog',"blog_id='$blog_id'");
               echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 

        }
    }


?>