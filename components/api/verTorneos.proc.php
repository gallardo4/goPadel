<?php
session_start();

include("../include/database.php");


if($_SERVER['REQUEST_METHOD']=='GET' && $_SESSION['usu_type'] == 'admin' && isset($_GET['torneo_id'])){

    $sql = "SELECT COUNT(*) FROM EQUIPOS_TORNEO WHERE torneo_id='$_GET[torneo_id]'";
    $result = mysqli_query($conn,$sql);

    $torneoData = array();

    if(mysqli_num_rows($result) > 0){

        /*$sql = "SELECT E.equipo_nombre, ET.*
                FROM EQUIPOS_TORNEO ET
                JOIN EQUIPO E ON ET.equipo_id = E.equipo_id
                WHERE ET.torneo_id = $_GET[torneo_id];"; */   
                
        $sql = "
        SELECT 
            E.equipo_nombre,
            ET.*,
            U1.usu_nom AS nombre_miembro_1,
            U1.usu_apellido AS apellido_miembro_1,
            U2.usu_nom AS nombre_miembro_2,
            U2.usu_apellido AS apellido_miembro_2
        FROM 
            EQUIPOS_TORNEO ET
        JOIN 
            EQUIPO E ON ET.equipo_id = E.equipo_id
        JOIN 
            USUARI U1 ON E.usu_id_1 = U1.usu_id
        JOIN 
            USUARI U2 ON E.usu_id_2 = U2.usu_id
        WHERE 
            ET.torneo_id = $_GET[torneo_id];
        ";
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
}



if($_SERVER['REQUEST_METHOD']=='GET' && isset($_SESSION['usu_id'])&& !isset($_GET['torneo_id'])){

    $sqlAll = "SELECT * FROM TORNEO";
    

    $result = mysqli_query($conn,$sqlAll);

    $torneoData = array();

    while($row = mysqli_fetch_assoc($result)){
        $torneoData[] = $row;
    }

    header("Content-Type: application/json");
    echo json_encode($torneoData);
}
