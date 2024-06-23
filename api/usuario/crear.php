<?php
require_once '../../config/db.php';
require_once '../../models/Usuario.php';
$data = json_decode(file_get_contents("php://input"), true);
$nombre = $data['nombre'];
$email = $data['email'];
$password = $data['password'];
/* crear usuario */
$usuario = new Usuario($conexion);
$usuario->setNombre($nombre);
$usuario->setEmail($email);
$usuario->setPassword($password);
$usuario->encriptarContrasena();
$creacionExitosa = $usuario->crearUsuario();
if (!$creacionExitosa) {
  http_response_code(500);
  echo json_encode([
    'error' => 'Error al crear el usuario',
    'success' => false
  ]);
  exit();
} else {
  http_response_code(201);
  echo json_encode([
    'success' => true,
    'id' => $conexion->lastInsertId()
  ]);
  exit();
}