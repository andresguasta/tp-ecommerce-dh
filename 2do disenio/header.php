<?php

  require_once('funciones/autoload.php');

?>

<header>
  <nav>
    <ul>

      <div class="link-nav titulo">
        <li>King of the Conurbano</li>
      </div>

      <div class="link-nav">
        <li><a href="home.php">Home</a></li>
      </div>

      <div class="link-nav">
        <li><a href="faq.php">F.A.Q.</a></li>
      </div>

      <div class="link-nav">
        <li><a href="contacto.php">Contacto</a></li>
      </div>

      <div class="link-nav login">
        <li><a href="
          <?php if(estaElUsuarioLogeado()) {
            echo "perfil.php";
          } else {
            echo "login.php";
          } ?>"><i class="fas fa-user-alt"></i></a>
        </li>
      </div>

      <?php if(estaElUsuarioLogeado()) { ?>
        <div class="link-nav logout">
          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
        </div>
      <?php } ?>

    </ul>
  </nav>
</header>
