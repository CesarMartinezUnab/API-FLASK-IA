<?php
// Configuración inicial
$apiKey = 'TU_CLAVE_API'; // Reemplaza con tu clave de la API
$endpoint = 'https://api.groq.com/v1/chat'; // URL del endpoint de la API

// Manejar la solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = $_POST['query']; // Texto de la consulta
    
    $data = [
        'prompt' => $query
    ];

    $options = [
        'http' => [
            'header' => "Content-Type: application/json\r\nAuthorization: Bearer $apiKey",
            'method' => 'POST',
            'content' => json_encode($data),
        ],
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($endpoint, false, $context);

    if ($response === false) {
        echo json_encode(['error' => 'Error al procesar la consulta']);
    } else {
        echo $response; // Devuelve la respuesta de la API
    }
}
?>
