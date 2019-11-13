<?php

  require_once('clases/autoload.php');

  $seccion = "Gestor de productos";

  $productos = $bdd->getProductos();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php') ?>

  <head>
    <link rel="stylesheet" href="css/gestor.css">
  </head>

  <body>

  <div class="container">

    <?php require_once('header.php'); ?>

    <main>

      <button class="boton" type="submit" name="button"><a href="home.php"> <i class="fas fa-arrow-left"></i>Volver</a></button>
      <button class="boton" type="submit" name="button"><a href="agregarProducto.php"><i class="fas fa-plus"></i>AgregarProducto</a></button>

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
            <div class="botones row">
                <div class="col-1"></div>
                <button type="button" class="boton col-4" name="button"><a href="modificarProducto.php?producto_id=<?=$producto['id']?>"><i class="fas fa-tools"></i>Modificar publicacion</a></button>
                <div class="col-2"></div>
                <button type="button" class="boton col-4"  name="button"><a href="eliminarProducto.php?producto_id=<?=$producto['id']?>"><i class="fas fa-times"></i>Quitar del catalogo</a></button>
                <div class="col-1"></div>
            </div>
          </article>
        <?php } ?>
      </section>

      <button class="boton" type="submit" name="button"><a href="home.php"> <i class="fas fa-arrow-left"></i>Volver</a></button>

    </main>

  </div>

  <?php require_once('footer.php'); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
