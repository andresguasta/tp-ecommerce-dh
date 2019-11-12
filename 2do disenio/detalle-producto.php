<?php
  require_once('funciones/autoload.php');

  $seccion = "Detalle del producto";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php require_once('head.php') ?>

<head>
  <link rel="stylesheet" href="css/detalle-producto.css">
</head>

<body>

  <div class="container-fluid">

    <?php require_once('header.php'); ?>

    <main>

      <div class="volver"><a href="home.php"><i class="fas fa-arrow-left"></i>Volver</a></div>
      <?php $aux = $_GET['id'];

        $producto = obtenerIdProducto($aux); ?>

        <div class="producto">
          <div class="imagen-producto">
            <img src="img/<?=$producto['imagen']?>" alt="pantalon">
          </div>
          <div class="nombre-mas-precio">
            <div class="nombre"><h4><?=$producto['nombre']?></h4></div>
            <div class="precio"><h4><?=$producto['precio']?></h4></div>
          </div>
          <div class="descripcion"><p><?=$producto['descripcion']?></p></div>
        </div>

    </main>

    <?php require_once('footer.php'); ?>  

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
