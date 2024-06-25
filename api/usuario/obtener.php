<?php
require_once '../../config/db.php';
require_once '../../models/Usuario.php';
$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
/* crear usuario */
$usuario = new Usuario($conexion);
$usuario->setEmail($email);
$respuesta = $usuario->obtenerUsuario();
if ($respuesta['success']) {
  http_response_code(200);
  $respuesta['mensaje'] = 'Usuario encontrado';
  echo json_encode($respuesta);
} else { 
  http_response_code(404);
  $respuesta['mensaje'] = 'Usuario no encontrado';
  echo json_encode($respuesta);
}