<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario empresa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body style="background-color: #111821;">
 
    <div class="container" style="max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ababab;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(255, 255, 255, 1.2);">
        <h3 class="card-title" style="text-align: center;padding: 20px; font-family: serif; font-weight: bold;">Formulario Empleado</h3>
    <form action="regEmpleado.php" method="post">
        <div class="mb-3">
          <label class="form-label">Cédula empleado</label>
          <input type="number" class="form-control" aria-describedby="cedulaHelp" name="CedulaEmpleado" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="Nombre" id="">
        </div>
        <div class="mb-3">
            <label class="form-label">Rol</label>
            <input type="text" class="form-control" name="Rol" id="">
        </div>
        <div class="mb-3">
            <label class="form-label">Chef</label>
            <input type="number" class="form-control" name="Chef" id="">
        </div>
       
        
        <input type="submit" class="btn btn-primary" value="Enviar" style="background-color: #354a78;
    color: white;
    margin-top: 20px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;">
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c36cb32bff.js" crossorigin="anonymous"></script>
</body>
</html>