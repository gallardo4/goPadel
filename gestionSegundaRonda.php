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

<body onload="separarLocalStorage()">
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
            <img class=profileImg src=./components/pfpImg/$_SESSION[usu_img]> 
            <a href=userProfile.php class=userNameRedirection>". $_SESSION['nomCompleto'] ."</a>           
        </div>
        ";
    }
        
    ?>

        <a class="indexA" href="index.php">Inicio</a>
        <a class="indexA" href="ranking.php">Ranking</a>
        <a class="indexA" href="profesores.php">Profesores</a>
        <a class="indexA" href="usuarios.php">Usuarios</a>
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

    <section class="section1">
        <table class="tablaProfYRank" id="segundaFase1">
            <th>Equipo 1</th>
            <th>Equipo 2</th>
            <th colspan="2"></th>
        </table>
        <table class="tablaProfYRank" id="segundaFase2">
            <th>Equipo 3</th>
            <th>Equipo 4</th>
            <th colspan="2"></th>

        </table>
        <a href="components/procs/eliminarPerdedoresSegundaRonda.proc.php">SIGUIENTE RONDA</a>


        <script>
            
            fetch(`./components/api/verTorneos.proc.php?torneo_id=<?php echo $_SESSION['torneo_id'] ?>`)
                .then(response => response.json())
                .then(data => {
                    //console.log(data)
                    equiposSegundaRonda = [[data[0],data[1]],[data[2],data[3]]];
                    //console.log(equiposSegundaRonda)
                    crearTabla(equiposSegundaRonda);
                })

            let equiposSegundaRonda = [];

            let idGanadoresSegundaRonda = []

            function separarLocalStorage(){
                //console.log(localStorage.getItem("ganadoresRonda1"))

                let equipos = localStorage.getItem("ganadoresRonda1").trim().split(" ")

                //console.log(equipos)

                let segundaRonda = [[equipos[0],equipos[1]],[equipos[2],equipos[3]]]

                //console.log(segundaRonda)

            }

            function equipoGanador2(equipo,btnGanador,btnPerdedor){
                idGanadoresSegundaRonda+=`${equipo} `;
                console.log(idGanadoresSegundaRonda)
                btnGanador.remove()
                btnPerdedor.remove()
                document.cookie = `ganadoresSegunda=${idGanadoresSegundaRonda}`
            }
        

            function crearTabla(segundaRonda){
                let partidoNum =1;
                segundaRonda.forEach(e => {
                    console.log(e)

                    let tabla = document.getElementById(`segundaFase${partidoNum}`);

                    let tr = document.createElement('tr');

                    let id1 = `btnE${e[0].equipo_id}`
                    let id2 = `btnE${e[1].equipo_id}`

                    tr.innerHTML=` 
                    <td> ${e[0].equipo_nombre} </td> 
                    <td> ${e[1].equipo_nombre} </td> 
                    <td> <button id=${id1} onclick=equipoGanador2(${e[0].equipo_id},${id1},${id2})> GANA EQUIPO 1 </button> <button id=${id2} onclick=equipoGanador2(${e[1].equipo_id},${id2},${id1})> GANA EQUIPO 2 </button> </td> 
                    `

                    tabla.appendChild(tr)

                    partidoNum++;
                })
    }
</script>

<?php
include("components/include/footer.html")
?>