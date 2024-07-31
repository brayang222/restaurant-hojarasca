function mostrarAlerta(descripcion) {
  var alerta = document.getElementById('miAlerta');

  if (!alerta) {
    console.error("Elemento 'miAlerta' no encontrado");
    return;
  }

  // Establecer la descripción y mostrar la alerta
  alerta.textContent = descripcion;
  alerta.style.display = 'block';

  // Cerrar la alerta después de 3 segundos (puedes ajustar este tiempo)
  setTimeout(function() {
    cerrarAlerta();
  }, 3000);
}

function cerrarAlerta() {
  var alerta = document.getElementById('miAlerta');

  if (!alerta) {
    console.error("Elemento 'miAlerta' no encontrado");
    return;
  }

  alerta.style.display = 'none';
}
