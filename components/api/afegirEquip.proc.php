<?php

include("../include/database.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usu_company']) && isset($_POST['equipo_nombre'])){


$usu_id1 = $_SESSION['usu_id'];
$usu_id2 = $_POST['usu_company'];
$equipo_nombre =  $_POST['equipo_nombre'];
echo "
j1: $usu_id1<br>
j2: $usu_id2<br>
equipo_nombre: $equipo_nombre<br>
";


$sqlExists = "SELECT EXISTS (SELECT 1 FROM EQUIPO WHERE equipo_nombre='$equipo_nombre')";

$resultExists = mysqli_query($conn, $sqlExists);

$arrayResult = mysqli_fetch_array($resultExists);

if($arrayResult[0] == 1){

    header("Location: ../../crearEquipo.php?msg=Nombre de equipo ya en úso.");

}else{

    $sql = "INSERT INTO EQUIPO(usu_id_1, usu_id_2, equipo_nombre) VALUES ($usu_id1,$usu_id2,'$equipo_nombre')";



    if(mysqli_query($conn, $sql)){
        echo "comanda funcional";
        header("location: ../../crearEquipo.php?msg=Equipo creado");
    }else{
        echo "comanda no funcional: ".mysqli_errno($conn);
    }

    mysqli_close($conn);
}
}