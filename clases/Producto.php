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

  public function __construct($precio,$nombre,$descripcion,$avatar){
    $this->precio = $precio;
    $this->avatar = $avatar;
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
  }

  public function getPrecio(){
    return $this->precio;
  }

  public function setPrecio($precio){
    $this->precio=$precio;
  }

  public function setAvatar($avatar){
    $this->avatar = $avatar;
  }

  public function getAvatar(){
    return $this->avatar;
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

}
