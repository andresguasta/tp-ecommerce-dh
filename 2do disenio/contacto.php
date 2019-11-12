<?php

  $seccion = "Contacto";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php') ?>

  <head>
    <link rel="stylesheet" href="css/contacto.css">
  </head>

  <body>

    <div class="container-fluid">

      <?php require_once('header.php'); ?>

      <main>

        <div class="div2">

          <form>

          <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email de Contacto</label>
            <div class="col-sm-10">
              <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Ingrese su email">
            </div>
          </div>

          <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Numero</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" id="colFormLabel" placeholder="Ingrese su numero">
            </div>
          </div>

          <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Comentario</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control" id="colFormLabelLg" placeholder="Ingrese su comentario">
            </div>
          </div>

          <div class="mx-auto" style="width: 200px;">
              <input id="enviar" class="btn btn-primary" type="submit" value="Enviar">
          </div>

        </form>

      </div>

      <div class="contacto1">
        <div class="redes">
          <i class="fab fa-twitter-square"></i>
          <a href="https://www.twitter.com">Twitter de la empresa</a>
          <br>
          <i class="fab fa-facebook-square"></i>
          <a href="https://www.facebook.com">Facebook de la empresa</a>
          <br>
          <i class="fab fa-instagram"></i>
          <a href="https://www.instagram.com">instagram de la empresa</a>
        </div>

      </div>

      <div class="mapa">
        <h3>Podes encontrarnos en: </h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13144.745803702659!2d-58.4436762!3d-34.5488343!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfb39818e7624ac76!2sDigital%20House!5e0!3m2!1ses!2sar!4v1568253913210!5m2!1ses!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>

    </main>

    <?php require_once('footer.php'); ?>  

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
