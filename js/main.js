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

// ******************************************************************

const menu = document.querySelector(".hamburguesa");
const navegacion = document.querySelector(".nav");
const img = document.querySelectorAll('img');
const btnTodos = document.querySelector('.Todos')
const btnEnsaladas = document.querySelector('.ensaladas')
const btnPasta = document.querySelector('.pasta')
const btnPizza = document.querySelector('.pizza')
const btnPostres = document.querySelector('.postres')
const contenedorPlatillos = document.querySelector('.platillos')
document.addEventListener("DOMContentLoaded", () => {
  eventos();
  platillos();
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

const platillos = () => {
  let platillosArreglo = [];
  const platillos = document.querySelectorAll('.platillo')

  platillos.forEach(platillo => platillosArreglo = [...platillosArreglo, platillo])

  const ensaladas = platillosArreglo.filter(ensalada => ensalada.getAttribute('data-platillo') === 'ensalada');
  const pastas = platillosArreglo.filter(pasta => pasta.getAttribute('data-platillo') === 'pasta')
  const pizzas = platillosArreglo.filter(pizza => pizza.getAttribute('data-platillo') === 'pizza')
  const postres = platillosArreglo.filter(postre => postre.getAttribute('data-platillo') === 'postre')

  mostrarPlatillos(ensaladas, pastas, pizzas, postres, platillosArreglo);
}

const mostrarPlatillos = (ensaladas, pastas, pizzas, postres, todos) => {
  btnEnsaladas.addEventListener('click', () => {
    limpiarHtml(contenedorPlatillos);
    ensaladas.forEach(ensalada => contenedorPlatillos.appendChild(ensalada));
  });
  btnPasta.addEventListener('click', () => {
    limpiarHtml(contenedorPlatillos);
    pastas.forEach(pasta => contenedorPlatillos.appendChild(pasta));
  });
  btnPizza.addEventListener('click', () => {
    limpiarHtml(contenedorPlatillos);
    pizzas.forEach(pizza => contenedorPlatillos.appendChild(pizza));
  });
  btnPostres.addEventListener('click', () => {
    limpiarHtml(contenedorPlatillos);
    postres.forEach(postre => contenedorPlatillos.appendChild(postre));
  });
  btnTodos.addEventListener('click', () => {
    limpiarHtml(contenedorPlatillos);
    todos.forEach(todo => contenedorPlatillos.appendChild(todo));
  });

}

const limpiarHtml = (contenedor) => {
  while (contenedor.firstChild) {
    contenedor.removeChild(contenedor.firstChild);
    /*Limpia el html para que sólo aparezca el boton seleccionado */
  }
}


/*...............................................................................................*/
const btnCart = document.querySelector('.container-cart-icon');
const containerCartProducts = document.querySelector(
  '.container-cart-products'
);

btnCart.addEventListener('click', () => {
  containerCartProducts.classList.toggle('hidden-cart')
});

/* ************************* */
const cartInfo = document.querySelector('.cart-product');
const rowProduct = document.querySelector('.row-product');

//Lista de los productos
const productsList = document.querySelector('.platillos');

// Variable de arreglos de producto
let allProducts = [];
const valorTotal = document.querySelector('.total-pagar');
const countProducts = document.querySelector('#contador-productos');

const cartEmpty = document.querySelector('.cart-empty');
const cartTotal = document.querySelector('.cart-total');
productsList.addEventListener('click', e => {
  if (e.target.classList.contains('btn-add-cart')) {
    const product = e.target.parentElement;
    const product2 = e.target.parentElement.parentElement;
    // me muestra toda la extructura externa
    const infoProduct = {
      quantity: 1,
      title: product2.querySelector('h2').textContent,
      price: product.querySelector('p').textContent,

    }; //para obtener el contenido del texto

    const exits = allProducts.some(product => product.title === infoProduct.title)
    //vierifica si lo que contiene el title está 2 veces, devolverá un booleano
    if (exits) {
      const products = allProducts.map(product => {
        if (product.title === infoProduct.title) {
          product.quantity++;
          return product;
        }
        else {
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
rowProduct.addEventListener('click', e => {
  if (e.target.classList.contains('icon-close')) {
    const product = e.target.parentElement;
    const title = product.querySelector('p').textContent;

    allProducts = allProducts.filter(product => product.title !== title);
    showHTML();
  }
});

// Función html
const showHTML = () => {

  if (!allProducts.length) {
    cartEmpty.classList.remove('hidden');
    rowProduct.classList.add('hidden');
    cartTotal.classList.add('hidden');
  } else {
    cartEmpty.classList.add('hidden');
    rowProduct.classList.remove('hidden');
    cartTotal.classList.remove('hidden');
  }
  //limpiar html
  rowProduct.innerHTML = '';

  let total = 0;
  let totalOfProduct = 0;


  allProducts.forEach(product => {
    const containerProduct = document.createElement('div');
    containerProduct.classList.add('cart-product');

    containerProduct.innerHTML =

      `<div class="info-cart-product">
        <span class="cantidad-producto-carrito">${product.quantity}</span>
        <p class="titulo-producto-carrito">${product.title}</p>
        <span class="precio-producto-carrito">$${product.quantity * product.price.slice(1)}</span>
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
/*
const totalPagar = document.querySelector('#total-pagar');

function metodoPago() {
  
}
totalPagar.addEventListener('click', metodoPago);*/


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