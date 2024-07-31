<?php
// session_start();

// Incluir aquí la lógica para manejar el inicio de sesión si es necesario

$navbarClass = '';
if(isset($_SESSION["Correo"])) {
  $Rol = $_SESSION["Rol"];
  if($Rol == 1) {
    $navbarClass = 'admin-navbar';
  } else if($Rol == 4) {
    $navbarClass = 'user-navbar';
  }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class="navegacion <?php echo $navbarClass; ?>">
    <div class="cont-nav container-icon">
      <div class="logo">
        <h2>
          Restautant <span class="amarillo">Hoja</span><span class="azul">ras</span><span class="rojo">ca</span>
        </h2>
      </div>
      <nav class="nav ocultar" id="inicio">
        <?php if($navbarClass === 'admin-navbar'): ?>
          <!-- Enlaces para el rol de administrador -->
          <a href="../index.php" class="nav-link">Pagina principal</a>
          <a href="php/formPedido.php" class="nav-link">Pedidos</a>
          <a href="php/formEmpleado.php" class="nav-link">Empleados</a>
          <a href="php/formCliente.php" class="nav-link">Clientes</a>
          <a href="php/formProducto.php" class="nav-link">Productos</a>
          <a href="php/mostrarP.php" class="nav-link">mostrarP</a>
        <?php else: ?>
          <!-- Enlaces para otros roles -->
          <a href="#inicio">Inicio</a>
          <a href="#sobrenosotros">Sobre nosotros</a>
          <a href="#menu">Menú</a>
          <a href="#chef">Chef</a>
          <a href="#contacto">Contacto</a>
        <?php endif; ?>
        <div class="aling">
          <button class="switch " id="switch">
            <span><i class="fa-solid fa-sun"></i></span>
            <span><i class="fa-solid fa-moon"></i></span>
          </button>
        </div>
      </nav>
      <div class="cont-nav-aside">
        <div class="popup-container">
          <div class="ingresar">
            <a href="log/login.html" title="Login user">
            <i class="fa-regular fa-user"></i>
            </a>
          </div>

          <div class="popup-content">
            <?php
            include "conexion.php";
            if(isset($_SESSION["Correo"])) {
              $correoUsuario = $_SESSION["Correo"];
              $q = mysqli_query($conn, "SELECT * FROM usuarios WHERE Correo = '$correoUsuario'");
              while($a = mysqli_fetch_array($q)) { ?>
                <p> <span>Nombre:</span>
                  <?php echo $a[4] ?>
                </p>
                <p> <span>Correo:</span>
                  <?php echo $a[1] ?>
                </p>
                <p> <span>Rol:</span>
                  <?php echo ($a[6] == 1) ? "Administrador" : "Cliente"; ?>
                </p>
                <img src="<?php echo $a[7]; ?>" alt="Imagen del usuario">
                <div class="salir" id="logout-icon">
                  <a href="log/logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                  </a>
                </div>
              <?php }
            } else {
              ?>
              <button
                style="background-color: #414452; cursor:pointer"
                class="btn bordes"
                onclick="location.href='log/login.html'">
                Iniciar sesion
              </button>
              <?php
            }
            ?>

          </div>
        </div>
        <div class="hamburguesa"><span></span><span></span><span></span></div>
      </div>
    </div>
  </div>
  <script src="js/main.js"></script>
</body>

</html>