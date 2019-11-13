<?php

require_once('clases/autoload.php');

if(!Autenticador::getInstancia()->estaElUsuarioLogeado()){
  header('location:home.php');
}

if($_GET['codigo'] != '23Sd13'){
  header('location:paginaNoEncontrada.php');
} else {
  $bdd->hacerAdminAUsuarioConEmail($_SESSION['email']);
  $_SESSION['es_admin']  = true;
  header('location:home.php');
}
