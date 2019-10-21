<?php

 Class Carrito
 {
   private $productos;

   public function __construct()
   {
     $this->productos= [];
   }

  public function vaciar(){
    /* Esta mal sintacticamente (tira un error) hacer
     * una operacion que no sea un push con un array agregando
     * los corchetes [].
     * Hacer $this->productos = unset($this->productos); funcionaria
     * Sin embargo, es mas facil y mas intuitivo hacer unset($this->productos);
    $this->productos[]=unset($productos);
    */
    unset($this->productos);
  }

  public function agregarProducto(Producto $producto){
    $this->productos[] = $producto;
  }

  /* Si se tiene un metodo getProductos publico, y la unica forma de acceder al carro es mediante el usuario,
   * entonces falta un mensaje getProductosEnCarro() en la clase usuario que le envie el mensaje getProductos() a su carro
   * La agrego en linea 60
   */

  public function getProductos(){
    /* Aca tambien, los corchetes luego de productos estan de mas.
    return $this->productos[];
     * La forma correcta es */
     return $this->productos;
  }

 }
