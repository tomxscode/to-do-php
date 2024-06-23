<?php
$dbPassword = '';

try {
    $conexion = new PDO('mysql:host=localhost;dbname=todo-php', 'root', $dbPassword);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}