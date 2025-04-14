<?php
include('config.php');

function guardarHistorial($pdo, $usuario_id, $pregunta, $respuesta) {
    $sql = "INSERT INTO historial (usuario_id, pregunta, respuesta, fecha) VALUES (:usuario_id, :pregunta, :respuesta, NOW())";
    $query = $pdo->prepare($sql);
    $query->bindParam(":usuario_id", $usuario_id, PDO::PARAM_INT);
    $query->bindParam(":pregunta", $pregunta, PDO::PARAM_STR);
    $query->bindParam(":respuesta", $respuesta, PDO::PARAM_STR);
    $query->execute();
}
?>
