<?php
include("../include/database.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['equipos']) && isset($_GET['torneos'])) {
    
    $equipo_id = explode(" ",$_GET['equipos']);    
    echo $equipo_id[0]."<br>";
    $torneo_id = explode(" ",$_GET['torneos']);
    echo $torneo_id[0]."<br>";

    $sql = "INSERT INTO EQUIPOS_TORNEO (torneo_id, equipo_id) VALUES ('$torneo_id[0]', '$equipo_id[0]')";

    if (mysqli_query($conn, $sql)) {
        header('location: ../../inscribirseTorneo.php?msg=¡Se te ha inscrito en el torneo!');  
    } else {
        header('location: ../../inscribirseTorneo.php?msg=No se te ha inscrito esta vez en el torneo.');
    }
}