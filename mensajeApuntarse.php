<?php
include("./components/include/nav.php");
if(isset($_GET['pista_id']) && isset($_GET['fecha_dia']) && isset($_GET['precio_clase']) && isset($_GET['hora']) && isset($_GET['nivel'])){

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
}else{
    ?>
    <div class="reserva">
        <h2>NO PUEDES APUNTARTE A ESTA CLASE</h2>
        <p> No ha sido posible apuntarte a esta clase. </p>
    </div>

<?php
}
include("./components/include/footer.html");
?>
