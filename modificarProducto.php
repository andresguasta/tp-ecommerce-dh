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
  if($_POST['nombre'] == ""){
    $nombre = $_SESSION['prodcuto_nombre'];
  } else {
    $nombre = $_POST['nombre'];
  }

  $producto = new Producto($_POST['precio'], $_POST['nombre'], $_POST['descripcion'], $_POST['categoria'], guardarImagen($_FILES['imagen'], $nombre));

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
    <link rel="stylesheet" href="css/modificarProducto.css">

  </head>
  <body>
    <div class="container-fluid">
      <?php require_once('header.php'); ?>

      <main>
        <form class="" action="modificarProducto.php" method="post" enctype="multipart/form-data">
          <div class="campos">
            <div class="">
              <h4>Nombre</h4>
              <p>Actual: <?=$producto['nombre']?>
              <label for="nombre">Nuevo: </label>
              <input type="text" name="nombre" id="nombre" value="">
              </p>
            </div>
            <div class="">
              <h4>Descripcion</h4>
              <p>Actual: <?=$producto['descripcion']?>
              <label for="descripcion">Nuevo: </label>
              <input type="text" name="descripcion" id="descripcion" value="">
              </p>
            </div>
            <div class="">
              <h4>Precio</h4>
              <p>Actual: <?=$producto['precio']?>
              <label for="precio">Nuevo: </label>
              <input type="text" name="precio" id="precio" value="">
              </p>
            </div>
            <div class="">
              <h4>Categoria</h4>
              <p>Actual: <?=$producto['categoria']?>
              <label for="categoria">Nuevo: </label>
                <select id="categoria" name="categoria">
                  <?php foreach($categorias as $categoria) { ?>
                    <option value="<?=$categoria['nombre']?>"><?=$categoria['nombre']?></option>
                  <?php } ?>
                </select>
              </p>
            </div>
          </div>
          <div class="imagen">
            <h4>Imagen</h4>
            <p><img src="img/<?=$producto['imagen']?>" alt=""></p>
            <label for="imagen">Nuevo: </label>
            <input type="file" name="imagen" id="imagen" value="">
          </div>
          <div class="boton">
            <button type="submit" name="button">Actualizar</button>
          </div>
        </form>
      </main>
      <?php require_once('footer.php'); ?>

    </div>
  </body>
</html>
