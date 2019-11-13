<?php

require_once('clases/autoload.php');

if(!Autenticador::getInstancia()->estaElUsuarioLogeado()){
  header('location:home.php');
}

session_start();
session_destroy();

if(isset($_COOKIE['recuerdame'])){
  setcookie('recuerdame', '', time() - 1 );
}

header('location:home.php');
