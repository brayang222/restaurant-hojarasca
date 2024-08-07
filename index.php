<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Restaurante con gestion de productos.">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" name="compatible" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Restaurant hojarasca</title>
  <script src="https://kit.fontawesome.com/c49d8236c4.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@700&family=Mulish:wght@400;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/navbar.css" />
  <link rel="icon" type="image/png" href="assets/favicon.png">
</head>
<body>
  <div id="loader"></div>
  <header class="encabezado" id="content">
    <?php include 'php/navbar.php' ?>
    <div class="contenido-header">
      <div class="contenedor-encabezado">
        <div class="texto-encabezado">
          <h2>Bienvenido!</h2>
          <a href="php/compraDinamica.php" class="btn bordes">Nuestro menú</a>
        </div>
        <video autoplay loop muted>
          <source src="assets/bg_video.mp4" />
          <track kind="captions" label="Español" src="tus_subtitulos.vtt" srclang="es">
        </video>
      </div>
    </div>
  </header>
  <div class="contenedor-nosotros contenedor">
    <div class="texto-nosotros">
      <p class="bienvenida" id="sobrenosotros">Bienvenido a!</p>
      <h1>Restaurant Hojarasca</h1>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil esse
        architecto amet qui unde iusto enim consequatur? Eaque facere, neque
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur sequi
        suscipit, dolorum mollitia, a optio voluptas sunt commodi ad unde,
        aspernatur sint hic eos ab corporis? Molestiae quidem ullam cumque!
        rem quaerat possimus ipsa laborum tenetur distinctio rerum iure sed?
      </p>
      <a href="#contacto" class="btn btn-rojo">Contactar</a>
    </div>
    <div class="img-nosotros">
      <div class="imagen1">
        <img src="assets/nosotros1.webp" alt="mujer comiendo pizza" />
      </div>
      <div class="imagen2">
        <img src="assets/nosotros2.webp" alt="mujeres comiendo" />
        <img src="assets/nosotros3.webp" alt="pasta" />
      </div>
    </div>
  </div>
  <div class="separador">
    <div class="contenido-separador contenedor">
      <h2>Comida Colombiana para cualquier hora del día</h2>
      <p>Empieza tú día comiendo deliciosa comida o un café Colombiano</p>
      <a href="compra.html" class="btn btn-verde">Ordenar ahora</a>
    </div>
  </div>
  <section class="chef contenedor" id="chef section">
    <h2>Chef Ejecutivo</h2>
    <div class="contenido-chef">
      <div class="texto-chef">
        <h3>
          La excelencia está en la diversidad y el modo de progresar es
          conocer y comparar las diversidades de productos, culturas y
          técnicas
        </h3>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum
          quasi delectus explicabo quod facere, repellat odio eius laudantium
          omnis beatae commodi soluta consequatur minima, modi unde quisquam
          officia praesentium odit?
        </p>
        <a href="#" class="btn btn-verde">Leer Biografía</a>
      </div>
      <div class="imagen-chef">
        <img src="assets/chef.webp" alt="foto chef" />
      </div>
    </div>
  </section>
  <div class="formulario-contacto contenedor">
    <div class="informacion-contacto" id="contacto">
      <h3>Contáctanos</h3>
      <p>
        <i class="fa-sharp fa-solid fa-location-dot"></i>23 Santuario
        Antioquia 65541
      </p>
      <p><i class="fa-solid fa-envelope"></i> hojarasca@gmail.com</p>
      <p><i class="fa-sharp fa-solid fa-phone"></i>3126177800</p>
      <div class="redes-sociales">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-twitter"></i>
      </div>
    </div>
    <form class="formulario">
      <div class="input-formulario">
        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Coloca tú nombre" id="nombre" />
      </div>
      <div class="input-formulario">
        <label for="apellido">Apellido</label>
        <input type="text" placeholder="ejemplo@gmail.com" id="apellido" />
      </div>
      <div class="input-formulario">
        <label for="email">Correo</label>
        <input type="email" placeholder="ejemplo@gmail.com" id="email" />
      </div>
      <div class="input-formulario">
        <label for="telefono">Teléfono</label>
        <input type="tel" placeholder="+57 3126177800" id="telefono" />
      </div>
      <div class="input-formulario">
        <label for="mensaje">Mensaje<textarea></textarea></label>
      </div>
      <div class="btn-formulario">
        <input type="submit" value="Enviar" class="btn btn-verde" />
      </div>
    </form>
  </div>
  <div class="pie-pagina">
    <div class="contenedor-piepagina contenedor">
      <div class="info">
        <h3>dirección</h3>
        <p>23. Santuario Anrioquia</p>
      </div>
      <div class="info">
        <h3>Días especiales</h3>
        <p>Jueves y Sábados</p>
      </div>
      <div class="info">
        <h3>Horarios</h3>
        <p>Lunes - Domingo/ 7am - 11pm</p>
        <div class="redes-sociales redes-pie">
          <i class="fa-brands fa-facebook"></i>
          <i class="fa-brands fa-instagram"></i>
          <i class="fa-brands fa-twitter"></i>
        </div>
      </div>
      <div class="info">
        <h3>Noticias</h3>
        <p>Suscríbete para recibir más noticias</p>
        <input type="email" placeholder="Tú correo" />
        <input type="submit" value="suscribirse" class="btn btn-verde" />
      </div>
    </div>
  </div>
  <footer class="footer">
    <p>
      Todos los derechos reservados &copy; 2023 Restaurant Hojarasca,
      desarollado por Brayan Gómez
    </p>
  </footer>
  <script src="js/main.js">  </script>
</body>
</html>