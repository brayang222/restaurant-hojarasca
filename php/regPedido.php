<?php
include 'conexion.php';
$Id = $_POST['idPedido'];
$Mesa = $_POST['Mesa'];
$FechaPedido = $_POST['FechaPedido'];
$TiempoEstimado = $_POST['TiempoEstimado'];
$Total = $_POST['Total'];
$Estado = $_POST['Estado'];
$Cliente = $_POST['Cliente'];
$Empleado = $_POST['Empleado'];


$query ="INSERT INTO 
        pedido(idPedido,Mesa,FechaPedido,TiempoEstimado,Total,Estado,Mesero,Cliente)
        VALUES('$Id','$Mesa','$FechaPedido','$TiempoEstimado','$Total','$Estado','$Empleado','$Cliente')";
$Consulta=mysqli_query($conn,$query);

if ($Consulta) {
    echo "Se inserto la empresa a la bd a la tabla correspondiente" . "<br>";
    echo "<a href='formPedido.php'>Volver</a>";
}else {
    echo "Hay un error en la consulta";
}




?>