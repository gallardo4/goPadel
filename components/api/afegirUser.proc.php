<?php

include("../include/database.php");

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usu_nom"]) && isset($_POST["usu_apellido"]) && isset($_POST["usu_mail"]) && isset($_POST["usu_telf"]) && isset($_POST["usu_contra"]) && isset($_POST["usu_genero"]) && isset($_POST["usu_nivel"])){

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

    if($_FILES['perfilImg']['name']){
        echo $_FILES['perfilImg']['name'];
    }


    //COMPRUEVO LA EXISTENCIA DE USUARIOS CON EL MISMO MAIL, EL DATO POR EL CUAL SE INICIA SESIÓN.

    $sqlExists = "SELECT EXISTS (SELECT 1 FROM USUARI WHERE usu_mail='$usu_mail' OR usu_telf=$usu_telf)";

    $resultExists = mysqli_query($conn, $sqlExists);

    $arrayResult = mysqli_fetch_array($resultExists);

    if($arrayResult[0] == 1){

        header("Location: ../../login.php?msg=Email o telefono ya en úso.");

    }else{

        $usu_type = "user";

        //echo $usu_type."<br>";
    
        //SI NO HAY perfilImg LE PONGO baseImg.png, SINO LE ASIGNO LA FOTO INTRODUCIDA.
    
        if($_FILES['perfilImg']['name']!=""){

            $target_dir = "../pfpImg/";

            $file = $_FILES['perfilImg'];
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];

            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            $new_file_name = $usu_telf.".png";
            echo $new_file_name;
            $target_file = $target_dir . $new_file_name;
    
    
            if (move_uploaded_file($file_tmp, $target_file)) {
                    echo "El archivo " . htmlspecialchars(basename($file_name)) . " ha sido subido como " . $new_file_name;
            } else {
                    echo "Lo siento, hubo un error al subir tu archivo.";
            }
            
            $perfilImg=$new_file_name;

        }else{
            $perfilImg="baseImg.png";
            
            echo "<img src=../pfpImg/$perfilImg >";     
        }
    
    
        //CONSULTA QUE UTILIZO PARA INTRODUCIR EL NUEVO USUARIO EN LA BBDD
    
        $sql = "INSERT INTO USUARI (usu_nom, usu_apellido, usu_contra, usu_genero, usu_nivel, usu_puntuacion, usu_img, usu_telf, usu_mail, usu_type, usu_coments) 
        VALUES ('$usu_nom','$usu_apellido','$usu_contra','$usu_genero','$usu_nivel','0','$perfilImg','$usu_telf','$usu_mail','$usu_type','Comentarios 0')";
    
    
        //EJECUCIÓN DE LA CONSULA
    
        if(mysqli_query($conn, $sql)){
            echo "comanda funcional";
            header("location: ../../login.php");
        }else{
            echo "comanda no funcional: ".mysqli_errno($conn);
        }
    }
}


function retornaExtensio($imagen){
    return substr($imagen, strpos($imagen,"."));
}

 
    