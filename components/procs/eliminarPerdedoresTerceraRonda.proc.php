<?php

include("../include/database.php");

session_start();

$arrayGanadores =trim($_COOKIE['ganadores']);
echo "Equipo ganador: ".$arrayGanadores."<br>";

$torneo = $_GET['torneo_id'];

$queryEqui = "DELETE FROM EQUIPOS_TORNEO WHERE torneo_id='$torneo' AND equipo_id!=$arrayGanadores";

echo $queryEqui."<br>";


    if(mysqli_query($conn,$queryEqui)){

        echo "Funciona"."<br>";


    }else{

        echo "no lo hace"."<br>";


    }

echo $torneo."<br>";

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

$arrayCookie = array();

while($row = mysqli_fetch_array($result)){
    $_SESSION['nom1'] = $row['nombre_miembro_1']." ".$row['apellido_miembro_1']."<br>";
    $_SESSION['nom2'] = $row['nombre_miembro_2']." ".$row['apellido_miembro_2']."<br>";
    $_SESSION['equip'] = $row['equipo_nombre']."<br>";
}

echo $_SESSION['nom1']."<br>";
echo $_SESSION['nom2']."<br>";
echo $_SESSION['equip']."<br>";


$query = "DELETE FROM TORNEO WHERE torneo_id='$torneo'";

echo $query."<br>";


    if(mysqli_query($conn,$query)){

        echo "funciona";

        header("location: ../../ganadores.php?torneo_id=$torneo");

    }else{

        echo "no lo hace";

        header('location: ../../index.php');

    }
    
