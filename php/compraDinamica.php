<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://kit.fontawesome.com/c49d8236c4.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@700&family=Mulish:wght@400;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
  <main>
    <div class="volverMenu">
      
      <a href="index.php" class="btn"><i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i> </a>
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
              <button id="openModalBtn total-pagar" name="btn">
                pagar
              </button>
            </div>
          </div>
          <p class="cart-empty">El carrito está vacío</p>
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
          <div class="platillo" data-platillo="<?php echo $a[2] ?>">
            <div class="imagen-platillo">
              <img data-src="<?php echo $a[5] ?>" alt="<?php echo $a[2] ?>" />
            </div>
            <h2>
              <?php echo $a[1] ?>
            </h2>
            <p class="parrafo-platillo">
              <?php echo $a[4] ?>
            </p>
            <div class="precio">
              <p class="price">
                <?php echo "$" . $a[7] ?>
              </p>
              <button class="btn-add-cart">
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