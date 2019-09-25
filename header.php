<?php

  $seccion = '';

  if($_GET){
    $seccion = $_GET["nombre"];
  }

?>

<header>

  <div class="encabezado">
    <div class="navbar navbar-dark">
      <button type="button" data-toggle="collapse" href="#collapseNav" aria-expanded="false" aria-controls="collapseNav">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
      <h1>ecommerce</h1>
    </div>

    <div class="collapse" id="collapseNav">
      <nav>
        <ul>
          <div class="row">

          <div class="link-nav col-12 col-md-2">
            <li><a href="home.php">Home</a></li>
          </div>

          <div class="link-nav col-12 col-md-2">
            <li><a href="faq.php">F.A.Q.</a></li>
          </div>

          <div class="link-nav col-12 col-md-2">
            <li><a href="contacto.php">Contacto</a></li>
          </div>

          <div class="link-nav col-12 col-md-2">
            <li><a href="perfil.php">Perfil</a></li>
          </div>

          <div class="link-nav col-12 col-md-2">
            <li><a href="login.php">Login</a></li>
          </div>

          <div class="link-nav col-12 col-md-2">
            <li><a href="registro.php">Registro</a></li>
          </div>

        </div>
        </ul>
      </nav>
    </div>

    <div class="seccion">
      <div class="row">
        <div class="col-12">
          <h2> <?=$seccion?> </h2>
        </div>
      </div>
    </div>

</header>
