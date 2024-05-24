<?php

include("../include/database.php");
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['profID'])) {

$profID = $_GET['profID'];
$sql="SELECT * FROM COMENTARIOS WHERE id_profesor='$profID'";
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


if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['alumnID'])) {

$alumnID = $_GET['alumnID'];
$sql="SELECT U.usu_nom AS nombre_profesor, U.usu_apellido AS apellido_profesor, C.texto_comentario FROM COMENTARIOS C JOIN USUARI U ON C.id_profesor = U.usu_id WHERE C.id_alumno = $alumnID;";
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