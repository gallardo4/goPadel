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
        echo "Error: La pista ya está reservada para esa fecha y hora.";
    } else {
        // INSERTAR RESERVA EN TABLA RESERVA_PISTA
        $sql = "INSERT INTO RESERVA_PISTA (pista_id, usu_id, precio_pista, fecha_dia, hora) VALUES ('$pista_id', '$usu_id', '$precio_pista', '$res_fecha', '$hora')";
        $result = mysqli_query($conn, $sql);

        //echo $sql . "<br>";  // SQL CODIGO
        if ($result) {
            echo "<h2>Reserva realizada con éxito.</h2>";
        } else {
            echo "Error: " . mysqli_error($conn);  // MENSAJE ERROR
        }
    }


mysqli_close($conn);
?>

<?php
include("components/include/footer.html");
?>

<?php

//VER UNA RESERVA A PARTIR DEL USU_ID
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['usu_id'])){

    $usu_id = $_GET['usu_id'];

    $sql = "SELECT * FROM RESERVA_PISTA WHERE usu_id=$usu_id";

    $result = mysqli_query($conn,$sql);

    $userData = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $userData[] = $row;
        }
    }
    header("Content-Type: application/json");
    echo json_encode($userData);
}


//VER UNA RESERVA A PARTIR DE PISTA_ID
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['pista_id'])){

    $pista_id = $_GET['pista_id'];

    $sql = "SELECT * FROM RESERVA_PISTA WHERE pista_id=$pista_id";

    $result = mysqli_query($conn,$sql);

    $userData = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $userData[] = $row;
        }
    }
    header("Content-Type: application/json");
    echo json_encode($userData);
}


//VER RESERVAS A PARTIR DE LA HORA
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['hora'])){

    $hora = $_GET['hora'];

    $sql = "SELECT * FROM RESERVA_PISTA WHERE hora=$hora";

    $result = mysqli_query($conn,$sql);

    $userData = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $userData[] = $row;
        }
    }
    header("Content-Type: application/json");
    echo json_encode($userData);
}

//VER RESERVAS A PARTIR DE FECHA_DIA
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['res_fecha'])){

    $res_fecha = $_GET['res_fecha'];

    $sql = "SELECT * FROM RESERVA_PISTA WHERE res_fecha = $res_fecha";
    $result = mysqli_query($conn,$sql);

    $userData = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $userData[] = $row;
        }
    }
    header("Content-Type: application/json");
    echo json_encode($userData);
}

?>
