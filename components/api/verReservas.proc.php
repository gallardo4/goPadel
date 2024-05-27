<?php

include("../include/database.php");

session_start();


if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['type']) && isset($_SESSION['usu_type']) && $_SESSION['usu_type']=='admin' ) {

    if($_GET['type'] == 'clase'){


        //$sql="SELECT * FROM RESERVA_CLASE WHERE usu_id=$usu_id";
        $sql = "SELECT RC.*, U_prof.usu_nom AS nombre_profesor, U_prof.usu_apellido AS apellido_profesor, U_alum.usu_nom AS nombre_alumno, U_alum.usu_apellido AS apellido_alumno 
        FROM RESERVA_CLASE RC
        JOIN CLASE C ON RC.clase_id = C.UniqueID
        JOIN USUARI U_prof ON C.profe_ID = U_prof.usu_id
        JOIN USUARI U_alum ON RC.usu_id = U_alum.usu_id";
    
        $result = mysqli_query($conn,$sql);
    
        $claseData = array();
    
        if(mysqli_num_rows($result) > 0){
    
            while($row = mysqli_fetch_assoc($result)){
    
                $claseData[] = $row;
        
            }
    
        }
        
        header("Content-Type: application/json");
        
        echo json_encode($claseData);
        
    }elseif($_GET['type'] == 'pista'){

        $sql="SELECT RP.*, U.usu_nom AS nombre_usuario, U.usu_apellido AS apellido_usuario
        FROM RESERVA_PISTA RP
        JOIN USUARI U ON RP.usu_id = U.usu_id;";

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
}


//VER UNA RESERVA A PARTIR DEL USU_ID
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['usu_id'])){

    $usu_id = $_GET['usu_id'];

    $sql = "SELECT * FROM RESERVA_PISTA WHERE usu_id=$usu_id";

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


//VER UNA RESERVA A PARTIR DE PISTA_ID
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['pista_id'])){

    $pista_id = $_GET['pista_id'];

    $sql = "SELECT * FROM RESERVA_PISTA WHERE pista_id=$pista_id";

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


//VER RESERVAS A PARTIR DE LA HORA
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['hora'])){

    $hora = $_GET['hora'];

    $sql = "SELECT * FROM RESERVA_PISTA WHERE hora=$hora";

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

//VER RESERVAS A PARTIR DE FECHA_DIA
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['res_fecha'])){

    $res_fecha = $_GET['res_fecha'];

    $sql = "SELECT * FROM RESERVA_PISTA WHERE res_fecha = $res_fecha";
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

?>