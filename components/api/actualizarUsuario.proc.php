<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['usu_id'])) {
    echo json_encode(['success' => false, 'message' => 'No estás autenticado.']);
    exit();
}

include("../../components/include/database.php");

$usu_id = $_SESSION['usu_id'];
$nombre = $_POST['usu_nom'];
$apellido = $_POST['usu_apellido'];
$genero = $_POST['usu_genero'];
$nivel = $_POST['usu_nivel'];
$puntuacion = $_POST['usu_puntuacion'];
$telefono = $_POST['usu_telf'];

$sql = "UPDATE USUARI SET 
        usu_nom = ?, 
        usu_apellido = ?, 
        usu_genero = ?, 
        usu_nivel = ?, 
        usu_puntuacion = ?, 
        usu_telf = ? 
        WHERE usu_id = ?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(['success' => false, 'message' => 'Error en la preparación de la consulta.']);
    exit();
}

$stmt->bind_param("ssssisi", $nombre, $apellido, $genero, $nivel, $puntuacion, $telefono, $usu_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al actualizar los datos.']);
}

$stmt->close();
$conn->close();
?>
