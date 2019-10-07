<?php

  require_once('funciones/autoload.php');

  if(!estaElUsuarioLogeado()){

    header('location:login.php');
  }

  $seccion = 'Modificar Perfil';

  $usuario = buscarUsuario($_SESSION["email"]);

  if($_POST){

    $errores = validarModificacionesPerfil($_POST, $_FILES);

    if ( !hayErrores ( $errores ) ) {

      guardarModificacionesUsuario($_POST, $_FILES["foto-perfil"]);

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
                  <label for="foto-perfil">Modificar foto de perfil</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="file" id="foto-perfil" name="foto-perfil" value="">
                </div>

                <?php
                if(isset($errores["foto-perfil"]) && $errores["foto-perfil"] != ""){ ?>
                  <div class="error col-12 col-12 col-lg-6">
                    <i class="fas fa-exclamation"></i><?= $errores["foto-perfil"] ?>
                  </div>
                <?php } ?>

              </div>
            </div>

            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 dato-actual">
                  <label for="nombre">Nombre actual: <?=$usuario["nombre"]?></label>
                </div>
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="nombre">Nuevo nombre</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="text" id="nombre" name="nombre" value="">
                </div>

                <?php
                if(isset($errores["nombre"]) && $errores["nombre"] != ""){ ?>
                  <div class="error col-12 col-12 col-lg-6">
                    <i class="fas fa-exclamation"></i><?= $errores["nombre"] ?>
                  </div>
                <?php } ?>

              </div>
            </div>

            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 dato-actual">
                  <label for="email">Email actual: <?=$usuario["email"]?></label>
                </div>
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="email">Nuevo email</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="email" id="email" name="email" value="">
                </div>

                <?php
                if(isset($errores["email"]) && $errores["email"] != ""){ ?>
                  <div class="error col-12 col-12 col-lg-6">
                    <i class="fas fa-exclamation"></i><?= $errores["email"] ?>
                  </div>
                <?php } ?>

              </div>
            </div>

            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 dato-actual">
                  <label for="telefono">Telefono actual: <?=$usuario["telefono"]?></label>
                </div>
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="telefono">Nuevo telefono</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="tel" id="telefono" name="telefono" value="">
                </div>
              </div>
            </div>

            <div class="col-12 campo">
              <div class="row">
                <div class="col-12 dato-actual">
                  <label for="direccion">Direccion actual: <?= (isset($usuario["direccion"]))?$usuario["direccion"]:"" ?></label>
                </div>
                <div class="col-12 col-lg-6 dato-campo">
                  <label for="direccion">Nueva direccion</label>
                </div>
                <div class="col-12 col-lg-6 valor-campo">
                  <input type="direccion" id="direccion" name="direccion" value="">
                </div>
              </div>
            </div>

            <div class="col-12 container-botones">
              <div class="row">
                <div class="col-9 container-boton-submit">
                  <button class="boton-submit" type="submit" name="button">Enviar</button>
                </div>
              </div>
            </div>

          </div>


<!--
          <div class="">
            <label for="email">Modificar email</label>
            <input type="email" name="email" id="email" value="">
          </div>
          <?php
            if(isset($errores["email"]) && $errores["email"] != ""){ ?>
                <div class="error col-12 col-12 col-lg-6">
                  <i class="fas fa-exclamation"></i><?= $errores["email"] ?>
                </div>
          <?php } ?>

          <div class="">
            <label for="telefono">Modificar telefono</label>
            <input type="number" name="telefono" id="telefono" value="">
          </div>

          <div class="">
            <label for="direccion">Modificar direccion</label>
            <input type="text" name="direccion" id="direccion" value="">
          </div>

          <div class="">
            <button type="submit" name="button">Aplicar cambios</button>
          </div>
-->

        </form>

      </main>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
