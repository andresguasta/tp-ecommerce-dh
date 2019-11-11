<?php

  require_once('Carrito.php');
  require_once('Usuario.php');
  require_once('Producto.php');
  require_once('Validador.php');
  require_once('ValidadorRegistro.php');
  require_once('ValidadorLogin.php');
  require_once('ValidadorModificaciones.php');
  require_once('BDD.php');
  

  $dsn = "mysql:dbname=ecommerce;host=127.0.0.1;port=3306";
  $user = "root";
  $pass = "";

  $bdd = new BDD($dsn, $user, $pass);
  $bdd->iniciarConexion();
