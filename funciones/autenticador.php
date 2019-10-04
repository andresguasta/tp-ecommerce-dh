<?php

  session_start();

  if (isset($_COOKIE['recuerdame'])) {

    $_SESSION['email'] = $_COOKIE['recuerdame'];
  }

  function estaElUsuarioLogeado () {

    if ( isset($_SESSION['email'] ) ) {
      return true;
    }

    return false;
  }
