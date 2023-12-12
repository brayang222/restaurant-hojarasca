<?php
include "conexion.php";

session_start(); // Iniciar la sesión

// Verificar si hay un nuevo pedido y aún no se ha mostrado la alerta
if (isset($_SESSION['nuevo_pedido']) && $_SESSION['nuevo_pedido']) {
    // Marcar como mostrado
    unset($_SESSION['nuevo_pedido']);

    // Construir la respuesta JSON
    $response = array('nuevos_pedidos' => 1); // Puedes enviar cualquier información adicional

    // Enviar la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} else {
    // No hay nuevos pedidos
    $response = array('nuevos_pedidos' => 0);

    // Enviar la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
