<?php
include("../include/database.php");
session_start();

if(isset($_GET['clase_id']) && isset($_GET['usu_id']) && isset($_GET['hora']) && isset($_SESSION['usu_type']) && $_SESSION['usu_type'] == 'admin'){
    $clase_id = $_GET['clase_id'];
    $usu_id = $_GET['usu_id'];
    $hora = $_GET['hora'];

    $sql = "DELETE FROM RESERVA_CLASE WHERE clase_id='$clase_id' AND usu_id='$usu_id' AND hora='$hora'";

    $result = mysqli_query($conn,$sql);

    header('location:../../gestionClases.php');
}