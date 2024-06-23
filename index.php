<?php
require_once './config/db.php';
require_once './models/Usuario.php';

$nuevo_Usuario = new Usuario($conexion);

$nuevo_Usuario->setEmail("XXXXXXXX@gmail.com");
$nuevo_Usuario->obtenerUsuario();
echo($nuevo_Usuario->getNombre());
echo($nuevo_Usuario->getEmail());
echo($nuevo_Usuario->getId());