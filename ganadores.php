<?php
include("components/include/nav.php");
?>
    <section class="reserva">
        
        <h1>GANADORES: </h1>
        <h3>Equipo Ganador</h3>

        <h1><?php echo $_SESSION['equip'] ?></h1><br>
        <h3>Miembros del equipo</h3>
        <ul>
            <li><?php echo $_SESSION['nom1'] ?></li>
            <li><?php echo $_SESSION['nom2'] ?></li>
        </ul>

        <?php 
            $_SESSION['nom1'] = null;
            $_SESSION['nom2'] = null;
            $_SESSION['equip'] = null;
        ?>
    </section>
<?php


include("components/include/footer.html");
?>