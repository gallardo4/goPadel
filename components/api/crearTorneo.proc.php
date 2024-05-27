<?php

include("../include/database.php");

session_start();


if($_SESSION['usu_type'] == 'admin' && isset($_POST['torneo_nom']) && isset($_POST['torneo_nivel'])){

    $torneo_nom = $_POST['torneo_nom'];
    $torneo_nivel = $_POST['torneo_nivel'];

    $sql = "INSERT INTO TORNEO (torneo_nom,torneo_nivel) VALUES ('$torneo_nom','$torneo_nivel')";
    echo $sql;

    $resultat = mysqli_query($conn,$sql);

    if($resultat){
        echo header("location: ../../index.php");
    }else{
        echo "no funciona";
    }

}