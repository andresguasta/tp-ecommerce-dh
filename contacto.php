<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php') ?>

  <head>
    <link rel="stylesheet" href="css/contacto.css">
  </head>

  <body>

    <div class="container">

      <?php require_once('header.php'); ?>

      <main>

        <form class="" action="contacto.php" method="post">
          <div class="titulo row">
            <h2>Envianos tu consulta</h2>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="email">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="email" name="email" value="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="telefono">Telefono</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="telefono" name="telefono" value="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="consulta">Consulta</label>
            <div class="col-sm-6">
              <textarea class="form-control" name="consulta" id="consulta" rows="2" cols="20"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-8"></div>
            <button class="boton col-2" type="submit" name="button">Enviar consulta</button>
          </div>
        </form>

        <div class="mapa">
          <h3>Podes encontrarnos en: </h3>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52536.84448321998!2d-58.40134569913184!3d-34.615468677533784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb791570f7236c962!2sDigital%20House!5e0!3m2!1ses!2sar!4v1573614737148!5m2!1ses!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
      </main>
    </div>

    <?php require_once('footer.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
