<?php

abstract class Validador
{
  protected $errores;

  abstract public function validar();

  public function agregarError($campo, $error)
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
