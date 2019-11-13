<?php
class Producto{
  private $precio;
  private $enOferta = false;
  private $nombre;
  private $descripcion;
  private $categoria;
  private $imagen;

  public function __construct($precio,$nombre,$descripcion,$categoria,$imagen = ""){
    $this->precio = trim($precio);
    $this->imagen = trim($imagen);
    $this->nombre = trim($nombre);
    $this->descripcion = trim($descripcion);
    $this->categoria = trim($categoria);
  }

  public function getImagen(){
    return $this->imagen;
  }

  public function setImagen($imagen){
    $this->imagen = $imagen;
  }

  public function getCategoria(){
    return $this->categoria;
  }

  public function getPrecio(){
    return $this->precio;
  }

  public function setPrecio($precio){
    $this->precio=$precio;
  }

  public function getNombre(){
    return $this->nombre;
  }

  public function setNombre($nombre){
    $this->nombre=$nombre;
  }

  public function getDescripcion(){
    return $this->descripcion;
  }

  public function setDescripcion($descripcion){
    $this->descripcion=$descripcion;
  }

  public function ponerEnOferta(){
     $this->enOferta=TRUE;
  }

  public function quitarDeOferta(){
    $this->enOferta = false;
  }

  public function estaEnOferta(){
    return $this->enOferta;
  }

  public function actualizar(BDD $bdd){
    $bdd->actualizarProducto($this);
  }

  public function agregar(BDD $bdd){
    $bdd->agregarProducto($this);
  }

}
