<?php
if (isset($_POST["Actualizar"])){

include 'Conexion.php';
$Id = $_POST['idPedido'];
$Mesa = $_POST['Mesa'];
$FechaPedido = $_POST['FechaPedido'];
$TiempoEstimado = $_POST['TiempoEstimado'];
$Total = $_POST['Total'];
$Estado = $_POST['Estado'];
$Cliente = $_POST['Cliente'];
$Empleado = $_POST['Empleado'];


$query ="UPDATE
      pedido SET  idPedido = '$Id', Mesa = '$Mesa', FechaPedido = '$FechaPedido', TiempoEstimado = '$TiempoEstimado',
      Total = '$Total', Estado = '$Estado', Cliente = '$Cliente', Empleado = '$Cliente' where  idPedido = $Id 
        ";
$Consulta=mysqli_query($conn, $query);

if ($Consulta) {
    echo "Se actualizó la empresa a la bd a la tabla correspondiente" . "<br>";
    echo "<a href='mostrarE.php'>Volver</a>";
}else {
    echo "Hay un error en la consulta";
}

//empresa(NITempresa,RazonSocial,Tipo,PáginaWeb,Correo,TelefonoLaboral,Contraseña)
    //    VALUES('$NIT','$Rsocial','$Tipo','$PaginaWeb','$CorreoE','$TelefonoE','$ContraseñaE')"

}
?>