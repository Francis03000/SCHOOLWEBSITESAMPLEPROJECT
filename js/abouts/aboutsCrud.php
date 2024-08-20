<?php

    include_once('../../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();

    if(isset($_GET['getMission'])){
        $DBCRUDAPI->select("abouts","*","about_id=1");
        $data = $DBCRUDAPI->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($data)){
            $res[] = $datass;
        }
        echo json_encode($res);
    }else if(isset($_GET['getVission'])){
        $DBCRUDAPI->select("abouts","*","about_id=2");
        $data = $DBCRUDAPI->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($data)){
            $res[] = $datass;
        }
        echo json_encode($res);
    }else if(isset($_GET['getGoal'])){
        $DBCRUDAPI->select("abouts","*","about_id=3");
        $data = $DBCRUDAPI->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($data)){
            $res[] = $datass;
        }
        echo json_encode($res);
    }
    else{
       if(isset($_POST['update'])){
           try {
                $about_id = $_POST["about_id"];
                $about_description = $_POST["about_description"];
                $DBCRUDAPI->update('abouts',['about_description'=>$about_description,],"about_id='$about_id'");
                echo json_encode(array("success"=>true));
            } catch (Exception $th) {
                echo json_encode(array("message"=>$th->getMessage()));
           } 
             
        }
    }


?>