<?php
session_start();

include("../include/database.php");


//VER TODOS LOS USUARIOS
if($_SERVER['REQUEST_METHOD']=='GET' && !isset($_GET['usu_id']) && !isset($_GET['usu_type']) && !isset($_GET['max'])){

    $sql = "SELECT * FROM USUARI";
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

//VER USUARIOS POR TIPO
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['usu_type'])&& !isset($_GET['max'])){

    $usu_type = $_GET['usu_type'];

    $sql = "SELECT * FROM USUARI WHERE usu_type='$usu_type'";
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

//VER UN USUARIO CONCRETO A PARTIR DEL ID
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['usu_id'])){

    $usu_id = $_GET['usu_id'];

    $sql = "SELECT * FROM USUARI WHERE usu_id=$usu_id";

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

//VER X CANTIDAD DE USUARIOS POR ORDEN DE PUNTUACIÓN
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['max']) && !isset($_GET['usu_type'])){

    $max = $_GET['max'];

    $sql = "SELECT * FROM USUARI ORDER BY usu_puntuacion DESC LIMIT $max ";
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