<?php
require_once('clases/autoload.php');

$producto = $bdd->getProductoConId((int)$_GET['producto_id']);

$categorias = $bdd->getCategorias();

if($_POST){

  // VALIDAR DATOS INTRODUCIDOS....

  // ACTUALIZO EL PRODUCTO EN LA BDD

  header('location:gestor.php');

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container-fluid">

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

    </div>
  </body>
</html>
