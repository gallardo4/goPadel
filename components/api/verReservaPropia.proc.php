<?php

include("../include/database.php");

session_start();


if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['type']) && isset($_SESSION['usu_id'])) {

    $usu_id = $_SESSION['usu_id'];

    if($_GET['type'] == 'clase'){


        //$sql="SELECT * FROM RESERVA_CLASE WHERE usu_id=$usu_id";
        $sql="SELECT rc.*, u.usu_nom AS nombre_profesor, u.usu_apellido AS apellido_profesor FROM RESERVA_CLASE rc JOIN CLASE c ON c.clase_id=rc.clase_id JOIN USUARI u ON u.usu_id=c.profe_id WHERE rc.usu_id=$usu_id";

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

        $sql="SELECT * FROM RESERVA_PISTA WHERE usu_id=$usu_id";

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