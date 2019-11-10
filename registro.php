<?php

  require_once('funciones/autoload.php');
  require_once('clases/autoload.php');

  $seccion = "Registro";

  if(estaElUsuarioLogeado()){

    header('location:perfil.php');
  }

  if($_POST){

    $validador = new ValidadorRegistro(["post" => $_POST, "file" => $_FILES]);

    $validador->validar($bdd);

    if($validador->hayErrores()){
      $errores = $validador->getErrores();
    } else {
      $usuario = new Usuario($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'], $_POST['fecha_nac'], $_POST['telefono'], guardarAvatar($_POST['email'], $_FILES['avatar']));

      $_SESSION['email'] = $usuario->getEmail();

      /* GUARDO EN LA BASE DE DATOS */
      $usuario->guardar($bdd);

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

        <div class="contenido-formulario row">

          <div class="encabezado-formulario col-12">
            <h2>Formulario de Registro</h2>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="nombre">Nombre</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="text" id="nombre" name="nombre" value="<?php if(isset($_POST["nombre"]))  echo $_POST["nombre"]  ; ?>">
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
              <div class="col-12 col-lg-6 dato-campo">
                <label for="apellido">Apellido</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="text" id="apellido" name="apellido" value="<?php if(isset($_POST["apellido"]))  echo $_POST["apellido"]  ; ?>">
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
              <div class="col-12 col-lg-6 dato-campo">
                <label for="email">Email</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="text" id="email" name="email" value="<?php if(isset($_POST["email"]))  echo $_POST["email"]  ; ?>">
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
              <div class="col-12 col-lg-6 dato-campo">
                <label for="telefono"><abbr title="Opcional">Telefono</abbr> </label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="tel" id="telefono" name="telefono" value="<?php if(isset($_POST["telefono"]))  echo $_POST["telefono"]  ; ?>">
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
              <div class="col-12 col-lg-6 dato-campo">
                <label for="pass">Contraseña</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="password" id="pass" name="password" value="">
              </div>

              <?php
                if(isset($errores["password"])){
                  foreach($errores["password"] as $error) {?>
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
                <label for="confirmacion ">Repetir Contraseña</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="password" id="confirmacion" name="confirmacion" value="">
              </div>

              <?php
                if(isset($errores["confirmacion"])){
                  foreach($errores["confirmacion"] as $error) {?>
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
                <label for="pais">Pais</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <select class="" name="pais" id="pais">
                  <option value="ar">Argentina</option>
                  <option value="br">Brasil</option>
                  <option value="ch">Chile</option>
                  <option value="co">Colombia</option>
                  <option value="ec">Ecuador</option>
                  <option value="pa">Paraguay</option>
                  <option value="uy">Uruguay</option>
                  <option value="ve">Venezuela</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="fecha_nac">Fecha de nacimiento</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="date" id="fecha_nac" name="fecha_nac" value="<?php if(isset($_POST["fecha_nac"]))  echo $_POST["fecha_nac"]  ; ?>">
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
              <div class="col-12 col-lg-6 dato-campo">
                <label for="avatar">Subir una foto de perfil</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="file" id="avatar" name="avatar" value="<?php if(isset($_POST["avatar"]))  echo $_POST["avatar"]  ; ?>">
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
              <div class="col-3 col-lg-5 valor-campo">
                <input type="checkbox" id="terms_cond" name="terms_cond" value="">
              </div>
              <div class="col-9 col-lg-7 dato-campo">
                <label for="terms_cond">Acepto los Términos y Condiciones</label>
              </div>

              <?php
                if(isset($errores["terms_cond"])){
                  foreach($errores["terms_cond"] as $error) {?>
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

          <div class="col-12 container-botones">
            <div class="row">
              <div class="col-6 container-boton-submit">
                <button class="boton-submit" type="submit" name="button">Enviar</button>
              </div>
              <div class="col-6 container-boton-reset">
                <button class="boton-reset" type="reset" name="button">Reset</button>
              </div>
            </div>
          </div>

        </div>

      </form>


<!--
      <form class="" action="registro.php" method="post" enctype="multipart/form-data">

        <div class="contenido-formulario row">

          <div class="encabezado-formulario col-12">
            <h2>Formulario de Registro</h2>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="nombre">Nombre</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="text" id="nombre" name="nombre" value="<?php if(isset($_POST["nombre"]))  echo $_POST["nombre"]  ; ?>">
              </div>

              <?php
                if(isset($errores["nombre"]) && $errores["nombre"] != ""){ ?>
                    <div class="error col-12 col-12 col-lg-6">
                      <i class="fas fa-exclamation-triangle"></i><?= $errores["nombre"] ?>
                    </div>
              <?php } ?>

            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="email">Email</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="email" id="email" name="email" value="<?php if(isset($_POST["email"]))  echo $_POST["email"]  ; ?>">
              </div>

              <?php
                if(isset($errores["email"]) && $errores["email"] != ""){ ?>
                    <div class="error col-12 col-lg-6">
                      <i class="fas fa-exclamation-triangle"></i><?= $errores["email"] ?>
                    </div>
              <?php } ?>

            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="telefono"><abbr title="Opcional">Telefono</abbr> </label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="tel" id="telefono" name="telefono" value="<?php if(isset($_POST["telefono"]))  echo $_POST["telefono"]  ; ?>">
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="pass">Contraseña</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="password" id="pass" name="contraseña" value="">
              </div>

              <?php
                if(isset($errores["contraseña"]) && $errores["contraseña"] != ""){ ?>
                    <div class="error col-12 col-lg-6">
                      <i class="fas fa-exclamation-triangle"></i><?= $errores["contraseña"] ?>
                    </div>
              <?php } ?>

            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="rep-pass">Repetir Contraseña</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="password" id="rep-pass" name="confirmacion" value="">
              </div>

              <?php
                if(isset($errores["confirmacion"]) && $errores["confirmacion"] != ""){ ?>
                    <div class="error col-12 col-lg-6">
                      <i class="fas fa-exclamation-triangle"></i><?= $errores["confirmacion"] ?>
                    </div>
              <?php } ?>

            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="pais">Pais</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <select class="" name="pais" id="pais">
                  <option value="ar">Argentina</option>
                  <option value="br">Brasil</option>
                  <option value="ch">Chile</option>
                  <option value="co">Colombia</option>
                  <option value="ec">Ecuador</option>
                  <option value="pa">Paraguay</option>
                  <option value="uy">Uruguay</option>
                  <option value="ve">Venezuela</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="fecha_nac">Fecha de nacimiento</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="date" id="fecha_nac" name="fecha_nac" value="<?php if(isset($_POST["fecha_nac"]))  echo $_POST["fecha_nac"]  ; ?>">
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="imagen">Subir una foto de perfil</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="file" id="imagen" name="imagen" value="">
              </div>

              <?php
                if(isset($errores["imagen"]) && $errores["imagen"] != ""){ ?>
                    <div class="error col-12 col-lg-6">
                      <i class="fas fa-exclamation-triangle"></i><?= $errores["imagen"] ?>
                    </div>
              <?php } ?>

            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-3 col-lg-5 valor-campo">
                <input type="checkbox" id="terms_cond" name="terms_cond" value="">
              </div>
              <div class="col-9 col-lg-7 dato-campo">
                <label for="terms_cond">Acepto los Términos y Condiciones</label>
              </div>
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

          <div class="col-12 container-botones">
            <div class="row">
              <div class="col-6 container-boton-submit">
                <button class="boton-submit" type="submit" name="button">Enviar</button>
              </div>
              <div class="col-6 container-boton-reset">
                <button class="boton-reset" type="reset" name="button">Reset</button>
              </div>
            </div>
          </div>

        </div>

      </form>
-->
    </main>

    <?php require_once('footer.php'); ?>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
