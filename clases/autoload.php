<?php

require_once('Usuario.php');
require_once('Producto.php');
require_once('Validador.php');
require_once('ValidadorRegistro.php');
require_once('ValidadorLogin.php');
require_once('ValidadorModificaciones.php');
require_once('ValidadorProductos.php');
require_once('BDD.php');
require_once('Autenticador.php');


$dsn = "mysql:dbname=KingOfTheConurbano_db;host=127.0.0.1;port=3306";
$user = "root";
$pass = "";

$bdd = new BDD($dsn, $user, $pass);
$bdd->iniciarConexion();

session_start();

if (isset($_COOKIE['recuerdame'])) {
  $_SESSION['email'] = $_COOKIE['recuerdame'];
}
