<?php

include("../include/database.php");

if($_SERVER['REQUEST_METHOD'] == "GET"){
    $sql = "SELECT c.*, u.usu_nom AS nombre_profesor, u.usu_apellido AS apellido_profesor 
            FROM CLASE c JOIN USUARI u ON c.profe_ID = u.usu_id";
    $result = mysqli_query($conn,$sql);

    $claseData = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $claseData[] = $row;
        }
    }

    header("Content-Type: application/json");
    echo json_encode($claseData);
}