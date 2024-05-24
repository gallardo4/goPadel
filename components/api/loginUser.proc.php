<?php

session_start();

include("../include/database.php");

if($_SERVER["REQUEST_METHOD"]== "GET"){
    $usu_mail = $_GET["usu_mail"];
    echo "el user pone: ".$usu_mail."<br>";
   
    $usu_contra = $_GET["usu_contra"];
    echo "el user pone: ".$usu_contra."<br>";
    
    
    $stmt = $conn->prepare("SELECT * FROM USUARI WHERE usu_mail='$usu_mail' AND usu_contra='$usu_contra'");

    if(!$stmt) {
        header("Location: ../../index.php");
    }else{
        echo "funciona";
    }

    $stmt->execute();

    $result = $stmt->get_result();

    
    if($result->num_rows == 1){
        echo "funciona <br>";
        $row = $result->fetch_assoc();

        if($row["usu_mail"]== $usu_mail && $row["usu_contra"]==$usu_contra){

            echo "usuario y contraseña iguales";


            $_SESSION['nomCompleto'] = $row['usu_nom']." ".$row['usu_apellido'];
            $_SESSION['usu_id'] = $row['usu_id'];
            $_SESSION['usu_nom'] = $row['usu_nom'];
            $_SESSION['usu_apellido'] = $row['usu_apellido'];
            $_SESSION['usu_genero'] = $row['usu_genero'];
            $_SESSION['usu_nivel'] = $row['usu_nivel'];
            $_SESSION['usu_puntuacion'] = $row['usu_puntuacion'];
            $_SESSION['usu_img'] = $row['usu_img'];
            $_SESSION['usu_telf'] = $row['usu_telf'];
            $_SESSION['usu_mail'] = $row['usu_mail'];
            $_SESSION['usu_type'] = $row['usu_type'];




            header("Location: ../../index.php");
        }
    }else{
        header("Location: ../../login.php?msg=Usuario no detectado. Contraseña o usuario equivocado.");
    }
    mysqli_close($conn);
}