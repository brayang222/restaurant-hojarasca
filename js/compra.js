const menu = document.querySelector(".hamburguesa");
const navegacion = document.querySelector(".nav");
const img = document.querySelectorAll("img");
const btnTodos = document.querySelector(".Todos");
const btnEnsaladas = document.querySelector(".ensaladas");
const btnPasta = document.querySelector(".pasta");
const btnPizza = document.querySelector(".pizza");
const btnPostres = document.querySelector(".postres");
const contenedorPlatillos = document.querySelector(".platillos");
document.addEventListener("DOMContentLoaded", () => {
  platillos();
});

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

const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      const imagen = entry.target;
      imagen.src = imagen.dataset.src;
      observer.unobserve(imagen);
    }
  });
});

img.forEach((imagen) => {
  observer.observe(imagen);
});

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

// ******************************* FILTRO ***********************************************************

const platillos = () => {
  let platillosArreglo = [];
  const platillos = document.querySelectorAll(".platillo");

  platillos.forEach(
    (platillo) => (platillosArreglo = [...platillosArreglo, platillo])
  );

  const ensaladas = platillosArreglo.filter(
    (ensalada) => ensalada.getAttribute("data-platillo") === "ensalada"
  );
  const pastas = platillosArreglo.filter(
    (pasta) => pasta.getAttribute("data-platillo") === "pasta"
  );
  const pizzas = platillosArreglo.filter(
    (pizza) => pizza.getAttribute("data-platillo") === "pizza"
  );
  const postres = platillosArreglo.filter(
    (postre) => postre.getAttribute("data-platillo") === "postre"
  );

  mostrarPlatillos(ensaladas, pastas, pizzas, postres, platillosArreglo);
};

const mostrarPlatillos = (ensaladas, pastas, pizzas, postres, todos) => {
  btnEnsaladas.addEventListener("click", () => {
    limpiarHtml(contenedorPlatillos);
    ensaladas.forEach((ensalada) => contenedorPlatillos.appendChild(ensalada));
  });
  btnPasta.addEventListener("click", () => {
    limpiarHtml(contenedorPlatillos);
    pastas.forEach((pasta) => contenedorPlatillos.appendChild(pasta));
  });
  btnPizza.addEventListener("click", () => {
    limpiarHtml(contenedorPlatillos);
    pizzas.forEach((pizza) => contenedorPlatillos.appendChild(pizza));
  });
  btnPostres.addEventListener("click", () => {
    limpiarHtml(contenedorPlatillos);
    postres.forEach((postre) => contenedorPlatillos.appendChild(postre));
  });
  btnTodos.addEventListener("click", () => {
    limpiarHtml(contenedorPlatillos);
    todos.forEach((todo) => contenedorPlatillos.appendChild(todo));
  });
};

const limpiarHtml = (contenedor) => {
  while (contenedor.firstChild) {
    contenedor.removeChild(contenedor.firstChild);
    /*Limpia el html para que sólo aparezca el boton seleccionado */
  }
};

/*...............................................................................................*/
const btnCart = document.querySelector(".container-cart-icon");
const containerCartProducts = document.querySelector(
  ".container-cart-products"
);

btnCart.addEventListener("click", () => {
  containerCartProducts.classList.toggle("hidden-cart");
});

/* ************************* */
const cartInfo = document.querySelector(".cart-product");
const rowProduct = document.querySelector(".row-product");

//Lista de los productos
const productsList = document.querySelector(".platillos");

// Variable de arreglos de producto
let allProducts = [];
const valorTotal = document.querySelector(".total-pagar");
const countProducts = document.querySelector("#contador-productos");

const cartEmpty = document.querySelector(".cart-empty");
const cartTotal = document.querySelector(".cart-total");
productsList.addEventListener("click", (e) => {
  if (e.target.classList.contains("btn-add-cart")) {
    const product = e.target.parentElement;
    const product2 = e.target.parentElement.parentElement;
    // me muestra toda la extructura externa
    const infoProduct = {
      quantity: 1,
      title: product2.querySelector("h2").textContent,
      price: product.querySelector("p").textContent,
    }; //para obtener el contenido del texto

    const exits = allProducts.some(
      (product) => product.title === infoProduct.title
    );
    //vierifica si lo que contiene el title está 2 veces, devolverá un booleano
    if (exits) {
      const products = allProducts.map((product) => {
        if (product.title === infoProduct.title) {
          product.quantity++;
          return product;
        } else {
          return product;
        }
      });
      allProducts = [...products];
    } else {
      allProducts = [...allProducts, infoProduct];
    }

    showHTML();
  }
});
//icon close
rowProduct.addEventListener("click", (e) => {
  if (e.target.classList.contains("icon-close")) {
    const product = e.target.parentElement;
    const title = product.querySelector("p").textContent;

    allProducts = allProducts.filter((product) => product.title !== title);
    showHTML();
  }
});

// Función html
const showHTML = () => {
  if (!allProducts.length) {
    cartEmpty.classList.remove("hidden");
    rowProduct.classList.add("hidden");
    cartTotal.classList.add("hidden");
  } else {
    cartEmpty.classList.add("hidden");
    rowProduct.classList.remove("hidden");
    cartTotal.classList.remove("hidden");
  }
  //limpiar html
  rowProduct.innerHTML = "";

  let total = 0;
  let totalOfProduct = 0;

  allProducts.forEach((product) => {
    const containerProduct = document.createElement("div");
    containerProduct.classList.add("cart-product");

    containerProduct.innerHTML = `<div class="info-cart-product">
        <span class="cantidad-producto-carrito">${product.quantity}</span>
        <p class="titulo-producto-carrito">${product.title}</p>
        <span class="precio-producto-carrito">$${
          product.quantity * product.price.slice(1)
        }</span>
    </div>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="icon-close"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12"
        />
    </svg>`;

    rowProduct.append(containerProduct);

    total = total + parseInt(product.quantity * product.price.slice(1));
    //el slice sirve para quitar el signo de dólar, así sólo devuelve el número
    totalOfProduct = totalOfProduct + product.quantity;
  });
  countProducts.innerText = totalOfProduct;
  valorTotal.innerText = `$${total}`;
};

// **************** MODAL PAGAR ******************************

function openModal() {
  document.getElementById("myModal").style.display = "flex";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

// Cierra el modal si el usuario hace clic fuera de él
window.onclick = function (event) {
  var modal = document.getElementById("myModal");
  if (event.target == modal) {
      modal.style.display = "none";
  }
}

function mostrarCamposAdicionales() {
  var pedidoOption = document.getElementById("pedidoOption").value;
  var mesaField = document.querySelector(".mesa-field");
  var direccionField = document.querySelector(".direccion-field");
  var nombreField = document.querySelector(".nombre-field");
  var telefonoField = document.querySelector(".telefono-field");

  if (pedidoOption === "mesa") {
      mesaField.style.display = "block";
      direccionField.style.display = "none";
      nombreField.style.display = "block";
      telefonoField.style.display = "none";
  } else if (pedidoOption === "domicilio") {
      mesaField.style.display = "none";
      direccionField.style.display = "block";
      nombreField.style.display = "block";
      telefonoField.style.display = "block";
  } else {
      mesaField.style.display = "none";
      direccionField.style.display = "none";
      nombreField.style.display = "none";
      telefonoField.style.display = "none";
  }
}

// ********************* PAGAR *****************************
const totalPagarButton = document.getElementById("openModalBtn total-pagar");

totalPagarButton.addEventListener("click", async () => {
  if (allProducts.length === 0) {
    alert("El carrito está vacío. Añade productos antes de pagar.");
    return;
  }

  const mesa = document.getElementById("mesa").value;
  const direccion = document.getElementById("direccion").value;
  const nombre = document.getElementById("nombre").value;
  const telefono = document.getElementById("telefono").value;

  const productsToSend = allProducts.map((product) => {
    return {
      title: product.title,
      quantity: product.quantity,
      price: product.price.slice(1), // Eliminar el signo de dólar
    };
  });

  // Agregar datos adicionales al objeto enviado al servidor
  const requestData = {
    mesa: mesa,
    direccion: direccion,
    nombre: nombre,
    telefono: telefono,
    productos: productsToSend,
  };

  try {
    const response = await fetch("../php/procesar_pedido.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(requestData),
    });

    if (response.ok) {
      const result = await response.json();
      if (result.success) {
        alert("Pedido procesado con éxito. Gracias por tu compra.");
      } else {
        alert("Error al procesar el pedido: " + result.error);
      }
    } else {
      console.error("Error en la solicitud al servidor. Estado:", response.status);
    }
  } catch (error) {
    console.error("Error al procesar la respuesta del servidor:", error);
    alert("Error al procesar la respuesta del servidor. Por favor, inténtalo nuevamente.");
  }
});

