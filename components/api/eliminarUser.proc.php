<?php

include("../include/database.php");

session_start();

if(isset($_REQUEST['usu_id']) && isset($_SESSION['usu_type']) && $_SESSION['usu_type']=='admin'){
    $usu_id = $_REQUEST['usu_id'];
    
    echo $usu_id."<br>";

    $sql="DELETE FROM USUARI WHERE usu_id = $usu_id;";

    $result = mysqli_query($conn,$sql);


    if($result){
        echo "HA FUNCIONADO";
    }else{
        echo "NO HA FUNCIONADO";
    }
}