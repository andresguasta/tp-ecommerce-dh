<?php

require_once('clases/autoload.php');

if(!Autenticador::usuarioEsAdmin()){
  header('location:home.php');
}

if(!isset($_GET['producto_id'])){
    header('location:home.php');
}

$bdd->eliminarProductoConId($_GET['producto_id']);

header('location:gestor.php');
