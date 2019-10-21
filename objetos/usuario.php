<?php

class Usuario{
  private $nombre;
  private $email;
  private $username;
  private $password;
  private $carro;

  public function __construct($nombre,$email,$username,$password){
    $this->nombre=$nombre;
    $this->email=$email;
    $this->setPassword($password);
    /* Al hacer $this->password luego de llamar a $this->setPassword() estas el atributo
     * la variable password de la clase, y como no lo hasheas lo estas guardando tal cual lo ingreso
     * el usuario
    $this->password=$password;
    */
    /* falta el seteo del atributo username */
    $this->username = $username;
    $this->carro=new Carrito();
  }

  public function setNombre($nombre){
    $this->nombre=$nombre;
  }

  public function getNombre(){
    return $this->nombre;
  }

  public function setEmail($email){
    $this->email=$email;
  }

  public function getEmail(){
    return $this->email;
  }

  public function setUsername($username){
    $this->username=$username;
  }

  public function getUsername(){
    /* El mensaje getUsername setea el username, y no recibe parametros ? Tabas distraido xd
    $this->username=$username;
    */
    return $this->username;
  }

  public function setPassword($password){
    $this->password=password_hash($password, PASSWORD_DEFAULT);
  }

  public function getPassword(){
    return $this->password;
  }

  public function agregarProductoAlCarrito(Producto $producto){
    $this->carro->agregarProducto($producto);
  }

  public function getProductosEnCarro(){
    return $this->carro->getProductos();
  }

}
