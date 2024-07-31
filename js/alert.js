// alerta.js

function mostrarAlerta(mensaje) {
  const alertaDiv = document.createElement("div");
  alertaDiv.className = "alerta";
  alertaDiv.textContent = mensaje;

  document.body.appendChild(alertaDiv);

  setTimeout(() => {
    alertaDiv.remove();
  }, 3000); 
}
