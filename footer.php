<?php

require_once('clases/autoload.php');

?>

<footer>
  <nav>
    <ul>
      <div class="links">
        <li><a href="home.php">Home</a></li>
        <li><a href="faq.php">F.A.Q.</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a href="
          <?php if(Autenticador::getInstancia()->estaElUsuarioLogeado()) {
            echo "perfil.php";
          } else {
            echo "login.php";
          } ?>"><i class="fas fa-user-alt"></i></a>
        </li>
        <?php if(Autenticador::getInstancia()->estaElUsuarioLogeado()) { ?>
          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
        <?php } ?>
      </div>
      <div class="redes">
        <li><i class="fab fa-twitter-square"></i><a href="https://www.twitter.com">@kingoftheconurbano</a></li>
        <li><i class="fab fa-instagram"></i><a href="https://www.instagram.com">King of the Conurbano</a></li>
        <li><i class="fab fa-facebook-square"></i><a href="https://www.facebook.com">King of the Conurbano</a></li>
      </div>
    </ul>
  </nav>
</footer>
