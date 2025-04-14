<?php
$conexion = new mysqli("localhost", "root", "", "academia_virtual");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$contraseña_usuario1 = password_hash("1234", PASSWORD_DEFAULT);
$contraseña_usuario2 = password_hash("abcd1234", PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, email, contraseña, rol) VALUES 
    ('Usuario 1', 'cr0622022022@unab.edu.sv', '$contraseña_usuario1', 'tutor'),
    ('Usuario 2', 're2430012022@unab.edu.sv', '$contraseña_usuario2', 'estudiante')";

if ($conexion->query($sql) === TRUE) {
    echo "Usuarios agregados correctamente.";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>