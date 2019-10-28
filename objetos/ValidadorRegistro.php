<?php

class ValidadorRegistro extends Validador
{
  private $nombre;
  private $email;
  private $telefono;
  private $password;
  private $confirmacion;
  private $fecha_nac;
  private $imagen;
  private $terms_cond = false;

  public function __construct($datos)
  {
    $this->nombre = trim($datos["post"]["nombre"]);
    $this->email = trim($datos["post"]["email"]);
    $this->telefono = trim($datos["post"]["telefono"]);
    $this->password = trim($datos["post"]["password"]);
    $this->confirmacion = trim($datos["post"]["confirmacion"]);
    $this->fecha_nac = $datos["post"]["fecha_nac"];
    $this->imagen = $datos["file"]["imagen"];

    if(isset($datos["post"]["terms_cond"])){
      $this->terms_cond = true;
    }
  }

  public function validar()
  {
    $this->validarNombre();
    $this->validarEmail();
    $this->validarTelefono();
    $this->validarPassword();
    $this->validarConfirmacion();
    $this->validarFechaNac();
    $this->validarImagen();
    $this->validarTermsYCond();
  }

  private function validarTermsYCond()
  {
    if(!$this->terms_cond){
      $this->agregarError("terms_cond", "Para registrarse debe aceptar los términos y condiciones");
    }
  }

  private function validarImagen()
  {
    if ($this->imagen["error"] === 0) {
      $ext = pathinfo($this->imagen['name'], PATHINFO_EXTENSION);

      if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
        $this->agregarError("imagen", "Por favor eliga una imagen con un formato válido (JPG, JPEG o PNG)");
      }
    }
  }

  private function validarFechaNac()
  {
    if($this->fecha_nac == ""){
      $this->agregarError("fecha_nac", "Por favor no deje este campo vacío");
    }
    else if(strtotime($this->fecha_nac) > time()){
      $this->agregarError("fecha_nac", "Por favor ingrese una fecha de nacimiento válida");
    }
  }

  private function validarConfirmacion()
  {
    if($this->confirmacion == ""){
      $this->agregarError("confirmacion", "Por favor no deje este campo vacío");
    } else if ( strlen($this->confirmacion) < 6 ){
      $this->agregarError("confirmacion", "La contraseña debe tener 6 carácteres como mínimo");
    }
    if($this->password != $this->confirmacion){
      $this->agregarError("confirmacion", "Las contraseñas no coinciden");
    }
  }

  private function validarPassword()
  {
    if($this->password == ""){
      $this->agregarError("password", "Por favor no deje este campo vacío");
    } else if ( strlen($this->password) < 6 ){
      $this->agregarError("password", "La contraseña debe tener 6 carácteres como mínimo");
    }
  }

  private function validarTelefono()
  {
    if($this->telefono != "" && ( !is_numeric($this->telefono) || strlen($this->telefono) < 6) ){
      $this->agregarError("telefono", "Por favor ingrese un número de teléfono válido");
    }
  }

  private function validarEmail()
  {
    if($this->email == ""){
      $this->agregarError("email", "Por favor no deje este campo vacío");
    } else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $this->agregarError("email", "Por favor ingrese un email válido");
    } else if($this->emailEnUso()) {
      $this->agregarError("email", "Esa dirección de email ya está en uso");
    }
  }

  private function emailEnUso()
  {
    return false;
  }

  private function validarNombre()
  {
    if($this->nombre == ""){
      $this->agregarError("nombre", "Por favor no deje este campo vacío");
    }
  }

}
