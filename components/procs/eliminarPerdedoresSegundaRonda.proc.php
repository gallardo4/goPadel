<?php

include("../include/database.php");

session_start();

$arrayGanadores =trim($_COOKIE['ganadoresSegunda']);

$arrayGanadores = str_split($arrayGanadores,3);

$torneo = $_SESSION['torneo_id'];

echo $torneo."<br>";

$query = "DELETE FROM EQUIPOS_TORNEO WHERE torneo_id='$torneo' AND equipo_id!=$arrayGanadores[0] AND equipo_id!=$arrayGanadores[1]";

echo $query;

if(count($arrayGanadores)==2){

    if(mysqli_query($conn,$query)){

        echo "funciona";

        header('location: ../../gestionTerceraRonda.php');

    }else{

        echo "no lo hace";

        header('location: ../../index.php');

    }
    
}
