<?php

  require_once('funciones/validador.php');
  require_once('funciones/guardador.php');

  $seccion = "Registro";

  if($_POST){

    $errores = validarRegistro($_POST);

    if(!hayErrores($errores)){
      guardarUsuario(crearUsuario($_POST));
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

      <form class="" action="registro.php" method="post">

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
                <input type="text" id="nombre" name="nombre" value="<?php if(isset($_POST["nombre"]))  echo $_POST["nombre"]  ; ?>" required>
              </div>

              <?php
                if(isset($errores["nombre"]) && $errores["nombre"] != ""){
                  echo '
                    <div class="error col-12">
                      <i class="fas fa-exclamation"></i> ' .  $errores["nombre"] . '
                    </div>
                  ';
                }
              ?>

            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="email">Email</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="email" id="email" name="email" value="<?php if(isset($_POST["email"]))  echo $_POST["email"]  ; ?>" required>
              </div>

              <?php
                if(isset($errores["email"]) && $errores["email"] != ""){
                  echo '
                    <div class="error">
                      <i class="fas fa-exclamation"></i> ' . $errores["email"] . '
                    </div>
                  ';
                }
              ?>

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
                <input type="password" id="pass" name="contraseña" value="" required>
              </div>

              <?php
                if(isset($errores["contraseña"]) && $errores["contraseña"] != ""){
                  echo '
                    <div class="error">
                      <i class="fas fa-exclamation"></i> ' .  $errores["contraseña"] . '
                    </div>
                  ';
                }
              ?>

            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="rep-pass">Repetir Contraseña</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="password" id="rep-pass" name="confirmacion" value="" required>
              </div>

              <?php
                if(isset($errores["confirmacion"]) && $errores["confirmacion"] != ""){
                  echo '
                    <div class="error">
                      <i class="fas fa-exclamation"></i> ' .  $errores["confirmacion"] . '
                    </div>
                  ';
                }
              ?>

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
                <label for="fecha-nac">Fecha de nacimiento</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="date" id="fecha-nac" name="fecha-nac" value="<?php if(isset($_POST["fecha-nac"]))  echo $_POST["fecha-nac"]  ; ?>" required>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-3 col-lg-5 valor-campo">
                <input type="checkbox" id="term-y-cond" name="" value=""  required>
              </div>
              <div class="col-9 col-lg-7 dato-campo">
                <label for="term-y-cond">Acepto los Términos y Condiciones</label>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-3 col-lg-5 valor-campo">
                <input type="checkbox" id="term-y-cond" name="term-y-cond" value="">
              </div>
              <div class="col-9 col-lg-7 dato-campo">
                <label for="term-y-cond">Deseo recibir noticias en mi correo</label>
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

    </main>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>