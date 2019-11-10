<?php

class ValidadorModificaciones extends Validador
{
  private $nombre;
  private $apellido;
  private $email;
  private $emailActual;
  private $telefono;
  private $password;
  private $confirmacion;
  private $fecha_nac;
  private $avatar;
  private $hayModificaciones = false;

  public function __construct($datos)
  {
    if(isset($datos['post']['nombre'])){
      $this->nombre = trim($datos['post']['nombre']);
    }
    if(isset($datos['post']['apellido'])){
      $this->apellido = trim($datos['post']['apellido']);
    }
    if(isset($datos['post']['email'])){
      $this->email = trim($datos['post']['email']);
    }
    if(isset($datos['post']['telefono'])){
      $this->telefono = trim($datos['post']['telefono']);
    }
    if(isset($datos['post']['password'])){
      $this->password = trim($datos['post']['password']);
    }
    if(isset($datos['post']['fecha_nac'])){
      $this->fecha_nac = trim($datos['post']['fecha_nac']);
    }
    if(isset($datos['file']['avatar'])){
      $this->avatar = $datos['file']['avatar'];
    }
    $this->emailActual = $datos['email_actual'];
  }

  public function validar(BDD $bdd)
  {
    $this->validarNombre();
    $this->validarApellido();
    $this->validarEmail($bdd);
    $this->validarTelefono();
    $this->validarPassword($bdd);
    $this->validarFechaNac();
    $this->validarAvatar();
  }

  private function validarAvatar()
  {
    if($this->avatar['name'] != ""){
      $this->hayModificaciones = true;

      if ($this->avatar["error"] === 0) {
        $ext = pathinfo($this->avatar['name'], PATHINFO_EXTENSION);

        if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
          $this->agregarError("avatar", "Por favor eliga una imagen con un formato válido (JPG, JPEG o PNG)");
        }
      }
    }
  }

  private function validarFechaNac()
  {
    if($this->fecha_nac != ""){
      $this->hayModificaciones = true;

      if(strtotime($this->fecha_nac) > time()){
        $this->agregarError("fecha_nac", "Por favor ingrese una fecha de nacimiento válida");
      }
    }
  }

  private function validarPassword(BDD $bdd)
  {
    if($this->hayModificaciones){
      $usuario = $bdd->getUsuarioConEmail($this->emailActual);

      if($this->password == ""){
        $this->agregarError("password", "Por favor ingrese la contraseña para confirmar los cambios");
      }else if(!password_verify($this->password, $usuario['password'])){
        $this->agregarError("password", "Contraseña incorrecta");
      }
    }
  }

  private function validarTelefono()
  {
    if($this->telefono != ""){
      $this->hayModificaciones = true;

      if(!is_numeric($this->telefono) || strlen($this->telefono) < 6){
        $this->agregarError("telefono", "Por favor ingrese un número de teléfono válido");
      }
    }
  }

  private function validarEmail(BDD $bdd)
  {
    if($this->email != ""){
      $this->hayModificaciones = true;

      if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $this->agregarError("email", "Por favor ingrese un email válido");
      } else if($this->emailEnUso($bdd)) {
        $this->agregarError("email", "Esa dirección de email ya está en uso");
      }
    }
  }

  private function emailEnUso(BDD $bdd)
  {
    return $bdd->emailEnUso($this->email);
  }

  private function validarNombre()
  {
    if($this->nombre != ""){
      $this->hayModificaciones = true;

      if( strlen($this->nombre) < 3){
        $this->agregarError("nombre", "Creemos que la longitud del campo es demasiado corto para ser válido. Por favor, ingrese además un segundo nombre o repita algún carácter hasta completar una longitud de 3 carácteres");
      }
    }
  }

  private function validarApellido()
  {
    if($this->apellido != ""){
      $this->hayModificaciones = true;

      if( strlen($this->nombre) < 2){
        $this->agregarError("apellido", "Creemos que la longitud del campo es demasiado corto para ser válido. Por favor, ingrese además un segundo nombre o repita algún carácter hasta completar una longitud de 3 carácteres");
      }
    }
  }

}
