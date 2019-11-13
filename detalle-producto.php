<?php

require_once('clases/autoload.php');

if(!isset($_GET['producto_id'])){
  header('location:home.php');
}

$producto = $bdd->getProductoConId($_GET['producto_id']);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php require_once('head.php') ?>

<head>
  <link rel="stylesheet" href="css/detalle-producto.css">
</head>

<body>

  <div class="container">

    <?php require_once('header.php'); ?>

    <main>

      <button class="boton"><a href="home.php"><i class="fas fa-arrow-left"></i>Volver</a></button>

      <div class="producto">
        <div class="imagen-producto">
          <img src="img/<?=$producto['imagen']?>" alt="pantalon">
        </div>
        <div class="nombre-mas-precio">
          <div class="nombre"><h4><?= $producto['nombre'] ?></h4></div>
          <div class="precio"><h4>$<?=$producto['precio'] ?></h4></div>
        </div>
        <div class="descripcion"><p><?= $producto['descripcion'] ?></p></div>
        <div class="botones">
          <?php if(Autenticador::getInstancia()->estaElUsuarioLogeado()) { ?>
            <button class="boton aniadir-al-carro"><a href="agregarAlCarro.php?producto_id=<?=$producto['id']?>"><i class="fas fa-cart-plus"></i> Añadir al carro</a></button>
          <?php } ?>
        </div>
    </main>
  </div>

  <?php require_once('footer.php'); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
