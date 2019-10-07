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

  function validarRegistro($datos, $archivos) {
    $errores = [];

    $errores["nombre"] = validarNombre($datos["nombre"]);
    $errores["email"] = validarEmail($datos["email"]);
    $errores["contraseña"] = validarContrasenia($datos["contraseña"]);
    $errores["confirmacion"] = validarConfirmacion($datos["contraseña"], $datos["confirmacion"]);
    $errores["fecha-nac"] = validarEdad($datos["fecha-nac"]);
    $errores["foto-perfil"] = validarFotoPerfil($archivos["foto-perfil"]);

    return $errores;
  }

  function validarFotoPerfil($archivo){

    if ($archivo["error"] === 0) {

      $ext = pathinfo($archivo['name'], PATHINFO_EXTENSION);

      if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
        return 'Formato de archivo invalido (JPG, JPEG o PNG)';
      }
    }

    return "";
  }

  function hayErrores($errores){

    foreach($errores as $error) {
      if($error != "")
        return true;
    }

    return false;
  }

  /* Correcion: la parte de session_start y la funcion estaElUsuarioLogeado() podria hacerse en otro archivo al que
   * corresponda mas el contexto, por ej: sesiones.php o sesionUsuario.php
   * Mala indentacion, pocas lineas vacias entre lineas de codigo, no ayuda a la legibilidad
   * Recordar que no solo hacemos codigo para que lo entienda la computadora, sino que otra gente tambien va a leer nuestro codigo
   * y tratar de entender lo que codeamos
   */

   /*
  session_start();
 function estaElUsuarioLogeado () {
     if (isset($_SESSION['email'])) {
         return true;
     }
     return false;
 }
 */

 /* Valido la info (email y contraseña) del usuario
  */
 function checkearInfoUsuario($email, $password){

   $archivo = file_get_contents('archivos/usuarios.json');
   $usuarios = json_decode($archivo, true);

   foreach ($usuarios as $usuario) {
     if ($usuario['email'] == $email && password_verify($password, $usuario['password'])) {
       // Si encuentra al usuario y coinciden mail y password devuelvo un string vacio, es decir, no hay errores
       return "";
     } else if($usuario['email'] == $email && !password_verify($password, $usuario['password'])) {
       // Si encuentra al usuario y coinciden mail pero no password devuelvo un error
       $errores["email"] = "La contraseña ingresada no es válida. Intente nuevamente";
     }
   }

  // Si llego a esta parte de la funcion siginifica que el email ingresado es incorrecto o no existe un usuario con ese Email
  $errores["email"] = "El email ingresado es incorrecto o no existe. Intente nuevamente";

  return $errores;
 }

/* Correcion: falta checkear si el email ingresado y la contraseña coinciden con la data de un usuario registrado o no
 */
 function validarLogin($datos) {
   $errores = [];

   $email = trim($datos['email']);

   /* Correcion: trimear la password tambien */
   // $password = $datos['password'];
   $password = trim($datos['password']);

   if (strlen($email) === 0) {
     $errores['email'] = 'Escribe el email';
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $errores['email'] = 'El email tiene formato errado';
   }

   if (strlen($password) < 6) {
     $errores['password'] = 'Contraseña inválida';
   }

   /* Ahora que ya checkee lo basico del login, podria checkear que el email y password correspondan a un usuario regsistrado,
    * Tambien al hacerlo al final dejo lo mas pesado computacionalmente para el final y solo si no hay errores aun y devuelvo lo que devuelva
    * La funcion que se fija eso
    */
    if( isset($errores["email"]) || isset($errores["password"])){
      return $errores;
    } else {
      return checkearInfoUsuario($email, $password);
    }
  }

  function validarModificacionesPerfil($datos, $archivos){
    $erorres = [];

    if( isset ( $datos["nombre"]) && $datos["nombre"] != "" ) {
      $errores["nombre"] = validarNombre( $datos["nombre"] );
    }

    if ( isset ( $datos["email"] ) && $datos["email"] != "" ) {
      $errores["email"] = validarEmail( $datos["email"] );
     }

    if ( isset ( $archivos ) && $archivos["foto-perfil"]["name"] != "" ){
      $errores["foto-perfil"] = validarFotoPerfil( $archivos["foto-perfil"] );
    }

    return $errores;
  }

 ?>
