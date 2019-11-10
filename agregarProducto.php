<?php

require_once('clases/autoload.php');

$categorias = $bdd->getCategorias();

if($_POST){

  // VALIDAR DATOS INGRESADOS

  // GUARDAR PRODUCTO EN BDD

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
        <form class="" action="agregarProducto.php" method="post" enctype="multipart/form-data">
          <div class="">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="">
          </div>
          <div class="">
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion" value="">
          </div>
          <div class="">
            <label for="precio">Precio</label>
            <input type="text" name="precio" id="precio" value="">
          </div>
          <div class="">
            <label for="categoria">Categoria</label>
            <select class="" name="categoria" id="categoria">
              <?php foreach($categorias as $categoria) { ?>
                <option value="<?=$categoria['nombre']?>"><?=$categoria['nombre']?></option>
              <?php } ?>
            </select>
          </div>
          <div class="">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" value="">
          </div>
          <button type="submit" name="button">Agregar producto</button>
        </form>
      </main>

    </div>
  </body>
</html>
