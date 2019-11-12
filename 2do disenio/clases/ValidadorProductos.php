<?php

class ValidadorProductos extends Validador
{
  private $nombre;
  private $descripcion;
  private $precio;
  private $imagen;

  public function __construct($datos)
  {
    $this->nombre = $datos['post']['nombre'];
    $this->descripcion = $datos['post']['descripcion'];
    $this->precio = $datos['post']['precio'];
    $this->imagen = $datos['file']['imagen'];
  }

  public function validar(BDD $bdd){
    return;
  }

  public function validarProductoAgregado()
  {
    $this->validarNombre();
    $this->validarDescripcion();
    $this->validarPrecio();
    $this->validarImagen();
  }

  private function validarNombre()
  {
    if($this->nombre == ""){
      $this->agregarError('nombre', 'No puede dejar este campo vacio');
    }
  }

  private function validarDescripcion()
  {
    if($this->descripcion == ""){
      $this->agregarError('descripcion', 'No puede dejar este campo vacio');
    }
  }

  private function validarPrecio()
  {
    if($this->precio == ""){
      $this->agregarError('precio', 'No puede dejar este campo vacio');
    }
    else if(!is_numeric($this->precio)){
      $this->agregarError('precio', 'Por favor ingrese un valor numerico');
    }else if($this->precio <= 0){
      $this->agregarError('precio', 'Por favor ingrese un valor valido');
    }
  }

  private function validarImagen()
  {
    if($this->imagen['name'] == ""){
      $this->agregarError("imagen", 'No puede dejar este campo vacio');
    } else {
      if($this->imagen["error"] === 0){
        $ext = pathinfo($this->imagen['name'], PATHINFO_EXTENSION);

        if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
          $this->agregarError("imagen", "Por favor eliga una imagen con un formato válido (JPG, JPEG o PNG)");
        }
      }
    }
  }

}
