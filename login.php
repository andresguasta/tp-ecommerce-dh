<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php') ?>

  <head>
    <link rel="stylesheet" href="css/login.css">
  </head>

  <body>

  <div class="container-fluid">

    <?php require_once('header.php') ?>

    <main>

      <form class="" action="home.php" method="post">

        <div class="contenido-formulario row">

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="email">Email</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="email" id="email" name="" value="" required>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="pass">Contraseña</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="password" id="pass" name="" value="" required>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-3 col-lg-5 valor-campo">
                <input type="checkbox" id="term-y-cond" name="" value="" required>
              </div>
              <div class="col-9 col-lg-7 dato-campo">
                <label for="term-y-cond">Recordar datos de inicio de sesión</label>
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

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
