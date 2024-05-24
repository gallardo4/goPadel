<?php

include("../include/database.php");

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['usu_id_1'])) {

    $usu_id_1 = $_GET['usu_id_1'];

    $sql="SELECT E.equipo_id,E.equipo_nombre,U1.usu_nom AS nombre_jugador_1,U1.usu_apellido AS apellido_jugador_1,U2.usu_nom AS nombre_jugador_2,U2.usu_apellido AS apellido_jugador_2
    FROM EQUIPO E
    JOIN USUARI U1 ON E.usu_id_1 = U1.usu_id
    JOIN USUARI U2 ON E.usu_id_2 = U2.usu_id
    WHERE E.usu_id_1 = $usu_id_1 OR E.usu_id_2 = $usu_id_1
";
    $result = mysqli_query($conn,$sql);
    
    $userData = array();
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $userData[] = $row;
        }
    }

    header("Content-Type: application/json");

    echo json_encode($userData);
}