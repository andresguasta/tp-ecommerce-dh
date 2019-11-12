<?php

  require_once('funciones/autoload.php');

?>

<footer>
  <nav>
    <ul>

      <li><a href="home.php">Home</a></li>
      <li><a href="faq.php">F.A.Q.</a></li>
      <li><a href="contacto.php">Contacto</a></li>

      <li><a href="
        <?php if(estaElUsuarioLogeado()) {
          echo "perfil.php";
        } else {
          echo "login.php";
        } ?>"><i class="fas fa-user-alt"></i></a>
      </li>

    <?php if(estaElUsuarioLogeado()) { ?>
      <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
    <?php } ?>

    </ul>
  </nav>
</footer>
