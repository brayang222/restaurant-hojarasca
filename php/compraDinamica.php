<?php
session_start();
include "conexion.php";

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION["Correo"])) {
  $correoUsuario = $_SESSION["Correo"];

  // Obtener datos del usuario desde la base de datos
  $queryUsuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE Correo = '$correoUsuario'");
  $usuario = mysqli_fetch_array($queryUsuario);

  // Verificar si se encontraron datos del usuario
  if ($usuario) {
    $nombreUsuario = $usuario[4];
    $direccionUsuario = $usuario[3];
    $telefonoUsuario = $usuario[5];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compras</title>
  <script src="https://kit.fontawesome.com/c49d8236c4.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@700&family=Mulish:wght@400;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="icon" type="image/png" href="../assets/favicon.png">
  <style>
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input,
    select {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-top: 5px;
    }
  </style>
</head>

<body>
  <main>
    <div class="volverMenu">

      <a href="../index.php" class="btn"><i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i> Volver</a>
    </div>
    <section class="menu contenedor" id="menu section">
      <h2 class="texto-platillos">Platillos populares</h2>
      <div class="container-icon">
        <div class="container-cart-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="icon-cart">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
          </svg>

          <div class="count-products">
            <span id="contador-productos">0</span>
          </div>
        </div>
        <div class="container-cart-products hidden-cart ">
          <div class="row-product hidden">
            <div class="cart-product">
              <div class="info-cart-product">
                <span class="cantidad-producto-carrito"></span>
                <p class="titulo-producto-carrito">Añade un producto</p>
                <span class="precio-producto-carrito" id="precio-product"></span>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="icon-close">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </div>
          </div>
          <div class="cart-total hidden">
            <div class="total">
              <h3>Total:</h3>
              <span class="total-pagar">0</span>
            </div>
            <div class="precio">
              <button id="openModalBtn" name="btn" onclick="openModal()">
                Pedir
              </button>
            </div>
          </div>
          <p class="cart-empty">El carrito está vacío</p>
        </div>

        <div id="myModal" class="modal-pay">
          <div class="modal-content">
            <span class="close-modal-pay" onclick="closeModal()">&times;</span>

            <div class="pedido-option">
              <label for="pedidoOption">Tipo de pedido:</label>
              <select id="pedidoOption" onchange="mostrarCamposAdicionales()">
                <option value="mesa" data-tipo="mesa">Pedir a mesa</option>
                <option value="domicilio" data-tipo="domicilio">Pedir a domicilio</option>
              </select>
            </div>
            <div id="camposAdicionales">
              <div class="mesa-field" style="display: block;">
                <label for="mesa">Mesa:</label>
                <select id="mesa">
                <option value="" aria-placeholder="Selecciona..."></option>
                  <!-- Opciones para elegir la mesa del 1 al 10 -->
                  <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <option value="<?php echo $i; ?>">
                      <?php echo $i; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
              <div class="direccion-field" style="display: none;">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" placeholder="Ingrese su dirección"
                  value="<?php echo isset($direccionUsuario) ? $direccionUsuario : ''; ?>">
              </div>
              <div class="nombre-field" style="display: block;">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" placeholder="Ingrese su nombre"
                  value="<?php echo isset($nombreUsuario) ? $nombreUsuario : ''; ?>">
              </div>
              <div class="telefono-field" style="display: none;">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" placeholder="Ingrese su teléfono" name="telefono"
                  value="<?php echo isset($telefonoUsuario) ? $telefonoUsuario : ''; ?>">
              </div>
            </div>

            <div class="precio">
              <button id="openModalBtn total-pagar" name="btn" >
                Enviar pedido
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="botones-platillos">
        <button class="Todos btn btn-verde">Todos</button>
        <button class="ensaladas btn btn-verde">ensaladas</button>
        <button class="pasta btn btn-verde">pasta</button>
        <button class="pizza btn btn-verde">pizza</button>
        <button class="postres btn btn-verde">postres</button>
      </div>

      <div class="platillos">
        <?php
        include "conexion.php";
        $q = mysqli_query($conn, "SELECT * FROM producto");
        while ($a = mysqli_fetch_array($q)) { ?>
          <div class="platillo" data-platillo="<?php echo $a[1] ?>">
            <div class="imagen-platillo">
              <img data-src="<?php echo $a[5] ?>" alt="<?php echo $a[1] ?>" />
            </div>
            <h2>
              <?php echo $a[2] ?>
            </h2>
            <p class="parrafo-platillo">
              <?php echo $a[4] ?>
            </p>
            <div class="precio">
              <p class="price">
                <?php echo $a[7] ?>
              </p>
              <button class="btn-add-cart" data-id="<?php echo $a[0]; ?>" data-nombre="<?php echo $a[2]; ?>"
                data-precio="<?php echo $a[7]; ?>">
                Añadir
              </button>
            </div>
          </div>
        <?php } ?>

      </div>
    </section>
  </main>
  <script src="../js/compra.js">
  </script>
</body>

</html>