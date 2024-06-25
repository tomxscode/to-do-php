<?php
/* MODELO USUARIO, SEGÚN BASE DE DATOS*/
class Usuario {
  private $id;
  private $nombre;
  private $email;
  private $password;
  private $conexion;

  /* crear usuario base */
  public function __construct($conexion) {
    if (!is_a($conexion, 'PDO')) {
      throw new InvalidArgumentException('Invalid connection object provided.');
    }

    $this->conexion = $conexion;
  }

  /* creacion de usuario en la bd */
  public function crearUsuario() {
    $consulta = $this->conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)");
    $consulta->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
    $consulta->bindParam(':email', $this->email, PDO::PARAM_STR);
    $consulta->bindParam(':password', $this->password, PDO::PARAM_STR);
    $consulta->execute();
    /* validar que se creo exitosamente */
    if ($consulta->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function obtenerUsuario() {
    $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE email = :email");
    $consulta->bindParam(':email', $this->email, PDO::PARAM_STR);
    $consulta->execute();
    if ($consulta->rowCount() == 0) {
      $respuesta = [
        'objeto' => null,
        'success' => false
      ];
    } else {
      $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
      /* asignar valores */
      $this->setId($resultado['id']);
      $this->setNombre($resultado['nombre']);
      $this->setEmail($resultado['email']);
      $this->setPassword($resultado['password']);
      $respuesta = [
        'usuario' => [
          'id' => $this->getId(),
          'nombre' => $this->getNombre(),
          'email' => $this->getEmail(),
          'password' => $this->getPassword()
        ],
        'success' => true
      ];
    }
    return $respuesta;
  }
  
  /* gestión de contraseñas */

  public function encriptarContrasena() {
    $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    return $this->getPassword();
  }

  public function compararContrasena($contrasena) {
    return password_verify($contrasena, $this->password);
  }

  /* crear getter and setter */
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

}