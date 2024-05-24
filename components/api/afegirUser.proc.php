<?php

include("../include/database.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //ASIGNO A VARIABLES EL VALOR DE LOS DATOS QUE SE INTRODUCEN EN EL FORMULARIO
    //LES ASIGNO UN ECHO POR SI ACASO SE QUEDA EN LA PAGINA, QUÉ HA FALLADO

    $usu_nom = $_POST["usu_nom"];
    echo $usu_nom."<br>";
    $usu_apellido = $_POST["usu_apellido"];
    echo $usu_apellido."<br>";
    $usu_mail = $_POST["usu_mail"];
    echo $usu_mail."<br>";
    $usu_telf = $_POST["usu_telf"];
    echo $usu_telf."<br>";
    $usu_contra = $_POST["usu_contra"];
    echo $usu_contra."<br>";
    $usu_genero = $_POST["usu_genero"];
    echo $usu_genero."<br>";
    $usu_nivel = $_POST["usu_nivel"];
    echo $usu_nivel."<br>";


    //COMPRUEVO LA EXISTENCIA DE USUARIOS CON EL MISMO MAIL, EL DATO POR EL CUAL SE INICIA SESIÓN.

    $sqlExists = "SELECT EXISTS (SELECT 1 FROM USUARI WHERE usu_mail='$usu_mail')";

    $resultExists = mysqli_query($conn, $sqlExists);

    $arrayResult = mysqli_fetch_array($resultExists);

    if($arrayResult[0] == 1){

        header("Location: ../../login.php?msg=Email de usuario ya en úso.");

    }else{

        $usu_type = "user";

        echo $usu_type."<br>";
    
    
        //SI NO HAY usu_img LE PONGO baseImg.png, SINO LE ASIGNO LA FOTO INTRODUCIDA.
    
        if($_POST["usu_img"]==null){
            $usu_img="baseImg.png";
            echo "<img src=../pfpImg/$usu_img >";
        }else{
            $usu_img = $_POST["usu_img"];
            echo $usu_img."<br>";        
        }
    
    
        //CONSULTA QUE UTILIZO PARA INTRODUCIR EL NUEVO USUARIO EN LA BBDD
    
        $sql = "INSERT INTO USUARI (usu_nom, usu_apellido, usu_contra, usu_genero, usu_nivel, usu_puntuacion, usu_img, usu_telf, usu_mail, usu_type, usu_coments) 
        VALUES ('$usu_nom','$usu_apellido','$usu_contra','$usu_genero','$usu_nivel','0','$usu_img','$usu_telf','$usu_mail','$usu_type','Comentarios 0')";
    
    
        //EJECUCIÓN DE LA CONSULA
    
        if(mysqli_query($conn, $sql)){
            echo "comanda funcional";
            header("location: ../../index.php");
        }else{
            echo "comanda no funcional: ".mysqli_errno($conn);
        }
    
        mysqli_close($conn);
    }
}

        
    