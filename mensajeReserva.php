<?php
include("./components/include/nav.php");
$flag = $_GET['valido'];



if(isset($_GET['pista_id']) && isset($_GET['res_fecha']) && isset($_GET['precio_pista']) && isset($_GET['hora'])){

$pista_id = $_GET['pista_id'];
$res_fecha = $_GET['res_fecha'];
$precio_pista = $_GET['precio_pista'];
$hora = $_GET['hora'];  

    echo "
    <div class=reserva>
        <h2>RESERVA REALIZADA CON ÉXITO</h2>
        <p> Pista: $pista_id </p>
        <p> Fecha Reserva: $res_fecha </p>
        <p> Precio: $precio_pista € </p>
        <p> Hora: $hora h </p>
    </div>
    ";

}else{

    echo "
    <div class=reserva>
        <h2>RESERVA NO REALIZADA</h2>
        <p> No se ha podido realizar la reserva. Fecha ya escogida.</p>
    </div>
    ";
}
include("./components/include/footer.html");
?>
