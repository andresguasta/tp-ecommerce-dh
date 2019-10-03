<?php

  function validarNombre($unNombre) {
    if (trim($unNombre) == "") {
      return "Este campo esta vacío";
    }
    return "";
  }

  function validarEmail($unEmail) {
    if(trim($unEmail) == "") {
      return "Este campo esta vacío";
    } else if(!filter_var(trim($unEmail), FILTER_VALIDATE_EMAIL)) {
      return "Por favor ingrese un email válido";
    }
    return checkearEmailNoRepetido($unEmail);
  }

  function checkearEmailNoRepetido($unEmail){
    $usuarios = json_decode(file_get_contents('archivos/usuarios.json'), true);

    if(!$usuarios){
      return "";
    }else{
      foreach($usuarios as $usuario){
        if($usuario["email"] == $unEmail){
          return "Ese email ya está en uso";
        }
      }
    }

    return "";
  }

  function validarContrasenia($unaContrasenia) {
    if(trim($unaContrasenia) == ""){
      return "Este campo esta vacío";
    }
    else if(strlen(trim($unaContrasenia)) < 6){
      return "La contraseña es demasiada corta ( mínimo 6 carácteres )";
    }
    return "";
  }

  function validarConfirmacion($contrasenia, $confirmacion){
    if(trim($confirmacion) == ""){
      return "Este campo está vacío";
    }else if(trim($confirmacion) != trim($contrasenia)) {
      return "Las contraseñas no coinciden";
    }
    return "";
  }

  function validarEdad($fecha) {
    if(trim($fecha) == ""){
      return "Este campo está vacío";
    }
    return "";
  }

  function validarRegistro($datos) {
    $errores = [];

    $errores["nombre"] = validarNombre($datos["nombre"]);
    $errores["email"] = validarEmail($datos["email"]);
    $errores["contraseña"] = validarContrasenia($datos["contraseña"]);
    $errores["confirmacion"] = validarConfirmacion($datos["contraseña"], $datos["confirmacion"]);
    $errores["fecha-nac"] = validarEdad($datos["fecha-nac"]);

    return $errores;
  }

  function hayErrores($errores){

    foreach($errores as $error) {
      if($error != "")
        return true;
    }

    return false;
  }
  session_start();
 function estaElUsuarioLogeado () {
     if (isset($_SESSION['email'])) {
         return true;
     }
     return false;
 }
 function validarLogin($datos) {
    $errores = [];
    $usuario = [];
    $email = trim($datos['email']);
    $password = $datos['password'];

    if (strlen($email) === 0) {
        $errores['email'] = 'Escribe el email';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El email tiene formato errado';
    }
    if (strlen($password) < 6) {
        $errores['password'] = 'La contraseña es muy corta (minimo 6 caracteres)';
    }

    return $errores;
}

 ?>
