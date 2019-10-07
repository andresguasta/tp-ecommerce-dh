<?php

  require_once('funciones/autoload.php');

?>

<footer>
  <nav>
    <ul>

      <li><a href="home.php">Home</a></li>
      <li><a href="faq.php">F.A.Q.</a></li>
      <li><a href="contacto.php">Contacto</a></li>

      <?php if(estaElUsuarioLogeado()) { ?>

        <li><a href="perfil.php">Perfil</a></li>

      <?php } else { ?>

        <li><a href="loginConCorreciones.php">Login</a></li>
        <li><a href="registro.php">Registro</a></li>

      <?php } ?>

    </ul>
  </nav>
</footer>
