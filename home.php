<?php

  require_once('funciones/autoload.php');
  require_once('clases/autoload.php');

  $seccion = "Home";

  $productos = $bdd->getProductos();
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

      <section class="productos">
        <?php foreach($productos as $producto) { ?>
          <article class="producto">
            <div class="imagen-producto">
              <img src="img/<?=$producto['imagen']?>" alt="pantalon">
            </div>
            <div class="nombre-mas-precio">
              <div class="nombre"><h4><?= $producto['nombre'] ?></h4></div>
              <div class="precio"><h4><?=$producto['precio'] ?></h4></div>
            </div>
            <div class="descripcion"><p><?= $producto['descripcion'] ?></p></div>
            <div class="botones">
              <div class="ver-mas"><a href="detalle-producto.php?id=<?=$producto['id'] ?>">Ver mas</a></div>
              <div class="añadir-al-carro"><i class="fas fa-cart-plus"></i> Añadir al carro</div>
            </div>
          </article>
        <?php } ?>
      </section>


    </main>

    <?php require_once('footer.php'); ?>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
