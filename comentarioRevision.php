<?php
include("./components/include/nav.php");
?>

<?php
$comentario = $_GET['comentario'];
?>

<div class="reserva">
    <h2>COMENTARIO EXITOSO</h2>
    <p>Se ha añadido correctamente</p>
    <p>Comentario: <?php echo $comentario ?></p>
</div>

<?php
include("./components/include/footer.html");
?>