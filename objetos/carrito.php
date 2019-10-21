<?php



 Class Carrito
 {
   private $producto;
   public function __construct()
   {
     $this->producto= [];
   }
  public function vaciar(){
    $this->producto[]=unset($producto);

  }
  public function agregarProductos(Producto $producto){
    $this->producto[]=$producto;
  }
  public function getProductos(){
    return $this->producto[];
  }
 }
