<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f2f2f2;
        }

        h1 {
            color: #333;
        }

        .pedido {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        #myModal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #4e73df;
            color: #fff;
            z-index: 3;
            border-radius: 10px;
        }

        #myModal input,
        #myModal button,
        #myModal textarea {
            display: block;
            margin: 10px 0;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        #editProductos {
            width: calc(100% - 20px);
            height: 200px;
            resize: vertical;
        }
    </style>
</head>

<body>

    <h1>Detalles de los pedidos</h1>

    <?php
    include "conexion.php";
    function actualizarPedido($idPedido, $productos, $totalPedido)
    {
        global $conn;
        $stmt = $conn->prepare("UPDATE pedidos SET productos = ?, total = ? WHERE idPedido = ?");
        $stmt->bind_param("ssi", $productos, $totalPedido, $idPedido);
        $stmt->execute();
        $stmt->close();
    }
    function eliminarPedido($idPedido)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM pedidos WHERE idPedido = ?");
        $stmt->bind_param("i", $idPedido);
        $stmt->execute();
        $stmt->close();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editar'])) {
        $idPedido = $_POST['idPedido'];
        $nuevosProductos = $_POST['productos'];
        $nuevoTotal = $_POST['totalPedido'];
        $nuevoTotal = str_replace('$', '', $nuevoTotal); // Eliminar el signo de dólar
        actualizarPedido($idPedido, $nuevosProductos, $nuevoTotal);
        exit; 
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['eliminar'])) {
        $idPedidoEliminar = $_POST['idPedido'];
        eliminarPedido($idPedidoEliminar);
        exit; // Terminar la ejecución después de la eliminación
    }

    $result = $conn->query("SELECT * FROM pedidos");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $idPedido = $row["idPedido"];
            $productos = $row["productos"];
            $totalPedido = $row["total"];
            $horaPedido = $row["horaPedido"];

            echo "<div class='pedido' data-id='$idPedido'>";
            echo "<p>Productos: $productos</p>";
            echo "<p>Total: $$totalPedido</p>";
            echo "<p>Hora del Pedido: $horaPedido</p>";
            echo "<button onclick='abrirModal($idPedido)'>Editar</button>";
            echo "<button onclick='eliminarPedido($idPedido)'>Eliminar</button>";
            echo "</div>";
        }
    } else {
        echo "<p>No hay pedidos disponibles.</p>";
    }

    $conn->close();
    ?>

    <!-- Agrega el modal para editar -->
    <div id="myModal">
        <!-- Contenido del modal -->
        <label for="editProductos">Productos:</label>
        <textarea id="editProductos"></textarea>

        <label for="editTotalPedido">Total:</label>
        <input type="text" id="editTotalPedido">

        <button onclick="guardarEdicion()">Guardar</button>
        <button onclick="cerrarModal()">Cancelar</button>
    </div>
    <script>
        function abrirModal(idPedido) {
            cerrarModal();

            var pedidoDiv = document.querySelector(`.pedido[data-id='${idPedido}']`);
            var productos = pedidoDiv.querySelector("p:nth-child(1)").textContent.split(': ')[1];
            var totalPedido = pedidoDiv.querySelector("p:nth-child(2)").textContent.split(': ')[1];

            document.getElementById("editProductos").value = productos;
            document.getElementById("editTotalPedido").value = totalPedido;
            pedidoDiv.classList.add('editando');
            document.getElementById("myModal").style.display = "block";
        }

        function cerrarModal() {
            document.getElementById("myModal").style.display = "none";
            var pedidoEditando = document.querySelector('.pedido.editando');
            if (pedidoEditando) {
                pedidoEditando.classList.remove('editando');
            }
        }

        function guardarEdicion() {
            var pedidoEditando = document.querySelector('.pedido.editando');
            var idPedido = pedidoEditando.getAttribute('data-id');
            var nuevosProductos = document.getElementById("editProductos").value;
            var nuevoTotal = document.getElementById("editTotalPedido").value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "detalles_pedidos.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert("Edición guardada con éxito.");
                    location.reload(); // Recargar la página después de editar
                }
            };

            var params = "editar=true&idPedido=" + idPedido + "&productos=" + encodeURIComponent(nuevosProductos) + "&totalPedido=" + nuevoTotal;
            xhr.send(params);
            cerrarModal();
        }

        function eliminarPedido(idPedido) {
            if (confirm("¿Estás seguro de que deseas eliminar este pedido?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "detalles_pedidos.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert("Pedido eliminado con éxito.");
                        location.reload(); // Recargar la página después de eliminar
                    }
                };
                xhr.send("eliminar=true&idPedido=" + idPedido);
            }
        }
    </script>

</body>

</html>
