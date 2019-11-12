<?php

class ValidadorLogin extends Validador
{
  private $email;
  private $password;

  public function __construct($datos)
  {
    $this->email = trim($datos['email']);
    $this->password = trim($datos['password']);
  }

  public function validar(BDD $bdd)
  {
    $usuario = $bdd->getUsuarioConEmail($this->email);

    if(!$usuario){
      $this->agregarError("email", "Email incorreto. Intente nuevamente");
    } else if(!password_verify(($this->password), $usuario['password'])){
      $this->agregarError("password", "Contraseñ incorreta. Intente nuevamente");
    }
  }

}
