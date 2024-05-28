<?php
include("./components/include/nav.php");
?>

<?php
     $pista_id = $_GET['pista_id'];
     $fecha_dia = $_GET['fecha_dia'];
     $precio_clase = $_GET['precio_clase'];
     $hora = $_GET['hora'];
     $nivel = $_GET['nivel'];
?>
    <div class="reserva">
        <h2>ACCESO A LA CLASE</h2>
        <p> Pista: <?php echo $pista_id ?></p>
        <p> Fecha Reserva: <?php echo $fecha_dia?></p>
        <p> Precio: <?php echo $precio_clase ?>€ </p>
        <p> Hora: <?php echo $hora ?>h </p>
        <p> Nivel: <?php echo $nivel ?></p>
    </div>

<?php
include("./components/include/footer.html");
?>
