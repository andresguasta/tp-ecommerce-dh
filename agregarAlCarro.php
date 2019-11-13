<?php

require_once('clases/autoload.php');

if(!Autenticador::getInstancia()->estaElUsuarioLogeado()){
  header('location:home.php');
}

$producto = $bdd->getProductoConId($_GET['producto_id']);
$usuario = $bdd->getUsuarioConEmail($_SESSION['email']);

$bdd->agregarProductoConIdAlCarroDeUsuarioConId($producto['id'], $usuario['id']);

header('location:carro.php');
