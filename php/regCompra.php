<?php
if(isset($_POST['btn'])) {
  include 'conexion.php';
  $total = $_POST['total'];
  
  $consulta ="INSERT INTO 
          pedido(Total)
          VALUES('$total')";
  $query=mysqli_query($conn,$consulta);
  
  if ($query) {
      echo "Se se compró correctamente" . "<br>";
      echo "<a href='compraDinamica.php'>Volver</a>";
  }else {
      echo "Hay un error en la consulta";
  }
}

?>