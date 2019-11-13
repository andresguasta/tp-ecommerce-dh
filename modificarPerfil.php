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

    <div class="container">

      <?php require_once('header.php'); ?>

      <main>

        <form action="modificarPerfil.php" method="post" enctype="multipart/form-data">
          <div class="titulo row">
            <h2>Actualizar informacion de usuario</h2>
          </div>
          <div class="form-group row">
            <label for="nombre" class="col-sm-12 col-form-label">Nombre: <?=$usuario['nombre']?></label>
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
            <label for="apellido" class="col-sm-12 col-form-label">Apellido: <?=$usuario['apellido']?></label>
            <label for="apellido" class="col-sm-4 col-form-label">Actualizar apellido: </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Nuevo apellido" value="<?= (isset($_POST["apellido"]))?$_POST["apellido"]:""?>">
            </div>
            <?php
              if(isset($errores['apellido'])){
                foreach($errores['apellido'] as $error) {?>
                  <div class="error for-group row col-12">
                    <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                  </div>
                <?php }
              } ?>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-12 col-form-label">Email: <?=$usuario['email']?></label>
            <label for="email" class="col-sm-4 col-form-label">Actualizar email: </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="email" name="email" placeholder="Nuevo email" value="<?= (isset($_POST["email"]))?$_POST["email"]:""?>">
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
            <label for="telefono" class="col-sm-12 col-form-label">Telefono: <?= (isset($usuario["telefono"]))?$usuario["telefono"]:"---"?></label>
            <label for="telefono" class="col-sm-4 col-form-label">Actualizar telefono: </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Nuevo telefono" value="<?= (isset($_POST["telefono"]))?$_POST["telefono"]:""?>">
            </div>
            <?php
              if(isset($errores['telefono'])){
                foreach($errores['telefono'] as $error) {?>
                  <div class="error for-group row col-12">
                    <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                  </div>
                <?php }
              } ?>
          </div>
          <div class="form-group row">
            <label for="fecha_nac" class="col-sm-12 col-form-label">Fecha de nacimiento: <?=$usuario['fecha_nac']?></label>
            <label for="fecha_nac" class="col-sm-4 col-form-label">Actualizar fecha de nacimiento: </label>
            <div class="col-sm-6">
              <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?= (isset($_POST["fecha_nac"]))?$_POST["fecha_nac"]:""?>">
            </div>
            <?php
              if(isset($errores['fecha_nac'])){
                foreach($errores['fecha_nac'] as $error) {?>
                  <div class="error for-group row col-12">
                    <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                  </div>
                <?php }
              } ?>
          </div>
          <div class="form-group row">
            <label for="avatar" class="col-sm-4 col-form-label">Actualizar avatar</label>
            <div class="col-sm-6">
              <input type="file" class="form-control" id="avatar" name="avatar" value="">
            </div>
            <?php if(isset($errores["avatar"])){
              foreach($errores["avatar"] as $error) {?>
                <div class="error col-12 col-lg-6">
                  <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                </div>
              <?php }
            } ?>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-4 col-form-label">Ingrese la contraseña para confirmar los cambios</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" id="password" name="password" value="">
            </div>
            <?php if(isset($errores['password'])){
                foreach($errores['password'] as $error) {?>
                  <div class="error col-12 col-lg-6">
                    <i class="fas fa-exclamation-triangle"></i><?= $error ?>
                  </div>
                <?php }
            } ?>
          </div>
          <div class="form-group row">
            <div class="col-6"></div>
            <button class="boton col-4" type="submit" name="button">Actualizar datos</button>
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
