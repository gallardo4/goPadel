<?php
include("components/include/nav.php");
?>
    <section class="reserva">
        
        <h1>GANADORES: </h1>
        <h2>Equipo Ganador</h2>

        <h3 class="ganador"><?php echo $_SESSION['equip'] ?></h3><br>
        <h2>Miembros del equipo</h2>
        <ul>
            <li class="ganador"><?php echo $_SESSION['nom1'] ?></li>
            <li class="ganador"><?php echo $_SESSION['nom2'] ?></li>
        </ul>
    </section>
<?php

$_SESSION['nom1'] = null;
            $_SESSION['nom2'] = null;
            $_SESSION['equip'] = null;
include("components/include/footer.html");
?>