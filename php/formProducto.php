<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/normalize.css" />
        <link rel="stylesheet" href="../css/navbar.css" />    
  <link rel="icon" type="image/png" href="assets/favicon.png">
  <style>
    html {
    font-size: 80.5% !important; 
    /*para hacer más suave las trancisiones*/
}
  </style>
</head>

<body style="background-color: #111821;">
    <?php include "navbar.php" ?>

    <div class="container" style="max-width: 500px;
    margin: 100px auto;
    padding: 20px;
    background-color: #ababab;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(255, 255, 255, 1.2);">
        <h3 class="card-title" style="text-align: center;padding: 20px; font-family: serif; font-weight: bold;">
            Formulario Producto</h3>
        <form action="regProducto.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="Nombre" id="nombre-producto">
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo</label>
                <input type="text" class="form-control" name="Tipo" id="tipo-producto">
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de creacion</label>
                <input type="date" class="form-control" name="fechaCreacion" id="fecha-producto">
            </div>
            <div class="mb-3">
                <label class="form-label">Ingredientes</label>
                <input type="text" class="form-control" name="Ingredientes" id="ingredienes-producto">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" class="form-control" name="Imagen" id="imagen-produco" accept='image/*'>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="Descripcion" id="descripcion-producto">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="number" class="form-control" name="Precio" id="precio-producto">
            </div>
            <div class="mb-3">
                <label class="form-label">Descuento</label>
                <input type="number" class="form-control" name="Descuento" id="descuento-producto">
            </div>


            <input name="btn" type="submit" class="btn btn-primary" value="Enviar" style="background-color: #354a78;
    color: white;
    margin-top: 20px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;">
        </form>
    </div>
    <script src="../js/main.js">  </script>
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