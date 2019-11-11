<?php

require_once('clases/autoload.php');
require_once('funciones/autoload.php');
$seccion='Agregar Producto';

$categorias = $bdd->getCategorias();

if($_POST){

  // VALIDAR DATOS INGRESADOS

  // GUARDAR PRODUCTO EN BDD
  // var_dump($_POST);
  // var_dump($_FILES);

  $prueba=$bdd->agregarProducto();

  //header('location:gestor.php');
}
//if($_FILES){
  //$archivo=$_FILES["imagen"];
  //$nombre=$_POST["nombre"];

  //guardarImagen($archivo,$nombre);


//}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once('head.php') ?>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/agregar.css">

  </head>
  <body>
    <div class="container-fluid">
      <?php require_once('header.php'); ?>

      <main>
        <form class="" action="agregarProducto.php" method="post" enctype="multipart/form-data">
          <div class="contenido-formulario row">

            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="nombre">Nombre</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="text" id="nombre" name="nombre" value="">
                </div>
              </div>
            </div>
            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="descripcion">Descripcion</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="text" id="descripcion" name="descripcion" value="">
                </div>
              </div>
            </div>


            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="precio">Precio</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="text" id="precio" name="precio" value="">
                </div>
              </div>
            </div>


            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="categoria">Categoria</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <select class="" name="categoria" id="categoria">
                     <?php foreach($categorias as $categoria) { ?>
                        <option value="<?=$categoria['nombre']?>"><?=$categoria['nombre']?></option>
                     <?php } ?>
                  </select>
                </div>
              </div>
            </div>


            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="imagen">Imagen</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="file" name="imagen" id="imagen" value="">
                </div>
              </div>
            </div>

          <div class="col-12 container-botones">
            <div class="row">
              <div class="col-12 container-boton-submit">
                <button class="boton-submit" type="submit" name="button">Enviar</button>
              </div>
            </div>
          </div>
          </div>
        </form>


      </main>

      <?php require_once('footer.php'); ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
