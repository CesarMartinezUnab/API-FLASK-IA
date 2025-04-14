<?php
session_start();
include('config.php'); // Incluir la conexión a la base de datos.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar la conexión antes de usarla
    if (!$conn) {
        die("Error: Conexión no inicializada.");
    }

    $query = $conn->prepare("SELECT id, nombre, email, contraseña, rol FROM usuarios WHERE email = ?");
    $query->bind_param('s', $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['contraseña'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['rol'] = $user['rol'];
            header("Location: registro.html"); // Cambia la redirección a registro.html
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>
