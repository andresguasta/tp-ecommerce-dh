<?php

  function guardarAvatar($email, $archivo){
    if($archivo['name'] != ""){
      $ext = pathinfo($archivo['name'], PATHINFO_EXTENSION);

      $nombreArchivo = $email . '.' . $ext;

      // Muevo el archivo a mi carpeta avatars
      move_uploaded_file($archivo['tmp_name'], 'img/usuarios/' . $nombreArchivo);
    }else{
      $nombreArchivo = 'default.png';
    }

    return $nombreArchivo;
  }

  function guardarImagen($archivo,$nombre){
    if($archivo['name'] != ""){
      $ext = pathinfo($archivo['name'], PATHINFO_EXTENSION);

      $nombreArchivo = $nombre . '.' . $ext;


      move_uploaded_file($archivo['tmp_name'], 'img/' . $nombreArchivo);
    }else{
      $nombreArchivo = "";
    }

    return $nombreArchivo;
  }


/*
  function crearUsuario($datosUsuario, $archivos){

    $nombre = trim($datosUsuario["nombre"]);
    $email = trim($datosUsuario["email"]);
    $password = trim($datosUsuario["password"]);
    $telefono = trim($datosUsuario["telefono"]);
    $pais = trim($datosUsuario["pais"]);
    $fecha_nac = trim($datosUsuario["fecha_nac"]);

    if($archivos["foto-perfil"]["name"] == ""){
      $nombreArchivo = "default.png";
    } else {
      $nombreArchivo = guardarFotoPerfil($email, $archivos["foto-perfil"]);
    }

    $usuario = [
      "nombre" => $nombre,
      "email" => $email,
      "password" => password_hash($password, PASSWORD_DEFAULT),
      "foto" => $nombreArchivo,
      "telefono" => $telefono,
      "pais" => $pais,
      "fecha-nac" => $fecha_nac
    ];

    return $usuario;
  }

  function guardarUsuario($usuario){

    if(!file_exists('archivos')) {
      mkdir('archivos');
    }

    if(!file_exists('archivos/usuarios.json')){
      touch('archivos/usuarios.json');
    }

    $usuarios = json_decode(file_get_contents('archivos/usuarios.json'), true);

    $usuarios[] = $usuario;

    file_put_contents('archivos/usuarios.json', json_encode($usuarios));
  }

  function guardarModificacionesUsuario($datosNuevos, $archivo){
    $usuarios = json_decode(file_get_contents('archivos/usuarios.json'), true);

    $usuarioActualizado = [];

    foreach( $usuarios as $key => $buscado ) {
      if ( $_SESSION["email"] == $buscado["email"] ) {

        if ( isset ( $datosNuevos["nombre"] ) && $datosNuevos["nombre"] != "" ) {
          $usuarioActualizado["nombre"] = $datosNuevos["nombre"];
        } else {
          $usuarioActualizado["nombre"] = $buscado["nombre"];
        }

        if ( isset ( $datosNuevos["email"] ) && $datosNuevos["email"] != "" ) {
          $usuarioActualizado["email"] = $datosNuevos["email"];
        } else {
          $usuarioActualizado["email"] = $buscado["email"];
        }

        if ( isset ( $datosNuevos["telefono"] ) && $datosNuevos["telefono"] != "" ) {
          $usuarioActualizado["telefono"] = $datosNuevos["telefono"];
        } else {
          $usuarioActualizado["telefono"] = $buscado["telefono"];
        }

        if ( isset ( $archivo ) && $archivo["name"] != "" ) {
          $usuarioActualizado["foto"] = guardarFotoPerfil($usuarioActualizado["email"], $archivo);
        } else {
          $usuarioActualizado["foto"] = $buscado["foto"];
        }

        if ( isset ( $datosNuevos["direccion"] ) && $datosNuevos["direccion"] != "" ) {
          $usuarioActualizado["direccion"] = $datosNuevos["direccion"];
        } else {
          $usuarioActualizado["direccion"] = $buscado["direccion"];
        }

        $usuarioActualizado["password"] = $buscado["password"];
        $usuarioActualizado["fecha-nac"] = $buscado["fecha-nac"];
        $usuarioActualizado["pais"] = $buscado["pais"];

        $_SESSION["email"] = $usuarioActualizado["email"];

        if(isset($_COOKIE["recuerdame"])){
          setcookie("recuerdame", $usuarioActualizado["email"], time() + 60*60*24*7 );
       }

        $usuarios[$key] = $usuarioActualizado;
      }
    }

    file_put_contents('archivos/usuarios.json', json_encode($usuarios));
  }
*/
