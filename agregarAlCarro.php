<?php

require_once('clases/autoload.php');
require_once('funciones/autoload.php');

if(estaElUsuarioLogeado()){
  header('home.php');
}

$producto = $bdd->getProductoConId($_GET['producto_id']);
$usuario = $bdd->getUsuarioConEmail($_SESSION['email']);

$bdd->agregarProductoConIdAlCarroDeUsuarioConId($producto['id'], $usuario['id']);

header('location:carro.php');
