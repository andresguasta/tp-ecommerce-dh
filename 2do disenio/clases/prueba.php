<?php

require_once('autoload.php');

$jorge = new Usuario('Jorge Pérez', 'jorge_perez@hotmail.com', 'jorgePe69', 'JorGeP69');

$zapatilla = new Producto(1, 1200, false, 'Zapatillas', 'Zapatillas nike para running');
$gorra = new Producto(2, 450, false, 'Gorra', 'Gorra de los Bulls de Chicago');
$cadena = new Producto(3, 890, false, 'Cadena', 'Cadena de oro con dije');
$anillo = new Producto(4, 799, false, 'Anillo', 'Anillo con gema preciosa');
$remera = new Producto(5, 1450, false, 'Remera', 'Remera King of the Kongo');
$medias = new Producto(6, 120, false, 'Medias', 'Par de medias Lacoste');

echo 'Nombre:  ' . $jorge->getNombre() . '<br>';
echo 'Nombre de usuario:  ' . $jorge->getUsername() . '<br>';
echo 'Dirección e-mail:  ' . $jorge->getEmail() . '<br>';
echo 'Contraseña:  ' . $jorge->getPassword() . '<br>';

echo 'Productos en el carrito: ';
$productos = $jorge->getProductosEnCarro();
if($productos){
  foreach($productos as $producto){
    echo 'Nombre producto:  ' . $producto->getNombre() . '<br>';
    echo 'Descripcion:  ' . $producto->getDescripcion() . '<br>';
    echo 'Precio:  ' . $producto->getPrecio() . '<br>';
  }
} else {
  echo 'el carrito está vacio <br>';
}

echo '<br><br><br>';

echo 'Agrego unos productos al carrito de jorge... <br><br><br>';

$jorge->agregarProductoAlCarrito($zapatilla);
$jorge->agregarProductoAlCarrito($cadena);
$jorge->agregarProductoAlCarrito($medias);
$jorge->agregarProductoAlCarrito($gorra);

echo 'Productos en el carrito:<br>';
$productos = $jorge->getProductosEnCarro();
if($productos){
  foreach($productos as $producto){
    echo 'Nombre producto:  ' . $producto->getNombre() . '<br>';
    echo 'Descripcion:  ' . $producto->getDescripcion() . '<br>';
    echo 'Precio:  ' . $producto->getPrecio() . '<br>';
    echo '<br>';
  }
} else {
  echo 'el carrito está vacio <br>';
}
