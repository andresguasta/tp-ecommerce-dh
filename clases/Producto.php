<?php
class Producto{
  private $id;
  private $precio;
  /* No hace falta asignarle 1 al atributo $enOferta. Si bien 1 es equivalente a true, es conveniente
   * usar tipos de datos booleanos para estos casos */
  private $enOferta = false;   // Esto es similar a inicializar $enOferta como false en el constructor, al crear un nuevo objeto de esta clase, este atributo ya es false (desde que se hace new Producto() )
  // private $enOferta = 1; // Si luego se va a leer como booleano, es equivalente a inicilizar $enOferta como true en el constructor, pero como el nombre del atributo refiere a el valor de verdad de algo (verdadero o falso), es mejor guardar un booleano
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
    return $this->precio;
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
    // El $ luego del $this-> . Me costo encontrar el error que me tiraba al correr las pruebas jeje
    // Ademas se repitio un par de veces el error con otros getters
    // return $this->$nombre;
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

  /* Agrego el mensaje para sacar de oferta el producto */
  public function quitarDeOferta(){
    $this->enOferta = false;
  }

  /* La ventaja de tener atributos booleanos es que podemos retornar el valor del atributo sin hacer ningun checkeo
   */
  public function estaEnOferta(){
    /*
    if($this->enOferta==TRUE){
      return "esta en oferta";
    }
    else {
      return "no esta en oferta";
    }*/
    return $this->enOferta; // Si $enOferta es true devuelve true, si es false devuelve false
  }

}
