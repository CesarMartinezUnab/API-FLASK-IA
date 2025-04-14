<?php
include('conexion.php'); // Archivo para conectar a la base de datos.

$usuario_id = $_SESSION['id']; // ID del usuario actual.
$prompt = "Tu pregunta";
$respuesta = "La respuesta generada por la IA";

$query = $conn->prepare("INSERT INTO interacciones (usuario_id, prompt, respuesta) VALUES (?, ?, ?)");
$query->bind_param('iss', $usuario_id, $prompt, $respuesta);
$query->execute();
?>
