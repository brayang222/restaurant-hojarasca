<?php
if(isset($_POST["btn"])) {
  $doc = $_POST["doc"];
  $clave = $_POST["clave"];
  include '../php/conexion.php';
  $q="SELECT * FROM usuarios
      WHERE Correo='$doc' and Clave='$clave'";
  $c=mysqli_query($conn, $q);
  echo "no entro";

  if(mysqli_num_rows($c)== 1){
    echo "entro";
    $v=mysqli_fetch_array($c);
    session_start();
    $_SESSION["Correo"]=$v[1];
    $_SESSION["Clave"]=$v[2];
    $_SESSION["Rol"]=$v[6];

    if($v["Rol"]== 1) {
      echo "<script>alert('Bienvenido administrador');
          window.location.href='../php/mostrarP.php';</script>";
    } else if($v["Rol"]== 2) {
      echo "<script>alert('Bienvenido Chef');
          window.location.href='../php/mostrarP.php';</script>";
    } else if($v["Rol"]== 3) {
      echo "<script>alert('Bienvenido Mesero');
          window.location.href='../php/mostrarP.php';</script>";
    } else if($v["Rol"]== 4) {
      echo "<script>alert('Bienvenido usuario');
          window.location.href='../index.html';</script>";
    }
  } else {
    echo "<script>alert('usuario o contraseña incorrectos');</script>";
  }
}
?>