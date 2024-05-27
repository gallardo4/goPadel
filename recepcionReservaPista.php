<?php
include("components/include/nav.php");
include("components/include/database.php");

    $usu_id = $_SESSION['usu_id'];
    $pista_id = $_POST['pista_id'];
    $res_fecha = $_POST['res_fecha'];
    $precio_pista = $_POST['precio_pista'];
    $hora = $_POST['hora'];

    // MOSTRAR VALORES
    //echo "Pista ID: " . $pista_id . "<br>";
    //echo "Fecha: " . $res_fecha . "<br>";
    //echo "Precio Pista: " . $precio_pista . "<br>";
    //echo "Usuario ID: " . $usu_id . "<br>";
    //echo "Hora: " . $hora . "<br>";

    // COMPROBAR SI LA HORA ESTÁ OCUPADA
    $check_sql = "SELECT * FROM RESERVA_PISTA WHERE pista_id='$pista_id' AND fecha_dia='$res_fecha' AND hora='$hora'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        echo '<div style="border: 2px solid red; padding: 20px; font-size: 20px; color: red; text-align: center; margin: 40px 0;">
            <h2>PISTA YA RESERVADA PARA ESA PISTA Y FECHA</h2>
            </div>';
    } else {
        // INSERTAR RESERVA EN TABLA RESERVA_PISTA
        $sql = "INSERT INTO RESERVA_PISTA (pista_id, usu_id, precio_pista, fecha_dia, hora) VALUES ('$pista_id', '$usu_id', '$precio_pista', '$res_fecha', '$hora')";
        $result = mysqli_query($conn, $sql);

        //echo $sql . "<br>";  // SQL CODIGO
        if ($result) {
            echo '<div class="reserva">
                    <h2>RESERVA REALIZADA CON ÉXITO</h2>
                    <p> Pista: '. $pista_id .' </p>
                    <p> Fecha Reserva: '. $res_fecha .' </p>
                    <p> Precio: '. $precio_pista .'€ </p>
                    <p> Hora: '. $hora .'h </p>
                  </div>';
        }
    } 


mysqli_close($conn);
?>

<?php
include("components/include/footer.html");
?>

<?php
