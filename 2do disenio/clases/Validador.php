<?php

abstract class Validador
{
  protected $errores;

  abstract public function validar(BDD $bdd);

  public function agregarError(string $campo, string $error)
  {
    $this->errores[$campo][] = $error;
  }

  public function getErrores()
  {
    return $this->errores;
  }

  public function hayErrores()
  {
    if(!$this->errores){
      $this->errores = [];
    }

    return count($this->errores) > 0;
  }

}
