<?php
session_start();
if (!isset($_SESSION["Correo"])) {
  header("Location:../log/login.php");
} else {
  $Rol = $_SESSION["Rol"];
  if ($Rol == 1) {
    ?>
    <head>
      <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
    <div class="navegacion">
      <div class="cont-nav container-icon">
        <div class="logo">
          <h2>
            Restautant <span class="amarillo">Hoja</span><span class="azul">ras</span><span class="rojo">ca</span>
          </h2>
        </div>

        <nav class="nav ocultar" id="inicio">
          <a href="index.php" class="nav-link">Pagina principal</a>
          <a href="formPedido.php" class="nav-link">Pedidos</a>
          <a href="formEmpleado.php" class="nav-link">Empleados</a>
          <a href="formCliente.php" class="nav-link">Clientes</a>
          <a href="formProducto.php" class="nav-link">Productos</a>
          <a href="mostrarP.php" class="nav-link">mostrarP</a>
            <div class="aling"><button class="switch " id="switch">
              <span><i class="fa-solid fa-sun"></i></span>
              <span><i class="fa-solid fa-moon"></i></span>
            </button>
          </div>
        </nav>
        <div class="cont-nav-aside">
          <div class="ingresar">
            <a href="../log/index.html">
              <i class="fa-regular fa-user"></i>
            </a>

          </div>
          <div class="salir">
            <a href="../log/logout.php">
              <i class="fa-solid fa-right-from-bracket"></i>
            </a>

          </div>
          <div class="hamburguesa"><span></span><span></span><span></span></div>

        </div>

      </div>
    </div>
    <script src="../js/main.js"> </script>
    </body>
    
    <?php
  } else if ($Rol == 4){
    ?>
    <head>
      <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
    <div class="navegacion">
      <div class="cont-nav container-icon">
        <div class="logo">
          <h2>
            Restautant <span class="amarillo">Hoja</span><span class="azul">ras</span><span class="rojo">ca</span>
          </h2>
        </div>

        <nav class="nav ocultar" id="inicio">
          <a href="#inicio">Inicio</a>
          <a href="#sobrenosotros">Sobre nosotros</a>
          <a href="#menu">Menú</a>
          <a href="#chef">Chef</a>
          <a href="#contacto">Contacto</a>
          <div class="aling"><button class="switch " id="switch">
              <span><i class="fa-solid fa-sun"></i></span>
              <span><i class="fa-solid fa-moon"></i></span>
            </button></div>

        </nav>
        <div class="cont-nav-aside">
          <div class="ingresar">
            <a href="../log/index.html">
              <i class="fa-regular fa-user"></i>
            </a>

          </div>
          <div class="salir">
            <a href="../log/logout.php">
              <i class="fa-solid fa-right-from-bracket"></i>
            </a>

          </div>
          <div class="hamburguesa"><span></span><span></span><span></span></div>

        </div>

      </div>
    </div>
    <script src="../js/main.js"> </script>
    </body>
    
    <?php
  }
}
?>