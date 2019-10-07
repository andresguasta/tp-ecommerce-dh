<?php

  require_once('funciones/autoload.php');

  $seccion = "Home";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php require_once('head.php') ?>

<head>
  <link rel="stylesheet" href="css/home.css">
</head>

<body>

  <div class="container-fluid">

    <?php require_once('header.php'); ?>

    <main>

      <div class="carrito-mas-gestor">
        <div class="carrito"><a href="carro.php"><i class="fas fa-shopping-cart"></i>Ver Carro</a></div>
        <div class="gestor-productos"><a href="gestor.php"><i class="fas fa-tools"></i>Gestor de productos</a></div>
      </div>

      <div class="titulo">
        <h2>Pantalones</h2>
      </div>

      <section class="productos">
        <?php mostrarpantalon(); ?>
      </section>


      <div class="titulo">
        <h2>Camisas</h2>
      </div>

      <section class="productos">
        <?php mostrarcamisa(); ?>

      </section>

    </main>

    <?php require_once('footer.php'); ?>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
