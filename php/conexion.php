<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "restaurante";

$conn = new mysqli($server, $user, $pass, $db);

if($conn->connect_error) {
  die("conexion fallida" . $conn->connect_error);
} else {
}

?>