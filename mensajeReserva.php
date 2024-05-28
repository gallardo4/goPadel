<?php
include("./components/include/nav.php");
?>
<?php
    $pista_id = $_GET['pista_id'];
    $res_fecha = $_GET['res_fecha'];
    $precio_pista = $_GET['precio_pista'];
    $hora = $_GET['hora'];
?>
    <div class="reserva">
        <h2>RESERVA REALIZADA CON ÉXITO</h2>
        <p> Pista: <?php echo $pista_id ?></p>
        <p> Fecha Reserva: <?php echo $res_fecha ?> </p>
        <p> Precio: <?php echo $precio_pista?> € </p>
        <p> Hora: <?php echo $hora ?>h </p>
    </div>

<?php
include("./components/include/footer.html");
?>
