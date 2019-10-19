<?php
class Producto{
  private $id;
  private $precio;
  private $enOferta=1;
  private $nombre;
  private $descripcion;

  public function __construct($id,$precio,$enOferta,$nombre,$descripcion){
    $this->id=$id;
    $this->precio=$precio;
    $this->enOferta=$enOferta;
    $this->nombre=$nombre;
    $this->descripcion=$descripcion;
  }

  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id=$id;
  }
  public function getPrecio(){
    return $this->$precio;
  }
  public function setPrecio($precio){
    $this->precio=$precio;
  }
  public function getEnOferta(){
    return $this->enOferta;
  }
  public function setEnOferta($enOferta){
    $this->enOferta=$enOferta;
  }
  public function getNombre(){
    return $this->$nombre;
  }
  public function setNombre($nombre){
    $this->nombre=$nombre;
  }
  public function getDescripcion(){
    return $this->$descripcion;
  }
  public function setDescripcion($descripcion){
    $this->descripcion=$descripcion;
  }


  public function ponerEnOferta(){
     $this->enOferta=TRUE;
  }
  public function estaEnOferta(){
    if($this->enOferta==TRUE){
      return "esta en oferta";
    }
    else {
      return "no esta en oferta";
    }
  }
}
