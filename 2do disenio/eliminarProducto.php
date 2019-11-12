<?php

require_once('clases/autoload.php');

$bdd->eliminarProductoConId($_GET['producto_id']);

header('location:gestor.php');
