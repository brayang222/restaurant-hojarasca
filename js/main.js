var loader
function loadnow(opacity) {
  if (opacity <= 0) {
    displaycontent()
  }
  else {
    loader.style.opacity = opacity;
    window.setTimeout(function () {
      loadnow(opacity - 0.10)
    }, 30)
  }
}
function displaycontent() {
  loader.style.display = 'none';
  document.getElementById('content').style.display = 'block';
}
document.addEventListener("DOMContentLoaded", function () {
  loader = document.getElementById('loader');
  loadnow(3);
})

// LOGOUT
function mostrarPopup() {
  document.getElementById('popup').style.display = 'block';
}

function cerrarPopup() {
  document.getElementById('popup').style.display = 'none';
}

// ******************************************************************

const menu = document.querySelector(".hamburguesa");
const navegacion = document.querySelector(".nav");
const img = document.querySelectorAll('img');
const contenedorPlatillos = document.querySelector('.platillos')
document.addEventListener("DOMContentLoaded", () => {
  eventos();
});

const eventos = () => {
  menu.addEventListener("click", abrirMenu);
};

const abrirMenu = () => {
  navegacion.classList.remove("ocultar");
  botonCerrar();
};

const botonCerrar = () => {
  const btnCerrar = document.createElement("p");
  const overlay = document.createElement("div");
  overlay.classList.add("pantalla-completa");
  const body = document.querySelector("body");
  if (document.querySelectorAll(".pantalla-completa").length > 0) return;
  /*para que al dar múltiples clicks, no se generen más barras*/
  body.appendChild(overlay);
  btnCerrar.textContent = "x";
  btnCerrar.classList.add("btn-cerrar");
  //while (navegacion.children[5]) {
  //  navegacion.removeChild(navegacion.children[5]);
  //}
  navegacion.appendChild(btnCerrar);
  cerrarMenu(btnCerrar, overlay);
};

/*
const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const imagen = entry.target;
      imagen.src = imagen.dataset.src;
      observer.unobserve(imagen);
    }
  });
});


img.forEach(imagen => {
  observer.observe(imagen);
}); */

const cerrarMenu = (boton, overlay) => {
  boton.addEventListener("click", () => {
    navegacion.classList.add("ocultar");
    overlay.remove();
    boton.remove();
  });

  overlay.onclick = function () {
    overlay.remove();
    navegacion.classList.add("ocultar");
    boton.remove();
  };
};

// ---------------------- MODAL --------------------------
// Referencias a elementos del modal
const modal = document.getElementById("modal");
const closeModalButton = document.getElementById("closeModalBtn");
const modalProducts = document.getElementById("modalProducts");
const modalTotal = document.getElementById("modalTotal");
const openModalButton = document.getElementById("openModalBtn");

// Evento para abrir el modal
document.addEventListener("click", (event) => {
  // Verifica si el botón "Pagar" fue clickeado
  if (event.target.matches("#openModalBtn")) {
    modal.style.display = "block"; // Mostrar modal
    mostrarProductosModal(); // Llenar el modal con los productos y el total
  } 
  else if (event.target.matches("#closeModalBtn")) {
    modal.style.display = "none"; // Ocultar modal
  } 
});

// Función para mostrar productos y total en el modal
const mostrarProductosModal = () => {
  modalProducts.innerHTML = ""; // Limpiar contenido previo
  console.log("mostrarProductosModal se llamó")
  // Recorrer la lista de productos y mostrarlos en el modal
  allProducts.forEach(product => {
    const productDiv = document.createElement("div");
    productDiv.textContent = `${product.quantity} x ${product.title}`;
    modalProducts.appendChild(productDiv);
  });

  // Calcular y mostrar el total en el modal
  const total = allProducts.reduce(
    (accumulator, product) =>
      accumulator + parseInt(product.price.slice(1)) * product.quantity,
    0
  );
  modalTotal.textContent = `$${total}`;
};


// DARK MODE ***************************************

const btnSwitch = document.querySelector('#switch')

btnSwitch.addEventListener('click', () => {
  document.body.classList.toggle('dark');
  btnSwitch.classList.toggle('active');

  document.section.classList.toggle('dark');
  btnSwitch.classList.toggle('active');
});