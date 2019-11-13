<?php

require_once('clases/autoload.php');

if(Autenticador::getInstancia()->estaElUsuarioLogeado()){
  header('location:perfil.php');
}

if($_POST){

  $validador = new ValidadorRegistro(["post" => $_POST, "file" => $_FILES]);

  $validador->validar($bdd);

  if($validador->hayErrores()){
    $errores = $validador->getErrores();
  } else {
    $usuario = new Usuario($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'], $_POST['fecha_nac'], $_POST['telefono'], $bdd->guardarImagen('img/usuarios/', $_POST['email'], $_FILES['avatar']));

    $_SESSION['email'] = $usuario->getEmail();
    $_SESSION['es_admin'] = false;

    $usuario->agregar($bdd);

    if (isset($_POST['recuerdame'])) {
      setcookie('recuerdame', $usuario->getEmail(), time() + 60*60*24*7 );
    }

    header('location:perfil.php');
  }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <?php require_once('head.php'); ?>
    <link rel="stylesheet" href="css/registro.css">
  </head>

  <body>

  <div class="container-fluid">

    <?php require_once('header.php'); ?>

    <main>
      <form class="" action="registro.php" method="post" enctype="multipart/form-data">
        <div class="titulo row">
          <h2>Registrate</h2>
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
            <label class="col-sm-4 col-form-label" for="apellido">Apellido</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="apellido" name="apellido" value="<?=(isset($_POST["apellido"]))?$_POST["apellido"]:"";?>">
            </div>
            <?php
            if(isset($errores["apellido"])){
              foreach($errores["apellido"] as $error) {?>
                <div class="error form-group row col-12">
                  <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                </div>
              <?php }
            } ?>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="email">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="email" name="email" value="<?=(isset($_POST["email"]))?$_POST["email"]:"";?>">
            </div>
            <?php
            if(isset($errores["email"])){
              foreach($errores["email"] as $error) {?>
                <div class="error form-group row col-12">
                  <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                </div>
              <?php }
            } ?>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="password">Contraseña</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="password" name="password" value="">
            </div>
            <?php
            if(isset($errores["password"])){
              foreach($errores["password"] as $error) {?>
                <div class="error form-group row col-12">
                  <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                </div>
              <?php }
            } ?>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="confirmacion">Confirme contraseña</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="confirmacion" name="confirmacion" value="">
            </div>
            <?php
            if(isset($errores["confirmacion"])){
              foreach($errores["confirmacion"] as $error) {?>
                <div class="error form-group row col-12">
                  <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                </div>
              <?php }
            } ?>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="telefono">Telefono</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?=(isset($_POST["telefono"]))?$_POST["telefono"]:"";?>">
            </div>
            <?php
            if(isset($errores["telefono"])){
              foreach($errores["telefono"] as $error) {?>
                <div class="error form-group row col-12">
                  <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                </div>
              <?php }
            } ?>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="fecha_nac">Fecha de nacimiento</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?=(isset($_POST["fecha_nac"]))?$_POST["fecha_nac"]:"";?>">
            </div>
            <?php
            if(isset($errores["fecha_nac"])){
              foreach($errores["fecha_nac"] as $error) {?>
                <div class="error form-group row col-12">
                  <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                </div>
              <?php }
            } ?>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="avatar">Avatar</label>
            <div class="col-sm-6">
              <input type="file" class="form-control" id="avatar" name="avatar" value="">
            </div>
            <?php
            if(isset($errores["avatar"])){
              foreach($errores["avatar"] as $error) {?>
                <div class="error form-group row col-12">
                  <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                </div>
              <?php }
            } ?>
        </div>
        <div class="form-group row checkbox">
          <input type="checkbox" id="terms_cond" name="terms_cond" value="">
          <label for="terms_cond">Acepto los Términos y Condiciones</label>
          <?php
          if(isset($errores["terms_cond"])){
            foreach($errores["terms_cond"] as $error) {?>
              <div class="error col-12 col-lg-6">
                <i class="fas fa-exclamation-triangle"></i><?= $error ?>
              </div>
            <?php }
          } ?>
        </div>
        <div class="form-group row checkbox">
          <input type="checkbox" id="recuerdame" name="recuerdame" value="">
          <label for="recuerdame">No cerrar mi sesión</label>
        </div>
        <div class="form-group row">
          <div class="col-8"></div>
          <button class="boton col-2" type="submit" name="button">Registrarme</button>
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
