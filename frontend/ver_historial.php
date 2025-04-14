<?php
session_start();

// Activar la visualización de errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Definir la ruta del archivo JSON de prompts
// Ajusta la ruta según la estructura de tu proyecto.
// En este ejemplo, se asume que la ruta es '/backend/prompt/prompt.json' relativa al directorio raíz del proyecto.
$jsonFile = __DIR__ . "/../backend/prompt/prompt.json";

// Verificamos que el archivo exista
if (!file_exists($jsonFile)) {
    die("<div class='alert alert-danger'>❌ El archivo JSON no existe en la ruta: $jsonFile</div>");
}

// Se leen los datos del archivo JSON
$jsonData = file_get_contents($jsonFile);
if (!$jsonData) {
    die("<div class='alert alert-danger'>❌ No se pudieron leer los datos del archivo.</div>");
}

// Se decodifican los datos JSON
$prompts = json_decode($jsonData, true);
if ($prompts === null) {
    die("<div class='alert alert-danger'>❌ Error al decodificar los datos JSON.</div>");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Prompts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Historial de Prompts</h2>
        <?php if (count($prompts) > 0): ?>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Fecha</th>
                        <th>Modelo</th>
                        <th>Consulta (Prompt)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prompts as $entry): ?>
                        <?php
                        // Extraer la fecha o timestamp
                        $fecha = isset($entry["timestamp"]) ? $entry["timestamp"] : "N/D";
                        
                        // Extraer el modelo desde chat_request
                        $modelo = isset($entry["chat_request"]["model"]) ? $entry["chat_request"]["model"] : "N/D";
                        
                        // Extraer la consulta (tomamos el primer mensaje del array de mensajes)
                        $consulta = "N/D";
                        if (isset($entry["chat_request"]["messages"]) && is_array($entry["chat_request"]["messages"]) && count($entry["chat_request"]["messages"]) > 0) {
                            $consulta = isset($entry["chat_request"]["messages"][0]["content"]) ? $entry["chat_request"]["messages"][0]["content"] : "N/D";
                        }
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($fecha) ?></td>
                            <td><?= htmlspecialchars($modelo) ?></td>
                            <td><?= htmlspecialchars($consulta) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">ℹ️ No hay prompts registrados.</div>
        <?php endif; ?>
        <a href="registro.html" class="btn btn-primary">Volver al Registro</a>
    </div>
</body>
</html>

<?php
// Finalizamos si es necesario (en este caso, no se abren conexiones de base de datos)
?>
