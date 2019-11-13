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
          <div class="titulo row">
            <h2>Actualizar producto</h2>
          </div>
          <div class="form-group row">
            <label for="nombre" class="col-sm-12 col-form-label">Nombre: <?=$producto['nombre']?></label>
            <label for="nombre" class="col-sm-4 col-form-label">Actualizar nombre: </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nuevo nombre" value="<?= (isset($_POST["nombre"]))?$_POST["nombre"]:""?>">
            </div>
            <?php
              if(isset($errores['nombre'])){
                foreach($errores['nombre'] as $error) {?>
                  <div class="error for-group row col-12">
                    <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                  </div>
                <?php }
              } ?>
          </div>
          <div class="form-group row">
            <label for="precio" class="col-sm-12 col-form-label">Precio: <?=$producto['precio']?></label>
            <label for="precio" class="col-sm-4 col-form-label">Actualizar precio: </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="precio" name="precio" placeholder="Nuevo precio" value="<?= (isset($_POST["precio"]))?$_POST["precio"]:""?>">
            </div>
            <?php
              if(isset($errores['precio'])){
                foreach($errores['precio'] as $error) {?>
                  <div class="error for-group row col-12">
                    <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                  </div>
                <?php }
              } ?>
          </div>
          <div class="form-group row">
            <label for="descripcion" class="col-sm-12 col-form-label">Descripcion: <?=$producto['descripcion']?></label>
            <label for="descripcion" class="col-sm-4 col-form-label">Actualizar descripcion: </label>
            <div class="col-sm-6">
              <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Nueva descripcion" value="<?= (isset($_POST["descripcion"]))?$_POST["descripcion"]:""?>"></textarea>
            </div>
            <?php
              if(isset($errores['descripcion'])){
                foreach($errores['descripcion'] as $error) {?>
                  <div class="error for-group row col-12">
                    <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                  </div>
                <?php }
              } ?>
          </div>
          <div class="form-group row">
              <label class="col-sm-12 col-form-label" for="categoria">Categoria: <?=$producto['categoria']?></label>
              <label class="col-sm-4 col-form-label" for="categoria">Categoria nueva:</label>
              <div class="col-sm-6">
                <select class="form-control" name="categoria" id="categoria">
                   <?php foreach($categorias as $categoria) { ?>
                      <option value="<?=$categoria['nombre']?>"><?=$categoria['nombre']?></option>
                   <?php } ?>
                </select>
              </div>
          </div>
          <div class="form-group row">
              <label class="col-sm-12 col-form-label" for="imagen">Imagen:</label>
              <div class="c-img col-sm-12">
                <img id="imagen-producto" src="img/<?=$producto['imagen']?>" alt="">
              </div>
              <label class="col-sm-4 col-form-label" for="imagen">Imagen nueva:</label>
              <div class="col-sm-6 input-imagen">
                <input type="file" class="form-control" id="imagen" name="imagen" value="">
              </div>
              <?php
              if(isset($errores["imagen"])){
                foreach($errores["imagen"] as $error) {?>
                  <div class="error form-group row col-12">
                    <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                  </div>
                <?php }
              } ?>
          </div>
          <div class="form-group row">
            <div class="col-6"></div>
            <button class="boton col-4" type="submit" name="button">Actualizar</button>
          </div>
      </main>
    </div>

    <?php require_once('footer.php'); ?>

  </body>
</html>
