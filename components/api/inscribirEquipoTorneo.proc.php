<?php
include("../include/database.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['equipos']) && isset($_GET['torneos'])) {
    
    $equipo_id = explode(" ",$_GET['equipos']);    
    echo $equipo_id[0]."<br>";
    $torneo_id = explode(" ",$_GET['torneos']);
    echo $torneo_id[0]."<br>";

    

    

    $sqlTorneoLleno = "SELECT COUNT(*) FROM EQUIPOS_TORNEO WHERE torneo_id='$torneo_id[0]'";

    $resultTorneo = mysqli_query($conn, $sqlTorneoLleno);

    $arrayTorneoLleno = mysqli_fetch_array($resultTorneo);

    echo "Posiciones ocupadas antes del insert:" .$arrayTorneoLleno[0]."<br>";

    if($arrayTorneoLleno[0]<8){

        $sqlExistsEquipo = "SELECT EXISTS (SELECT 1 FROM EQUIPOS_TORNEO WHERE equipo_id='$equipo_id[0]' AND torneo_id='$torneo_id[0]')";

        $result = mysqli_query($conn, $sqlExistsEquipo);

        $arrayResultado = mysqli_fetch_array($result);

        if($arrayResultado[0]==1){
            //header('location: ../../inscribirseTorneo.php?msg=¡Ya estas inscrito en el torneo!'); 
        }

        $sql = "INSERT INTO EQUIPOS_TORNEO (torneo_id, equipo_id) VALUES ('$torneo_id[0]', '$equipo_id[0]')";

        echo $sql;

        if (mysqli_query($conn, $sql)) {
            echo 'funciona';
            header('location: ../../inscribirseTorneo.php?msg=¡Se te ha inscrito en el torneo!');  
        } else {
            echo mysqli_errno($conn);
            echo 'no funciona';
            header('location: ../../inscribirseTorneo.php?msg=Ya estas inscrito en el torneo.');
        }
    }else{
        header('location: ../../inscribirseTorneo.php?msg=¡El torneo está lleno!');

    }

    

    
    echo "Posiciones ocupadas despues del insert:" .$arrayTorneoLleno[0]."<br>";
}