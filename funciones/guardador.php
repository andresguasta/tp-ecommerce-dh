<?php

  function crearUsuario($datosUsuario){

    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $contrasenia = trim($_POST["contraseña"]);
    $telefono = trim($_POST["telefono"]);
    $pais = trim($_POST["pais"]);
    $fecha_nac = trim($_POST["fecha-nac"]);

    $usuario = [
      "nombre" => $nombre,
      "email" => $email,
      "contrasenia" => password_hash($contrasenia, PASSWORD_DEFAULT),
      "telefono" => $telefono,
      "pais" => $pais,
      "fecha-nac" => $fecha_nac
    ];
    
  }

  function guardarUsuario($usuario){

    if(!file_exists('../archivos')) {
      mkdir('../archivos');
    }

    if(!file_exists('../archivos/usuarios.json')){
      touch('../archivos/usuarios.json');
    }

    $usuarios = json_decode(file_get_contents('../archivos/usuarios.json'), true);

    $usuarios[] = $usuario;

    file_put_contents('../archivos/usuarios.json', json_encode($usuarios));
  }
