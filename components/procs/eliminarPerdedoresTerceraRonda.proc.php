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
            U1.usu_puntuacion AS puntuacion_1,
            U1.usu_id AS usuId1,
            U2.usu_nom AS nombre_miembro_2,
            U2.usu_apellido AS apellido_miembro_2,
            U2.usu_puntuacion AS puntuacion_2,
            U2.usu_id AS usuId2
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

$id1 = 0;
$id2 = 0;
$puntuacion_1 = 0;
$puntuacion_2 = 0;

while($row = mysqli_fetch_array($result)){
    $_SESSION['nom1'] = $row['nombre_miembro_1']." ".$row['apellido_miembro_1'];
    $_SESSION['nom2'] = $row['nombre_miembro_2']." ".$row['apellido_miembro_2'];
    $_SESSION['equip'] = $row['equipo_nombre'];

    $puntuacion_1 = $row['puntuacion_1']+150;
    $puntuacion_2 = $row['puntuacion_2']+150;
    $id1 = $row['usuId1'];
    $id2 = $row['usuId2'];

    //
    echo "id: ". $id1 ."puntuacion1: ".$_SESSION['nom1']." puntuacion: ".$puntuacion_1."<br>";

    echo "id: ". $id2 ." puntuacion2: ".$_SESSION['nom2']." puntuacion: ".$puntuacion_2."<br>";

}



    $sqlPuntuacion1 = "UPDATE `USUARI` SET usu_puntuacion=$puntuacion_1 WHERE usu_id=$id1";
    mysqli_query($conn,$sqlPuntuacion1);
    $sqlPuntuacion2 = "UPDATE USUARI SET usu_puntuacion= '$puntuacion_2' WHERE usu_id=$id2";
    mysqli_query($conn,$sqlPuntuacion2);


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
