<?php

class Autenticador
{
  private static $instancia = null;

  private function __construct()
  {
    if(!session_status() === PHP_SESSION_ACTIVE){
      session_start();
    }

    if (isset($_COOKIE['recuerdame'])) {
      $_SESSION['email'] = $_COOKIE['recuerdame'];
    }
  }

  public static function getInstancia() {
    if (self::$instancia == null)
    {
      self::$instancia = new Autenticador();
    }

    return self::$instancia;
  }

  public function estaElUsuarioLogeado ()
  {
    if ( isset($_SESSION['email'] ) ) {
      return true;
    }

    return false;
  }

}
