<?php
include 'conexion.php';
$CedulaEmpleado = $_POST['CedulaEmpleado'];
$Nombre = $_POST['Nombre'];
$Rol = $_POST['Rol'];
$Chef = $_POST['Chef'];

$query ="INSERT INTO 
        empleado(CedulaEmpleado,Nombre,Rol,Chef)
        VALUES('$CedulaEmpleado','$Nombre','$Rol','$Chef')";
$Consulta=mysqli_query($conn,$query);

if ($Consulta) {
    echo "Se inserto la empresa a la bd a la tabla correspondiente" . "<br>";
    echo "<a href='formEmpleado.php'>Volver</a>";
}else {
    echo "Hay un error en la consulta";
}
?>