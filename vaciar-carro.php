<?php

require_once('clases/autoload.php');
require_once('funciones/autoload.php');

if(estaElUsuarioLogeado()){
  header('home.php');
}

$bdd->vaciarCarroUsuarioConEmail($_SESSION['email']);

header('location:carro.php');
