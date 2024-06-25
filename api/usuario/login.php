<?php
require_once '../../config/db.php';
require_once '../../models/Usuario.php';
$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$password = $data['password'];
/* crear usuario */
$usuario = new Usuario($conexion);
$usuario->setEmail($email);
$respuesta = $usuario->obtenerUsuario();
if ($respuesta['success']) {
  $usuario->setPassword($respuesta['usuario']['password']);
  if ($usuario->compararContrasena($password)) {
    $respuesta = $usuario->obtenerUsuario();
    echo json_encode($respuesta);
  }
}