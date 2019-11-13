<?php

require_once('clases/autoload.php');

if(!Autenticador::getInstancia()->estaElUsuarioLogeado()){
  header('location:home.php');
}

$producto = $bdd->getProductoConId(intval($_GET['producto_id']));
$usuario = $bdd->getUsuarioConEmail($_SESSION['email']);

$bdd->eliminarProductoConIdDelCarroDeUsuarioConId($producto['id'], $usuario['id']);

header('location:carro.php');
