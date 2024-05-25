<?php
include("../../components/include/database.php");
session_start();

if(isset($_GET['usu_id']) or isset($_REQUEST['usu_id'])){
    echo "el id si lo pilla";
}

if(isset($_GET['usu_nom']) or isset($_REQUEST['usu_nom'])){
    echo "el usu_nom si lo pilla <br>";
    echo "$_REQUEST[usu_nom] <br>";
}

$usu_id = $_GET['usu_id'];
$nombre = $_GET['usu_nom'];
$apellido = $_GET['usu_apellido'];
$genero = $_GET['usu_genero'];
$tipo = $_GET['usu_type'];
$nivel = $_GET['usu_nivel'];
$puntuacion = $_GET['usu_puntuacion'];
$telefono = $_GET['usu_telf'];

$sql = "UPDATE USUARI SET 
        usu_nom = '$nombre', 
        usu_apellido = '$apellido',  
        usu_genero = '$genero',  
        usu_nivel = '$nivel',  
        usu_type = '$tipo',
        usu_puntuacion = '$puntuacion',  
        usu_telf =  '$telefono' 
        WHERE usu_id = '$usu_id'"; 

echo $sql;

$stmt = $conn->prepare($sql);

if(!$stmt){
    echo "ERROR";
}else{
    echo "funciona";
    $stmt-> execute();
}

header('location: ../../index.php');



?>
