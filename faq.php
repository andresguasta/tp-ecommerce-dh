<?php

  $seccion = "FAQ";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php') ?>

  <head>
    <link rel="stylesheet" href="css/faq.css">
  </head>

  <body>

  <div class="container-fluid">

    <?php require_once('header.php'); ?>

    <main>

      <div class="container-faqs row">

        <div class="encabezado-faqs col-12">
          <h2>Preguntas Frecuentes</h2>
        </div>

        <div class="pregunta-y-respuesta col-12">
          <div class="row">
            <div class="pregunta col-12">
              <h4>¿Qué es "nombre-ecommerce"? </h4>
            </div>
            <div class="respuesta col-12">
              <p>"nombre-ecommerce" es un sitio web diseñado para poder ver productos y hacer compras desde la comodidad de su casa.</p>
            </div>
          </div>
        </div>

        <div class="pregunta-y-respuesta col-12">
          <div class="row">
            <div class="pregunta col-12">
              <h4>¿Cómo comprar en "nombre-ecommerce"? </h4>
            </div>
            <div class="respuesta col-12">
              <p>Para hacer una compra en "nombre-ecommerce" simplemente añada aquellos artículos que desee comprar al carrito. Luego proceda al carrito para hacer el pago.</p>
            </div>
          </div>
        </div>

        <div class="pregunta-y-respuesta col-12">
          <div class="row">
            <div class="pregunta col-12">
              <h4>¿Qué metodos de pago maneja "nombre-ecommerce"?</h4>
            </div>
            <div class="respuesta col-12">
              <p>En "nombre-ecommerce" puede comprar con tarjeta VISA, Mastercard, otros... o también puede imprimir la factura y pagarla en RapiPago o PagoFácil.</p>
            </div>
          </div>
        </div>

        <div class="pregunta-y-respuesta col-12">
          <div class="row">
            <div class="pregunta col-12">
              <h4>¿Cómo recibo el producto comprado?</h4>
            </div>
            <div class="respuesta col-12">
              <p>Cuando usted realice el pago de su producto, primero deberá esperar a que el mismo se acredite. Con respecto al lugar de envío usted puede decidir si desea que se lo envíen a un domicilio en específico o si desea que el mismo sea recibido por una agencia de correo para que usted pueda ir a retirarlo una vez que llegue.</p>
            </div>
          </div>
        </div>

        <div class="pregunta-y-respuesta col-12">
          <div class="row">
            <div class="pregunta col-12">
              <h4>¿Qué pasa si mi envío no llega?</h4>
            </div>
            <div class="respuesta col-12">
              <p>Si el envío no llega en el período acordado (el cual depende de su ubicación) usted puede emitir un reclamo. Por las dudas le recomendamos siempre guardar el recibo o el mail de pago acreditado por las dudas que deba hacer un reclamo. Además contamos con un servicio de seguimiento del producto.</p>
            </div>
          </div>
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
