<?php

  require_once('funciones/autoload.php');
  require_once('clases/autoload.php');

  // si esta logeado va al perfil
  if(estaElUsuarioLogeado()){

    header('location:perfil.php');
  }

  $seccion = "Login";

  if ($_POST) {
    $validador = new ValidadorLogin($_POST);

    $validador->validar($bdd);

    if($validador->hayErrores()){
      $errores = $validador->getErrores();
    } else {
      $_SESSION['email'] = $_POST['email'];

      if (isset($_POST['recuerdame'])) {
          setcookie('recuerdame', $_POST['email'], time() + 60*60*24*7 );
      }

      header('location:perfil.php');
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php') ?>

  <head>
    <link rel="stylesheet" href="css/login.css">
  </head>

  <body>

  <div class="container">

    <?php require_once('header.php'); ?>

    <main>

      <form action="login.php" method="post" >
        <div class="titulo row">
          <h2>Inicia sesión</h2>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label">Email</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="email"name="email" placeholder="email@example.com" value="<?= (isset($_POST["email"]))?$_POST["email"]:""?>">
          </div>
          <?php
            if(isset($errores['email'])){
              foreach($errores['email'] as $error) {?>
                <div class="error for-group row col-12">
                  <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                </div>
              <?php }
            } ?>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
          <div class="col-sm-6">
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
          </div>
          <?php
            if(isset($errores['password'])){
              foreach($errores['password'] as $error) {?>
                <div class="error form-group row col-12">
                  <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                </div>
              <?php }
            } ?>
        </div>
        <div class="form-group row recuerdame">
          <input type="checkbox" id="recuerdame" name="recuerdame" value="">
          <label for="recuerdame">No cerrar mi sesión</label>
        </div>
        <div class="link form-group row">
          <a href="registro.php">No tienes una cuenta? Regístrate</a>
        </div>
        <div class="link form-group row">
          <a href="home.php">Olvidé mi contraseña</a>
        </div>
        <div class="form-group row">
          <div class="col-8"></div>
          <button class="boton col-2" type="submit" name="button">Iniciar sesión</button>
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
