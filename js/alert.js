// alerta.js

function mostrarAlerta(mensaje) {
  const alertaDiv = document.createElement("div");
  alertaDiv.className = "alerta";
  alertaDiv.textContent = mensaje;

  document.body.appendChild(alertaDiv);

  setTimeout(() => {
    alertaDiv.remove();
<<<<<<< HEAD
  }, 3000); 
=======
  }, 3000); // La alerta se eliminará después de 3 segundos (puedes ajustar este tiempo)
>>>>>>> 92366c3f4ee8e73a3ea69b5d4abdcfb3b20c1f9d
}
