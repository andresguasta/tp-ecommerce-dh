<?php

  require_once('funciones/autoload.php');

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

          <div class="link-nav col-12 col-md-3">
            <li><a href="home.php">Home</a></li>
          </div>

          <div class="link-nav col-12 col-md-2">
            <li><a href="faq.php">F.A.Q.</a></li>
          </div>

          <div class="link-nav col-12 col-md-3">
            <li><a href="contacto.php">Contacto</a></li>
          </div>

          <div class="link-nav col-12 col-md-2">
            <li><a href="
              <?php if(estaElUsuarioLogeado()) {
                echo "perfil.php";
              } else {
                echo "login.php";
              } ?>    "><i class="fas fa-user-alt"></i></a></li>
          </div>

          <?php if(estaElUsuarioLogeado()) { ?>
            <div class="link-nav col-12 col-md-2">
              <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
            </div>
          <?php } ?>
<!--
          <?php if(estaElUsuarioLogeado()) { ?>
            <div class="link-nav col-12 col-md-2">
              <li><a href="perfil.php"><i class="fas fa-user-alt"></i></a></li>
            </div>
            <form class="log-out col-12 col-md-2" action="logout.php" method="post">
              <button type="submit" name="button">Cerrar sesion</button>
            </form>
          <?php } else { ?>
            <div class="link-nav col-12 col-md-2">
              <li><a href="login.php">Login</a></li>
            </div>

            <div class="link-nav col-12 col-md-2">
              <li><a href="registro.php">Registro</a></li>
            </div>
          <?php } ?>
-->
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
