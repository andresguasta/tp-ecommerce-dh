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
        <?php if(estaElUsuarioLogeado()) { ?>
          <div class="boton carrito"><a href="carro.php"><i class="fas fa-shopping-cart"></i>Ver Carro</a></div>
        <?php } ?>
        <div class="boton gestor-productos"><a href="gestor.php"><i class="fas fa-tools"></i>Gestor de productos</a></div>
      </div>

      <section class="productos">
        <?php foreach($productos as $producto) { ?>
          <article class="producto">
            <div class="imagen-producto">
              <img src="img/<?=$producto['imagen']?>" alt="pantalon">
            </div>
            <div class="nombre-mas-precio">
              <div class="nombre"><h4><?= $producto['nombre'] ?></h4></div>
              <div class="precio"><h4>$<?=$producto['precio'] ?></h4></div>
            </div>
            <div class="descripcion"><p><?= $producto['descripcion'] ?></p></div>
            <div class="botones">
              <div class="boton ver-mas"><a href="detalle-producto.php?id=<?=$producto['id'] ?>">Ver en detalle</a></div>
              <?php if(estaElUsuarioLogeado()) { ?>
                <div class="boton aniadir-al-carro"><a href="agregarAlCarro.php?producto_id=<?=$producto['id']?>"> <i class="fas fa-cart-plus"></i> Añadir al carro</a></div>
              <?php } ?>
            </div>
          </article>
        <?php } ?>
      </section>


    </main>
  </div>

  <?php require_once('footer.php'); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
