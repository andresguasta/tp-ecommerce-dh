<?php

require_once('clases/autoload.php');
require_once('funciones/autoload.php');

if(!estaElUsuarioLogeado()){
  header('home.php');
}

 $seccion = "Carro";

 $productos = $bdd->getProductosDeUsuarioConEmail($_SESSION['email']);
 $total = 0;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php') ?>

  <head>
    <link rel="stylesheet" href="css/carro.css">
  </head>

  <body>

  <div class="container">

    <?php require_once('header.php'); ?>

    <main>

      <button type="button" class="boton"><a href="home.php"><i class="fas fa-arrow-left"></i>Volver</a></button>

      <h4>En mi carro actualmente: </h4>

      <?php if($productos) {
        foreach($productos as $producto) { ?>
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
              <div class="boton"><a href="eliminar-del-carrito.php?producto_id=<?=$producto['id']?>"><i class="fas fa-times"></i>Quitar del carrito</a></div>
            </div>
          </article>
        <?php }
      } else {
        echo 'No posee productos en su carro actualmente';
      }?>

      <div class="precio-total row">
        <div class="texto col-6">
          <h2>Total</h2>
        </div>
        <div class="precio-final col-6">
          <h2> $<?=$total?> </h2>
        </div>
      </div>

      <?php if($productos){ ?>
        <div class="vaciar-carro">
          <button class="boton" type="submit" name="button"><a href="vaciar-carro.php">Vaciar carrito</a></button>
        </div>
      <?php } ?>

    </main>
  </div>

  <?php require_once('footer.php'); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
