<?php
if (isset($_POST["Actualizar"])){

include 'Conexion.php';
$Id = $_POST['idPedido'];
$Total = $_POST['Total'];
$HoraPedido = $_POST['HoraPedido'];
$Productos = $_POST['Productos'];
$Mesa = $_POST['Mesa'];
$Direccion = $_POST['Direccion'];
$Cliente = $_POST['Cliente'];
$Telefono = $_POST['Telefono'];

$query ="UPDATE
      pedidos SET idPedido = '$Id', Total = '$Total', HoraPedido = '$HoraPedido', Productos = '$Productos',
      Mesa = '$Mesa', Direccion = '$Direccion', Nombre = '$Cliente',  Telefono = '$Telefono', 
      Estado = 'Pedido' where  idPedido = $Id";
$Consulta=mysqli_query($conn, $query);

if ($Consulta) {
    echo "Se actualizó el pedido a la bd a la tabla correspondiente" . "<br>";
    echo "<a href='mostrarP.php'>Volver</a>";
}else {
    echo "Hay un error en la consulta";
}

}
?>