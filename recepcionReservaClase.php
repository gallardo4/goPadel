<?php
include("components/include/nav.php");

include("components/include/database.php");

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['hora']) && isset($_GET['pistaID']) && isset($_GET['nivel']) && isset($_SESSION['usu_id']) && isset($_GET['claseID']) && isset($_GET['res_fecha'])){
    
    $hora = $_GET['hora'];
    $nivel = $_GET['nivel'];
    $clase_id = $_GET['claseID'];
    $precio_clase = '25';
    $fecha_dia = $_GET['res_fecha'];
    $usu_id = $_SESSION['usu_id'];
    $pista_id = $_GET['pistaID'];

    $sqlExists = "SELECT * FROM RESERVA_CLASE WHERE usu_id='$usu_id' AND fecha_dia='$fecha_dia' AND hora='$hora'";


    $resultExists = mysqli_query($conn, $sqlExists);

    $arrayResult = mysqli_fetch_array($resultExists);

    if($arrayResult[0] >= 1){

        echo '<div style="border: 2px solid red; padding: 20px; font-size: 20px; color: red; text-align: center; margin: 40px 0;">
        <h2>NO SE HA PODIDO ACCEDER A LA CLASE</h2>
        <p>ERROR: ' . mysqli_error($conn) . '</p>
      </div>';

    }else{

        $sql = "INSERT INTO RESERVA_CLASE (clase_id, usu_id, precio_clase, fecha_dia, hora, pista_id) VALUES ('$clase_id', '$usu_id', '$precio_clase', '$fecha_dia', '$hora', '$pista_id')";

        mysqli_query($conn, $sql);

        echo '<div class="reserva">
        <h2>ACCESO A LA CLASE</h2>
        <p>Pista: ' . $pista_id . '</p>
        <p>Fecha Reserva: ' . $fecha_dia . '</p>
        <p>Precio: ' . $precio_clase . '€</p>
        <p>Hora: ' . $hora . 'h</p>
      </div>';
    }








}

?>


<?php

include("components/include/footer.html");
?>