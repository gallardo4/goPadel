<?php

include("../include/database.php");
include("../include/nav.php");

session_start();

if (!isset($_SESSION['usu_id']) || $_SESSION['usu_type'] != 'prof') {
    die("Acceso denegado.");
}

$id_profesor = $_SESSION['usu_id'];
$id_alumno = $_POST['alumn_id'];
$comentario = $_POST['comentario'];

$query = "INSERT INTO COMENTARIOS (id_profesor, id_alumno, texto_comentario) VALUES ($id_profesor, $id_alumno, '$comentario')";
if (mysqli_query($conn, $query)) {
    header("location: ../../comentarioRevision.php?msg=Se ha insertado bien el comentario.&comentario=$comentario");

} else {
    echo mysqli_errno($conn);
}

$conn->close();
?>

