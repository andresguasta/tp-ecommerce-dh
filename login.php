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

  <div class="container-fluid">

    <?php require_once('header.php'); ?>

    <main>

      <form class="" action="login.php" method="post">

        <div class="contenido-formulario row">

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="email">Email</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="email" id="email" name="email" value="<?= (isset($_POST["email"]))?$_POST["email"]:""?>">
              </div>

              <?php
                if(isset($errores['email'])){
                  foreach($errores['email'] as $error) {?>
                    <div class="error col-12 col-lg-6">
                      <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                    </div>
                  <?php }
                } ?>

            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="pass">Contraseña</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="password" id="pass" name="password" value="">
              </div>

              <?php
                if(isset($errores['password'])){
                  foreach($errores['password'] as $error) {?>
                    <div class="error col-12 col-lg-6">
                      <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                    </div>
                  <?php }
                } ?>

            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-3 col-lg-5 valor-campo">
                <input type="checkbox" id="recuerdame" name="recuerdame" value="">
              </div>
              <div class="col-9 col-lg-7 dato-campo">
                <label for="recuerdame">No cerrar mi sesión</label>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 dato-campo">
                <label for=""><a href="home.php">Olvidé mi contraseña</a></label>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 dato-campo">
                <label for=""><a href="registro.php">Registrarse</a></label>
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
