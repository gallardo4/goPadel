<?php
include("../include/database.php");

session_start();

    $usu_id = $_SESSION['usu_id'];
    $pista_id = $_POST['pista_id'];
    $res_fecha = $_POST['res_fecha'];
    $precio_pista = $_POST['precio_pista'];
    $hora = $_POST['hora'];

    
    echo "Pista ID: " . $pista_id . "<br>";
    echo "Fecha: " . $res_fecha . "<br>";
    echo "Precio Pista: " . $precio_pista . "<br>";
    echo "Usuario ID: " . $usu_id . "<br>";
    echo "Hora: " . $hora . "<br>";

    // COMPROBAR SI LA HORA ESTÁ OCUPADA
    $check_sql = "SELECT * FROM RESERVA_PISTA WHERE pista_id='$pista_id' AND fecha_dia='$res_fecha' AND hora='$hora'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        
        header("location: ../../mensajeReserva.php?valido=false");

    } else {
        // INSERTAR RESERVA EN TABLA RESERVA_PISTA
        $sql = "INSERT INTO RESERVA_PISTA (pista_id, usu_id, precio_pista, fecha_dia, hora) VALUES ('$pista_id', '$usu_id', '$precio_pista', '$res_fecha', '$hora')";
        $result = mysqli_query($conn, $sql);

        //echo $sql . "<br>";  // SQL CODIGO
        if ($result) {
            header("location: ../../mensajeReserva.php?valido=true&pista_id=$pista_id&res_fecha=$res_fecha&precio_pista=$precio_pista&hora=$hora");
        } 
    } 


mysqli_close($conn);
?>
