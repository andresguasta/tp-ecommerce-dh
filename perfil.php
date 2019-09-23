<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php') ?>

  <head>
    <link rel="stylesheet" href="css/perfil.css">
  </head>

  <body>

  <div class="container-fluid">

    <?php require_once('header.php') ?>

    <main>

      <div class="card perfil">

        <div class="dato">
          <div class="foto-perfil">
            <img src="img/foto-perfil.jpg" alt="">
          </div>
        </div>

        <div class="dato">
          <div class="campo">
            <h4>Nombre</h4>
          </div>
          <div class="valor">
            <h4>Pepito</h4>
          </div>
        </div>

        <div class="dato">
          <div class="campo">
            <h4>Email</h4>
          </div>
          <div class="valor">
            <h4>pepito@hotmail.com</h4>
          </div>
        </div>

        <div class="dato">
          <div class="campo">
            <h4>Telefono</h4>
          </div>
          <div class="valor">
            <h4>12312345566</h4>
          </div>
        </div>

        <div class="dato">
          <div class="campo">
            <h4>Direccion</h4>
          </div>
          <div class="valor">
            <h4>Calle Falsa 123</h4>
          </div>
        </div>

      </div>

      <div class="editar">
        <button type="button" name="button"><i class="fas fa-tools"></i>Modificar datos del perfil</button>
      </div>

    </main>

    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
