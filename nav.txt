<?php
session_start();
if (!isset($_SESSION["Correo"])) {
  header("Location:../log/login.php");
} else {
  $Rol = $_SESSION["Rol"];
  if ($Rol == 1) {
    ?>
   
    <nav class="navbar navbar-dark bg-dark fixed-top mb-3 " style="margin-bottom: 50px">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Lista de navegacion</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-flex" 
      style="color: white; font-size: 22px; flex-direction: column; gap: 20px"
      >
      <a href="../index.html" class="nav-link">Pagina principal</a>
        <a href="formPedido.php" class="nav-link">Pedidos</a>
        <a href="formEmpleado.php" class="nav-link">Empleados</a>
        <a href="formCliente.php" class="nav-link">Clientes</a>
        <a href="formProducto.php" class="nav-link">Productos</a>
        <a href="mostrarP.php" class="nav-link">mostrarP</a>
      </div>
    </div>
  </div>
</nav>
    <?php
  } else if ($Rol == 4){
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
      <div class="bg-dark p-4">
        <a href="../index.html" class="nav-link text-body-emphasis">INICIO</a>
        
      </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent"
          aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
  }
}
?>