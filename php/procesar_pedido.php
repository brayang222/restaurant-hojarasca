<?php
include "conexion.php";

$data = json_decode(file_get_contents("php://input"), true);
header('Content-Type: application/json; charset=utf-8');
try {
  if ($data && is_array($data)) {
    $totalPedido = 0;

    $stmt = $conn->prepare("INSERT INTO pedidos (productos, total, horaPedido) VALUES (?, ?, NOW())");
    $stmt->bind_param("sd", $productos, $total);

    // Construir la cadena de productos y calcular el total
    $productos = "";
    foreach ($data as $producto) {
      $productos .= $producto['title'] . ' x ' . $producto['quantity'] . ', ';
      $total += $producto['price'] * $producto['quantity'];
    }

    // Eliminar la última coma y espacio en blanco de la cadena de productos
    $productos = rtrim($productos, ', ');

    // Ejecutar la consulta
    $stmt->execute();

    // Cerrar la declaración
    $stmt->close();

    echo json_encode(["success" => true, "totalPedido" => $total]);
  } else {
    echo json_encode(["success" => false, "error" => "No se recibieron datos"]);
  }
} catch (Exception $e) {
  echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
?>
