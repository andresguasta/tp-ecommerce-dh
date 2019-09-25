<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php') ?>

  <head>
    <link rel="stylesheet" href="css/carro.css">
  </head>

  <body>

  <div class="container-fluid">

    <?php

    require_once('header.php');

    echo dar_header('Carro');

    ?>

    <main>

      <div class="volver"><a href="home.php"><i class="fas fa-arrow-left"></i>Volver</a></div>

      <h4>En mi carro actualmente: </h4>

      <div class="producto">
        <div class="imagen-producto">
          <img src="img/pan-azul.jpg" alt="pantalon">
        </div>
        <div class="nombre-mas-precio">
          <div class="nombre"><h4>Pantalon Azul</h4></div>
          <div class="precio"><h4>$750</h4></div>
        </div>
        <div class="descripcion"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
      </div>

      <div class="precio-total">
        <div class="texto">
          <h2>Total</h2>
        </div>
        <div class="precio-final">
          <h2> $750 </h2>
        </div>
      </div>

    </main>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
