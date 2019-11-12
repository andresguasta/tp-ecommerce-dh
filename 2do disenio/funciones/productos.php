<?php
function damepantalones(){


  $productos = [
    1 => [
      "imagen" => "pan-azul.jpg",
      "nombre" => "Pantalon azul",
      "precio" => "$750",
      "descripcion" =>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
      "id" => 1,

    ],

    2 => [
      "imagen" => "pan-beige.jpg",
      "nombre" => "Pantalon Beige",
      "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
      "precio" =>"$750",
      "id" => 2,

    ],

    3 => [
      "imagen" => "pan-verde.jpg",
      "nombre" => "Pantalon verde",
      "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
      "precio" => "$750",
      "id" => 3,

    ]
  ];

  return $productos;
}


function damecamisas(){


  $productos = [
    1 => [
      "imagen" => "camisa1.jpg",
      "nombre" => "Camisa blanca",
      "precio" => "$800",
      "descripcion" =>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
      "id" => 4,

    ],
    2 => [
      "imagen" => "camisa2.jpg",
      "nombre" => "Camisa gris",
      "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
      "precio" =>"1200",
      "id" => 5,

    ],
    3 => [
      "imagen" => "camisa3.jpg",
      "nombre" => "Camisa hawaiana",
      "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
      "precio" => "$1400",
      "id" => 6,

    ]
  ];
  return $productos;
}

function obtenerIdProducto($id) {

  if($id >= 1 && $id <= 3){
    $productos = damepantalones();
  } else {
    $productos = damecamisas();
  }

  foreach ($productos as $producto) {
    if ($id == (string) $producto['id']) {
      return $producto;
    }
  }

  return null;
}


/*
function obteneridcamisa($id) {
  $productos = damecamisas();
  foreach ($productos as $producto) {
    if ($id == (string) $producto['id']) {
      return $producto;
    }
  }
  return false;
}
**/
