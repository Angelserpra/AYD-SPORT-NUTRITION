<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "aydsportnutrition";

// Crear conexión
try {
    $conexiones = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Establecer el modo de error a excepción
    $conexiones->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>

