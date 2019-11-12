<?php

  require_once('funciones/autoload.php');
  require_once('clases/autoload.php');

  if(!estaElUsuarioLogeado()){

    header('location:login.php');
  }

  $seccion = 'Modificar Perfil';

  $usuario = $bdd->getUsuarioConEmail($_SESSION['email']);

  if($_POST){
    $validador = new ValidadorModificaciones(["post" => $_POST, "file" => $_FILES, 'email_actual' => $usuario['email']]);

    $validador->validar($bdd);

    if($validador->hayErrores()){
      $errores = $validador->getErrores();
    }else{
      if($_POST['email'] == ""){
        $email = $_SESSION['email'];
      } else {
        $email = $_POST['email'];
      }

      $usuario = new Usuario($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'], $_POST['fecha_nac'], $_POST['telefono'], guardarAvatar($email, $_FILES['avatar']));

      $usuario->actualizar($bdd);

      header('location:perfil.php');
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php'); ?>

  <head>
    <link rel="stylesheet" href="css/modificarPerfil.css">
  </head>

  <body>

    <div class="container-fluid">

      <?php require_once('header.php'); ?>

      <main>

        <form class="" action="modificarPerfil.php" method="post" enctype="multipart/form-data">

          <div class="contenido-formulario row">

            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="avatar">Actualizar avatar</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="file" id="avatar" name="avatar" value="">
                </div>

                <?php
                  if(isset($errores["avatar"])){
                    foreach($errores["avatar"] as $error) {?>
                      <div class="error col-12 col-lg-6">
                        <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                      </div>
                    <?php }
                  } ?>

              </div>
            </div>

            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 dato-actual">
                  <label for="nombre">Nombre: <?=$usuario['nombre']?></label>
                </div>
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="nombre">Actualizar nombre</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="text" id="nombre" name="nombre" value="">
                </div>

                <?php
                  if(isset($errores["nombre"])){
                    foreach($errores["nombre"] as $error) {?>
                      <div class="error col-12 col-lg-6">
                        <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                      </div>
                    <?php }
                  } ?>

              </div>
            </div>

            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 dato-actual">
                  <label for="nombre">Apellido: <?=$usuario['apellido']?></label>
                </div>
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="apellidoapellido">Actualizar apellido</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="text" id="apellido" name="apellido" value="">
                </div>

                <?php
                  if(isset($errores["apellido"])){
                    foreach($errores["apellido"] as $error) {?>
                      <div class="error col-12 col-lg-6">
                        <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                      </div>
                    <?php }
                  } ?>

              </div>
            </div>

            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 dato-actual">
                  <label for="email">Email: <?=$usuario['email']?></label>
                </div>
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="email">Actualizar email</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="text" id="email" name="email" value="">
                </div>

                <?php
                  if(isset($errores["email"])){
                    foreach($errores["email"] as $error) {?>
                      <div class="error col-12 col-lg-6">
                        <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                      </div>
                    <?php }
                  } ?>

              </div>
            </div>

            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 dato-actual">
                  <label for="fecha_nac">Fecha de nacimiento: <?=$usuario['fecha_nac']?></label>
                </div>
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="fecha_nac">Actualizar fecha de nacimiento</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="date" id="fecha_nac" name="fecha_nac" value="">
                </div>

                <?php
                  if(isset($errores["fecha_nac"])){
                    foreach($errores["fecha_nac"] as $error) {?>
                      <div class="error col-12 col-lg-6">
                        <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                      </div>
                    <?php }
                  } ?>

              </div>
            </div>

            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 dato-actual">
                  <label for="telefono">Telefono: <?=($usuario['telefono'])?$usuario['telefono']:'---'?></label>
                </div>
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="telefono">Actualizar telefono</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="tel" id="telefono" name="telefono" value="">
                </div>

                <?php
                  if(isset($errores["telefono"])){
                    foreach($errores["telefono"] as $error) {?>
                      <div class="error col-12 col-lg-6">
                        <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                      </div>
                    <?php }
                  } ?>

              </div>
            </div>

            <div class="col-12 campo">
              <div class="row">
                <div class="col-8 dato-campo">
                  <label for="password">Ingrese la contraseña para confirmar los cambios</label>
                </div>
                <div class="col-4 valor-campo">
                  <input type="password" id="password" name="password" value="">
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

            <div class="col-12 container-botones">
              <div class="row">
                <div class="col-9 container-boton-submit">
                  <button class="boton-submit" type="submit" name="button">Actualizar</button>
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
