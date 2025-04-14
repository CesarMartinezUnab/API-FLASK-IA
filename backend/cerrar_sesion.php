<?php
session_start();
session_destroy();

// Redirigir a la página de login después de cerrar sesión
header("Location: login.html");
exit();
?>