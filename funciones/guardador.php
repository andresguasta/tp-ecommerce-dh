<?php


  function guardarFotoPerfil($email, $archivo){
    if (!file_exists('img/usuarios')) {
      mkdir('img/usuarios');
    }

    $ext = pathinfo($archivo['name'], PATHINFO_EXTENSION);

    $nombreArchivo = $email . '.' . $ext;

    //la muevo a mi carpeta avatars
    move_uploaded_file($archivo['tmp_name'], 'img/usuarios/' . $nombreArchivo);

    return $nombreArchivo;
  }

  function crearUsuario($datosUsuario, $archivos){

    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["contraseña"]);
    $telefono = trim($_POST["telefono"]);
    $pais = trim($_POST["pais"]);
    $fecha_nac = trim($_POST["fecha-nac"]);

    $usuario = [
      "nombre" => $nombre,
      "email" => $email,
      "password" => password_hash($password, PASSWORD_DEFAULT),
      "foto" => guardarFotoPerfil($email, $archivos["foto-perfil"]),
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
