<?php
include "conexion.php";

session_start(); // Iniciar la sesión

$data = json_decode(file_get_contents("php://input"), true);
header('Content-Type: application/json; charset=utf-8');
try {

  if ($data && is_array($data)) {
    $mesa = isset($data['mesa']) ? $data['mesa'] : null;
    $direccion = isset($data['direccion']) ? $data['direccion'] : null;
    $nombre = isset($data['nombre']) ? $data['nombre'] : null;
    $telefono = isset($data['telefono']) ? $data['telefono'] : null;

    $stmt = $conn->prepare("INSERT INTO pedidos (productos, mesa, direccion, nombre, total, horaPedido) VALUES (?, ?, ?, ?, ?, NOW())");
    $total = 0;
    $stmt->bind_param("ssssd", $productos, $mesa, $direccion, $nombre, $total);

    $productosArray = array();
    foreach ($data['productos'] as $producto) {
      $productosArray[] = $producto['title'] . ' x ' . $producto['quantity'];
      $total += $producto['price'] * $producto['quantity'];
    }
    $productos = implode(', ', $productosArray); // Construir la cadena de productos
    // Después de ejecutar la consulta
    $stmt->execute();
    $pedidoId = mysqli_insert_id($conn);
    // Construir la respuesta JSON
    $response = array('success' => true, 'pedidoId' => $pedidoId);

    $_SESSION['nuevo_pedido'] = true;

    // Enviar la respuesta como JSON
    echo json_encode($response);
    exit();
  } else {
    echo json_encode(["success" => false, "error" => "No se recibieron datos"]);
  }
} catch (Exception $e) {
  echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
?>
