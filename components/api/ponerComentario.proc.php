<?php

include("../include/database.php");

session_start();

if (!isset($_SESSION['usu_id']) || $_SESSION['usu_type'] != 'prof') {
    die("Acceso denegado.");
}

$id_profesor = $_SESSION['usu_id'];
$id_alumno = $_POST['alumn_id'];
$comentario = $_POST['comentario'];

$query = "INSERT INTO COMENTARIOS (id_profesor, id_alumno, texto_comentario) VALUES ($id_profesor, $id_alumno, '$comentario')";
if (mysqli_query($conn, $query)) {
    header("location: ../../usuarios.php?msg=Se ha añadido el comentario correctamente");
} else {
    echo mysqli_errno($conn);
}

$conn->close();
?>

