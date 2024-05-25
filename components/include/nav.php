<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- estoy en la rama devHugo -->
<head>
    <meta charset="UTF-8">
    <title>GoPadel</title>
    <link rel="stylesheet" href="./components/style.css">
    <link rel="icon" href="./components/src/logoHead.png" type="image/png">
</head>

<body>
    <header>
        <a href="index.php" class="logoHeader"><img src="./components/src/logoPadel.png" alt="Logo GoPadel"></a>

<?php
    if(!isset($_SESSION['img']) && !isset($_SESSION['nomCompleto'])){
        echo "
        <div class=registroUsuario>
            <a href=login.php class=loginBtn>Iniciar Sesión</a>
            <a href=register.php class=registerBtn>Registrarse</a>
        </div>
        ";
    }else{
        echo "
        <div class=registroUsuario>
            <a href=./components/api/logOut.proc.php class=registerBtn>Cerrar Sesión</a>
        </div>
        ";
    }
?>

        
    </header>

    <div class="navLateral">
        <h2>GoPadel</h2>

    <?php


    if (isset($_SESSION['usu_img']) && isset($_SESSION['nomCompleto'])){
        echo "
        <div class=profileUser>
            <img class=profileImg src=./components/pfpImg/".$_SESSION['usu_img']."> 
            <a href=userProfile.php class=userNameRedirection>". $_SESSION['nomCompleto'] ."</a>           
        </div>
        ";
    }
        
    ?>

        <a class="indexA" href="index.php">Inicio</a>
        <a class="indexA" href="ranking.php">Ranking</a>
        <a class="indexA" href="profesores.php">Profesores</a>
        <a class="indexA" href="reservarPista.php">Reservar Pista</a>
        <a class="indexA" href="reservarClase.php">Reservar Clase</a>
        <a class="indexA" href="inscribirseTorneo.php">Inscribirse a Torneo</a>



        <?php
        
        if(isset($_SESSION['usu_id'])){
            ?>
            <a class="indexA" href="crearEquipo.php">Crear Equipo</a>
            <?php
        }

        ?>
        
    </div>

    <div class="paginaDiv">
        