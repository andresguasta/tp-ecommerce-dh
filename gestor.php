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

  <div class="container-fluid">

    <?php require_once('header.php'); ?>

    <main>

      <div class="volver"><a href="home.php"><i class="fas fa-arrow-left"></i>Volver</a></div>

      <div class="agregar">
        <button type="button" name="button"><a href="agregarProducto.php"><i class="fas fa-plus"></i>Agregar producto</a></button>
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
            <div class="borrar-editar">
              <div class="editar">
                <button type="button" name="button"><a href="modificarProducto.php?producto_id=<?=$producto['id']?>"><i class="fas fa-tools"></i>Modificar publicacion</a></button>
              </div>
              <div class="borrar">
                <button type="button" name="button"><a href="eliminarProducto.php?producto_id=<?=$producto['id']?>"><i class="fas fa-times"></i>Quitar del catalogo</a></button>
              </div>
            </div>
          </article>
        <?php } ?>
      </section>

      <div class="volver"><a href="home.php"><i class="fas fa-arrow-left"></i>Volver</a></div>

    </main>

    <?php require_once('footer.php'); ?>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
