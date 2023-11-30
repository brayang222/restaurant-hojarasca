<?php
include 'conexion.php';
$query = "SELECT CedulaCliente, Nombre from cliente";
$Consulta = mysqli_query($conn, $query)
    ?>
<?php
$query2 = "SELECT CedulaEmpleado, Nombre, Rol from empleado";
$Consulta2 = mysqli_query($conn, $query2)
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mostrar pedidos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body style="background-color: #111821; text-align: center; color: white">
    <div class="volverMenu" style="background-color: gray">
      <a href="index.php" class="btn"><i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i> Volver</a>
    </div>
  <h1 style="margin: 70px auto">Mostrar pedidos</h1>
  <form class="d-flex container" role="search">
    <input name="Buscar" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button name="btns" class="btn btn-outline-success" type="submit"
      style="color:#f2e9e5; border-color: gray;">Search</button>
  </form>
  <fieldset class="" style="text-align: center; margin: 0 auto; ">
    <table class="table table-bordered border-secondary container " style="background-color: #111821; color:#f2e9e5;
        margin: 100px auto;">
      <thead>
        <tr style="color: white; font-size: 22px;">
          <th scope="col">ID Pedido</th>
          <th scope="col">Mesa</th>
          <th scope="col">Fecha pedido</th>
          <th scope="col">Tiempo estimado</th>
          <th scope="col">Total</th>
          <th scope="col">Estado</th>
          <th scope="col">Mesero</th>
          <th scope="col">Cliente</th>
        </tr>
      </thead>
      <?php
      if (isset($_GET["btns"]) && $_GET["Buscar"] != null) {
        $search = $_GET["Buscar"];
        $Buscar = "%$search%";
        include "conexion.php";
        $query = "SELECT * FROM pedidos WHERE idPedido LIKE '$Buscar' ";
        $cons = mysqli_query($conn, $query);
        while ($vec = mysqli_fetch_array($cons)) { ?>
          <tbody class="table-group-divider">
            <tr>
              <td>
                <?php echo $vec[0]; ?>
              </td>
              <td>
                <?php echo $vec[1]; ?>
              </td>
              <td>
                <?php echo $vec[2]; ?>
              </td>
              <td>
                <?php echo $vec[3]; ?>
              </td>
              <td>
                <?php echo $vec[4]; ?>
              </td>
              <td>
                <?php echo $vec[5]; ?>
              </td>
              <td>
                <?php echo $vec[6]; ?>
              </td>
              <td>
                <?php echo $vec[7]; ?>
              </td>
              <td>
                <a style="color:black; text-decoration: none;" href="#" data-bs-toggle="modal"
                  data-bs-target="#exampleModal-<?php echo $vec[0] . 'a'; ?>">
                  <i class="ri-edit-2-line"></i></a>

                <a style="color:black; text-decoration: none;" href="#" data-bs-toggle="modal"
                  data-bs-target="#exampleModal-<?php echo $vec[0]; ?>"><i class="ri-eraser-line"></i></a>
              </td>
            </tr>
          </tbody>
          <div class="modal fade" id="exampleModal-<?php echo $vec[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-secondary">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">¿Está seguro que desea eliminar este
                    pedido?</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer" style="margin: 0 auto">
                  <form action="eliminarP.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $vec[0]; ?>">
                    <button type="submit" class="btn btn-danger">Sí</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="exampleModal-<?php echo $vec[0] . 'a'; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-secondary">
                <div class="modal-header">
                  <div class="container" style="max-width: 500px;
                                                margin: 20px auto;
                                                padding: 20px;
                                                background-color: black;
                                                border-radius: 10px;
                                                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                    <h3 class="card-title" style="text-align: center;padding: 20px; font-family: serif; font-weight: bold;">
                      Actualizar Pedido</h3>
                    <form action="actPedido.php" method="post">
                      <div class="mb-3">
                        <label class="form-label"> id pedido</label>
                        <input type="number" class="form-control" aria-describedby="cedulaHelp" name="idPedido" required
                          value="<?php echo $vec[0] ?>">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Mesa</label>
                        <input type="text" class="form-control" name="Mesa" id="" value="<?php echo $vec[1] ?>">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Fecha pedido</label>
                        <input type="date" class="form-control" name="FechaPedido" id="" value="<?php echo $vec[2] ?>">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Tiempo estimado</label>
                        <input type="time" class="form-control" name="TiempoEstimado" id="" value="<?php echo $vec[3] ?>">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Total</label>
                        <input type="text" class="form-control" name="Total" id="" value="<?php echo $vec[4] ?>">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <input type="text" class="form-control" name="Estado" id="" value="<?php echo $vec[5] ?>">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Cliente</label>
                        <select class="custom-select" style="height: 30px;" name="Cliente" value="<?php echo $vec[6] ?>">
                            <?php
                            while ($v = mysqli_fetch_array($Consulta)) {
                              echo "<option value = " . $v[0] . ">" . $v[1] .
                                "</option>";
                            } ?>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Empleado</label>
                        <select class="custom-select" style="height: 30px;" name="Empleado" value="<?php echo $vec[7] ?>">
                            <?php
                            while ($v = mysqli_fetch_array($Consulta2)) {
                              echo "<option value = " . $v[0] . ">" . $v[1] . " - " . $v[2] .
                                "</option>";
                            } ?>
                        </select>
                      </div>
                      <input type="submit" class="btn btn-primary" value="Actualizar" name="Actualizar">
                    </form>
                  </div>
                  <button style="margin-left:10px" type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
              </div>
            </div>
          </div>
        <?php }
      } else {
        echo "Escribe un indicio de búsqueda:";
      }
      ?>

    </table>
  </fieldset>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/c36cb32bff.js" crossorigin="anonymous"></script>
</body>

</html>