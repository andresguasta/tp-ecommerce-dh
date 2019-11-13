<?php

class Autenticador
{
  private static $instancia = null;

  private function __construct() {}

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
