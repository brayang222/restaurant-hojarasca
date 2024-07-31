<?php

// $server = "localhost";
// $user = "root";
// $pass = "";
// $db = "restaurante";
// $port = '3306';

$server = "ewr1.clusters.zeabur.com";
$user = "root";
$pass = "NBAPhCw39Jv2687Li0Tdk1W5oFylnO4X";
$db = "restaurante";
$port = '32606';

$conn = new mysqli($server, $user, $pass, $db, $port);

if($conn->connect_error) {
  die("conexion fallida" . $conn->connect_error);
} else {
}

