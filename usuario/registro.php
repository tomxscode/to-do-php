<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
</head>
<body>
  <form method="post" id="form_registro">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label for="password">Repetir contraseña:</label>
    <input type="password" id="confirmar_password" name="confirmar_password" required>
    <br>
    <button type="submit">Registrar</button>
  </form>
  <script src="../public/js/base.js"></script>
  <script src="../public/js/usuario/crear.js"></script>
</body>
</html>