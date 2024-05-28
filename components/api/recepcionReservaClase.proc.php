<?php

include("../include/database.php");
session_start();

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

        header("location: ../../mensajeApuntarse.php?valido=false");

    }else{

        $sql = "INSERT INTO RESERVA_CLASE (clase_id, usu_id, precio_clase, fecha_dia, hora, pista_id) VALUES ('$clase_id', '$usu_id', '$precio_clase', '$fecha_dia', '$hora', '$pista_id')";

        mysqli_query($conn, $sql);

        header("location: ../../mensajeApuntarse.php?valido=true&pista_id=$pista_id&fecha_dia=$fecha_dia&precio_clase=$precio_clase&hora=$hora&nivel=$nivel");



    }








}

?>


<?php

include("components/include/footer.html");
?>