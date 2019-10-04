<?php
function damepantalones(){


  $productos = [
    1 => [
      "grupo" => "Pantalones",
      "imagen" => "pan-azul.jpg",
      "nombre" => "Pantalon azul",
      "precio" => "$750",
      "descripcion" =>"Lorem Ipsum",
      "id" => 1,

    ],
    2 => [
      "grupo" => "Pantalones",
      "imagen" => "pan-beige.jpg",
      "nombre" => "Pantalon Beige",
      "descripcion" => "Lorem Ipsum",
      "precio" =>"$750",
      "id" => 2,

    ],
    3 => [
      "grupo" => "Pantalones",
      "imagen" => "pan-verde.jpg",
      "nombre" => "Pantalon verde",
      "descripcion" => "Lorem Ipsum",
      "precio" => "$750",
      "id" => 3,

    ],

    4 => [
      "grupo" => "Camisas",  
      "imagen" => "camisa1.jpg",
      "nombre" => "Camisa blanca",
      "precio" => "$800",
      "descripcion" =>"Lorem Ipsum",
      "id" => 4,

    ],

    5 => [
      "grupo" => "Camisas",
      "imagen" => "camisa2.jpg",
      "nombre" => "Camisa gris",
      "descripcion" => "Lorem Ipsum",
      "precio" =>"1200",
      "id" => 5,

    ],

    6 => [
      "grupo" => "Camisas",
      "imagen" => "camisa3.jpg",
      "nombre" => "Camisa hawaiana",
      "descripcion" => "Lorem Ipsum",
      "precio" => "$1400",
      "id" => 6,
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
      "descripcion" =>"Lorem Ipsum",
      "id" => 4,

    ],
    2 => [
      "imagen" => "camisa2.jpg",
      "nombre" => "Camisa gris",
      "descripcion" => "Lorem Ipsum",
      "precio" =>"1200",
      "id" => 5,

    ],
    3 => [
      "imagen" => "camisa3.jpg",
      "nombre" => "Camisa hawaiana",
      "descripcion" => "Lorem Ipsum",
      "precio" => "$1400",
      "id" => 6,

    ]
  ];
  return $productos;
}

function obtenerIdProducto($id) {

  $productos = damepantalones();

  foreach ($productos as $producto) {
    if ($id == (string) $producto['id']) {
      return $producto;
    }
  }
  return false;
}
function obteneridcamisa($id) {
  $productos = damecamisas();
  foreach ($productos as $producto) {
    if ($id == (string) $producto['id']) {
      return $producto;
    }
  }
  return false;
}
