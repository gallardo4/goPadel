<?php

include("../../components/include/database.php");

session_start();

$arrayGanadores =trim($_COOKIE['ganadores']);

$arrayGanadores = str_split($arrayGanadores,3);

$torneo = $_SESSION['torneo_id'];

echo $torneo."<br>";

$query = "DELETE FROM EQUIPOS_TORNEO WHERE torneo_id='$torneo' AND equipo_id!=$arrayGanadores[0] AND equipo_id!=$arrayGanadores[1] AND equipo_id!=$arrayGanadores[2] AND equipo_id!=$arrayGanadores[3]";

echo $query;

if(count($arrayGanadores)==4){

    if(mysqli_query($conn,$query)){

        echo "funciona";

        header('location: ../../gestionSegundaRonda.php');

    }else{

        echo "no lo hace";

        header('location: ../../index.php');

    }
    
}
