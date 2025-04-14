<?php
session_start();

// Activar la visualización de errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexión a MySQL
$conexion = new mysqli("localhost", "root", "", "academia_virtual");
if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

// Consultar todos los registros
$sql = "SELECT id, nombre, email, rol, fecha_registro FROM usuarios";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body> 
    <div class="container mt-5">
        <h2 class="text-center mb-4">Registros de Usuarios</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $fila["id"] ?></td>
                        <td><?= $fila["nombre"] ?></td>
                        <td><?= $fila["email"] ?></td>
                        <td><?= $fila["rol"] ?></td>
                        <td><?= $fila["fecha_registro"] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="registro.html" class="btn btn-primary">Volver al Registro</a>
    </div>
</body>
</html>

<?php
$conexion->close();
?>