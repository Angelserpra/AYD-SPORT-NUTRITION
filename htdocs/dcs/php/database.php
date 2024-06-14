<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "aydsportnutrition";

try {
    $conexiones = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conexiones->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>

