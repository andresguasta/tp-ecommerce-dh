<?php

class Usuario{
  private $nombre;
  private $apellido;
  private $email;
  private $password;
  private $fecha_nac;
  private $telefono;
  private $avatar;
  private $carro;

  public function __construct(string $nombre, string $apellido, string $email, string $password, string $fecha_nac, string $telefono = "", string $avatar = ""){
    $this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->email=$email;
    $this->setPassword($password);
    $this->fecha_nac = $fecha_nac;
    $this->telefono = $telefono;
    $this->avatar = $avatar;
    $this->carro = new Carrito();
  }

  public function setNombre(string $nombre){
    $this->nombre=$nombre;
  }

  public function getNombre(): string {
    return $this->nombre;
  }

  public function setApellido(string $apellido){
    $this->apellido=$apellido;
  }

  public function getApellido(): string {
    return $this->apellido;
  }

  public function setEmail(string $email){
    $this->email=$email;
  }

  public function getEmail(): string {
    return $this->email;
  }

  public function setPassword(string $password){
    $this->password=password_hash($password, PASSWORD_DEFAULT);
  }

  public function getPassword(): string {
    return $this->password;
  }

  public function setFechaNac(string $fecha_nac){
    $this->fecha_nac = $fecha_nac;
  }

  public function getFechaNac(): string {
    return $this->fecha_nac;
  }

  public function setAvatar(string $avatar){
    $this->avatar = $avatar;
  }

  public function getAvatar(): string {
    return $this->avatar;
  }

  public function setTelefono(string $telefono){
    $this->telefono = $telefono;
  }

  public function getTelefono(): string {
    return $this->telefono;
  }

  public function guardar(BDD $bdd){
    $bdd->guardarUsuario($this);
  }

  public function actualizar(BDD $bdd){
    $bdd->actualizarUsuario($this);
  }

  public function agregarProductoAlCarrito(Producto $producto){
    $this->carro->agregarProducto($producto);
  }

  public function getProductosEnCarro(){
    return $this->carro->getProductos();
  }

}
