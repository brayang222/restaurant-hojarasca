<?php
include "conexion.php";

$data = json_decode(file_get_contents("php://input"), true);
header('Content-Type: application/json; charset=utf-8');
try {
  if ($data && is_array($data)) {
    $totalPedido = 0;
    $mesa = isset($data['mesa']) ? $data['mesa'] : null;
    $direccion = isset($data['direccion']) ? $data['direccion'] : null;
    $nombre = isset($data['nombre']) ? $data['nombre'] : null;
    $telefono = isset($data['telefono']) ? $data['telefono'] : null;

    $stmt = $conn->prepare("INSERT INTO pedidos (productos, mesa, direccion, nombre, total, horaPedido) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssd", $productos, $mesa, $direccion, $nombre, $total);

    $productosArray = array();
    foreach ($data['productos'] as $producto) {
      $productosArray[] = $producto['title'] . ' x ' . $producto['quantity'];
      $total += $producto['price'] * $producto['quantity'];
    }

    // Construir la cadena de productos
    $productos = implode(', ', $productosArray);

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
