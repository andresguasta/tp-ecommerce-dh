<?php

require_once('clases/autoload.php');

$categorias = $bdd->getCategorias();

if($_POST){
  $validador = new ValidadorProductos(["post" => $_POST, "file" => $_FILES]);

  $validador->validarProductoAgregado();

  if($validador->hayErrores()){
    $errores = $validador->getErrores();
  }else{
    $producto = new Producto($_POST['precio'], $_POST['nombre'], $_POST['descripcion'], $_POST['categoria'], $bdd->guardarImagen('img/', $_POST['nombre'], $_FILES['imagen']));

    $producto->agregar($bdd);

    header('location:gestor.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once('head.php') ?>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/agregarProducto.css">

  </head>
  <body>
    <div class="container">

      <?php require_once('header.php'); ?>

      <main>
        <form class="" action="agregarProducto.php" method="post" enctype="multipart/form-data">
          <div class="titulo row">
            <h2>Agregar producto</h2>
          </div>
          <div class="form-group row">
            <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?= (isset($_POST["nombre"]))?$_POST["nombre"]:""?>">
            </div>
            <?php
            if(isset($errores['nombre'])){
              foreach($errores['nombre'] as $error) {?>
                <div class="error form-group row col-12">
                  <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                </div>
              <?php }
            } ?>
          </div>
          <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="precio">Precio</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="precio" name="precio" value="<?=(isset($_POST["precio"]))?$_POST["precio"]:"";?>">
              </div>
              <?php
              if(isset($errores["precio"])){
                foreach($errores["precio"] as $error) {?>
                  <div class="error form-group row col-12">
                    <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                  </div>
                <?php }
              } ?>
          </div>
          <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="descripcion">Descripcion</label>
              <div class="col-sm-6">
                <textarea class="form-control" name="descripcion" id="descripcion" rows="2" cols="20"><?=(isset($_POST['descripcion']))?$_POST['descripcion']:""?></textarea>
              </div>
              <?php
              if(isset($errores["descripcion"])){
                foreach($errores["descripcion"] as $error) {?>
                  <div class="error form-group row col-12">
                    <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                  </div>
                <?php }
              } ?>
          </div>
          <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="categoria">Categoria</label>
              <div class="col-sm-6">
                <select class="form-control" name="categoria" id="categoria">
                   <?php foreach($categorias as $categoria) { ?>
                      <option value="<?=$categoria['nombre']?>"><?=$categoria['nombre']?></option>
                   <?php } ?>
                </select>
              </div>
          </div>
          <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="imagen">Imagen</label>
              <div class="col-sm-6">
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
            <div class="col-8"></div>
            <button class="boton col-2" type="submit" name="button"><i class="fas fa-plus"></i>Agregar</button>
          </div>
        </form>
      </main>
    </div>

    <?php require_once('footer.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
