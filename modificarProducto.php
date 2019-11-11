<?php

require_once('clases/autoload.php');
require_once('funciones/autoload.php');

if(isset($_GET['producto_id'])){
  $producto = $bdd->getProductoConId((int)$_GET['producto_id']);
  $_SESSION['producto_nombre'] = $producto['nombre'];
}

$categorias = $bdd->getCategorias();
$seccion = "Modificar Producto";

if($_POST){
  $producto = new Producto($_POST['precio'], $_POST['nombre'], $_POST['descripcion'], $_POST['categoria']);

  if($_POST['nombre'] != ""){
    $producto->setImagen(guardarImagen($_FILES['imagen'],$_POST['nombre']));
  } else {
    $producto->setImagen(guardarImagen($_FILES['imagen'],$_SESSION['producto_nombre']));
  }

  $producto->actualizar($bdd);

  header('location:gestor.php');

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once('head.php') ?>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">

  </head>
  <body>
    <div class="container-fluid">
      <?php require_once('header.php'); ?>

      <main>
        <form class="" action="modificarProducto.php" method="post" enctype="multipart/form-data">
          <div class="">
            <h4>Nombre</h4>
            <p>Actual: <?=$producto['nombre']?></p>
            <label for="nombre">Nuevo: </label>
            <input type="text" name="nombre" id="nombre" value="">
          </div>
          <div class="">
            <h4>Descripcion</h4>
            <p>Actual: <?=$producto['descripcion']?></p>
            <label for="descripcion">Nuevo: </label>
            <input type="text" name="descripcion" id="descripcion" value="">
          </div>
          <div class="">
            <h4>Precio</h4>
            <p>Actual: <?=$producto['precio']?></p>
            <label for="precio">Nuevo: </label>
            <input type="text" name="precio" id="precio" value="">
          </div>
          <div class="">
            <h4>Categoria</h4>
            <p>Actual: <?=$producto['categoria']?></p>
            <label for="categoria">Nuevo: </label>
            <select id="categoria" name="categoria">
              <?php foreach($categorias as $categoria) { ?>
                <option value="<?=$categoria['nombre']?>"><?=$categoria['nombre']?></option>
              <?php } ?>
            </select>
          </div>
          <div class="">
            <h4>Imagen</h4>
            <p>Actual: <img src="img/<?=$producto['imagen']?>" alt=""></p>
            <label for="imagen">Nuevo: </label>
            <input type="file" name="imagen" id="imagen" value="">
          </div>
          <button type="submit" name="button">Actualizar</button>
        </form>
      </main>
      <?php require_once('footer.php'); ?>

    </div>
  </body>
</html>
