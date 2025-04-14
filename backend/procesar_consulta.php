<?php
include('config.php');
include('guardar_historial.php');
include('groq_api.php');

session_start();
$usuario_id = $_SESSION['usuario_id'] ?? null;
$pregunta = $_POST['pregunta'] ?? '';

if ($usuario_id && $pregunta) {
    // Consultar el historial para mejorar precisión
    $sql = "SELECT pregunta FROM historial WHERE usuario_id = :usuario_id ORDER BY fecha DESC LIMIT 5";
    $query = $pdo->prepare($sql);
    $query->bindParam(":usuario_id", $usuario_id, PDO::PARAM_INT);
    $query->execute();
    $historial = $query->fetchAll(PDO::FETCH_COLUMN);
    
    // Modificar consulta según el historial
    $consultaMejorada = implode(" ", $historial) . " " . $pregunta;
    
    // Obtener respuesta de Groq
    $respuesta = consultarGroq($consultaMejorada);

    // Guardar el nuevo prompt en el historial
    guardarHistorial($pdo, $usuario_id, $pregunta, $respuesta["response"] ?? "Sin respuesta");

    echo json_encode(["respuesta" => $respuesta["response"] ?? "No se encontró información"]);
}
?>
