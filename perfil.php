<?php

  require_once('funciones/autoload.php');

  if(!estaElUsuarioLogeado()){

    header('location:login.php');
  }

  $seccion = 'Perfil';

  $usuario = buscarUsuario($_SESSION["email"]);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php'); ?>

  <head>
    <link rel="stylesheet" href="css/perfil.css">
  </head>

  <body>

    <div class="container-fluid">

      <?php require_once('header.php'); ?>

      <main>

        <div class="card">
          <div class="perfil">

            <div class="foto-perfil">
              <img src="img/usuarios/<?=$usuario["foto"]?>" alt="">
            </div>

            <div class="datos">

              <div class="dato">
                <div class="campo">
                  <h4>Nombre</h4>
                </div>
                <div class="valor">
                  <h4><?=$usuario["nombre"]?></h4>
                </div>
              </div>

              <div class="dato">
                <div class="campo">
                  <h4>Email</h4>
                </div>
                <div class="valor">
                  <h4><?=$usuario["email"]?></h4>
                </div>
              </div>

              <div class="dato">
                <div class="campo">
                  <h4>Telefono</h4>
                </div>
                <div class="valor">
                  <h4><?=$usuario["telefono"]?></h4>
                </div>
              </div>

              <div class="dato">
                <div class="campo">
                  <h4>Direccion</h4>
                </div>
                <div class="valor">
                  <h4><?= (isset($usuario["direccion"]))?$usuario["direccion"]:"" ?></h4>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="button-group row">
          <div class="col-8 col-md-10"></div>
          <div class="col-4 col-md-2 modificarPerfil">
            <a class="" href="modificarPerfil.php"><i class="fas fa-tools"></i>Modificar información del perfil</a>
          </div>
        </div>

      </main>

      <?php require_once('footer.php'); ?>    

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
