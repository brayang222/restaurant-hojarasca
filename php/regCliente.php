<?php
include 'conexion.php';
$CedulaCliente = $_POST['CedulaCliente'];
$Nombre = $_POST['Nombre'];
$Telefono = $_POST['Telefono'];



$query ="INSERT INTO 
        cliente(CedulaCliente,Nombre,Telefono)
        VALUES('$CedulaCliente','$Nombre','$Telefono')";
$Consulta=mysqli_query($conn,$query);

if ($Consulta) {
    echo "Se inserto la empresa a la bd a la tabla correspondiente" . "<br>";
    echo "<a href='formCliente.php'>Volver</a>";
}else {
    echo "Hay un error en la consulta";
}




?>