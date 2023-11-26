<?php
if(isset($_POST['btn'])) {
  include 'conexion.php';
  $tipo = $_POST['Tipo'];
  $Nombre = $_POST['Nombre'];
  $FechaCreacion = $_POST['fechaCreacion'];
  $Ingredientes = $_POST['Ingredientes'];
  $Descripcion = $_POST['Descripcion'];
  $Precio = $_POST['Precio'];
  $Descuento = $_POST['Descuento'];
  $ruta = '../Fotos/' .$_FILES['Imagen']['name']; // captura el nombre de la img
  $nombreImg = $_FILES['Imagen']['tmp_name']; //nombre temporal
  move_uploaded_file($nombreImg, $ruta); //manda la img a la carpeta
  
  $consulta ="INSERT INTO 
          producto(Tipo,Nombre,fechaCreacion,Imagen, Ingredientes,Descripcion,Precio,Descuento)
          VALUES('$tipo','$Nombre','$FechaCreacion','$ruta','$Ingredientes','$Descripcion','$Precio','$Descuento')";
  $query=mysqli_query($conn,$consulta);


  if ($query) {
    echo '<script>
      alert("Se ingresó el producto correctamente a la base de datos");
      window.location.href = "formProducto.php";
    </script>';
} else {
    echo 'Hay un error en la consulta';
}
}
?>