const formRegistro = document.getElementById('form_registro');

formRegistro.addEventListener('submit', (e) => {
  e.preventDefault();
  // obtener todos los input
  const inputs = e.target.querySelectorAll('input');
  const data = {};
  inputs.forEach(input => {
    data[input.name] = input.value;
  });
  // comprobar que las contraseñas son iguales
  console.log(data)
  console.log(data['password'])
  if (data['password'] !== data['confirmar_password']) {
    console.error("Las contraseñas ingresadas no son iguales")
    return;
  } else {
    // las contraseñas coinciden, se hace llamado a la api
    fetch(`${urlBase}api/usuario/crear.php`, {
      method: 'POST',
      body: JSON.stringify(data)
    })
      .then(response => response.json())
      .then(data => {
        console.log(data)
      })
      .catch(error => console.error(error))
  }
})