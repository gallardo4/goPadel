<?php
session_start();

include("../include/database.php");


//VER TODOS LOS USUARIOS
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_SESSION['usu_id'])){

    $sql = "SELECT * FROM TORNEO";
    $result = mysqli_query($conn,$sql);

    $torneoData = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $torneoData[] = $row;
        }
    }

    header("Content-Type: application/json");
    echo json_encode($torneoData);
}