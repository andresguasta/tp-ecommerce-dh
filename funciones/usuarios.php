<?php

  function buscarUsuario($email){

    $buscado = null;

    $usuarios = json_decode(file_get_contents('archivos/usuarios.json'), true);

    foreach($usuarios as $usuario){

      if($usuario["email"] == $email){
        $buscado = $usuario;
      }
    }

    return $buscado;
  }
