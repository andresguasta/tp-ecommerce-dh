<?php

  $nombre = '';
  $email = '';
  $contraseña = '';
  $confirmar = '';
  $telefono = '';
  $pais = '';
  $fecha_nac = '';

  if($_POST){

    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $contraseña = trim($_POST["contraseña"]);
    $confirmar = trim($_POST["confirmar"]);
    $telefono = trim($_POST["telefono"]);
    $pais = trim($_POST["pais"]);
    $fecha_nac = trim($_POST["fecha_nac"]);

      $usuario = [
        "nombre" => $nombre,
        "email" => $email,
        "password" => password_hash($contraseña, PASSWORD_DEFAULT),
        "telefono" => $telefono,
        "pais" => $pais,
        "fecha_nac" => $fecha_nac
      ];

      if(!file_exists('archivos')) {
        mkdir('archivos');
      }

      if(!file_exists('archivos/usuarios.json')){
        touch('archivos/usuarios.json');
      }

      $usuarios = json_decode(file_get_contents('archivos/usuarios.json'), true);

      $usuarios[] = $usuario;

      file_put_contents('archivos/usuarios.json', json_encode($usuarios));

      header('location:perfil.php');

    }



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <?php require_once('head.php') ?>
    <link rel="stylesheet" href="css/registro.css">
  </head>

  <body>

  <div class="container-fluid">

    <?php

    require_once('header.php?nombre=Registro');

    ?>

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
                <input type="text" id="nombre" name="nombre" value="<?=$nombre?>" required>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="email">Email</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="email" id="email" name="email" value="<?=$email?>" required>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="telefono"><abbr title="Opcional">Telefono</abbr> </label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="tel" id="telefono" name="telefono" value="<?=$telefono?>">
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
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="rep-pass">Repetir Contraseña</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="password" id="rep-pass" name="confirmar" value="" required>
              </div>
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
                <input type="date" id="fecha-nac" name="fecha_nac" value="<?=$fecha_nac?>" required>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-3 col-lg-5 valor-campo">
                <input type="checkbox" id="term-y-cond" name="" value="" required>
              </div>
              <div class="col-9 col-lg-7 dato-campo">
                <label for="term-y-cond">Acepto los Términos y Condiciones</label>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-3 col-lg-5 valor-campo">
                <input type="checkbox" id="term-y-cond" name="" value="">
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
