<?php
include("../include/database.php");
session_start();

if(isset($_GET['pista_id']) && isset($_GET['usu_id']) && isset($_GET['hora']) && isset($_SESSION['usu_type']) && $_SESSION['usu_type'] == 'admin'){
    $pista_id = $_GET['pista_id'];
    $usu_id = $_GET['usu_id'];
    $hora = $_GET['hora'];

    $sql = "DELETE FROM RESERVA_PISTA WHERE pista_id='$pista_id' AND usu_id='$usu_id' AND hora='$hora'";

    $result = mysqli_query($conn,$sql);

    header('location:../../gestionReservas.php');
}