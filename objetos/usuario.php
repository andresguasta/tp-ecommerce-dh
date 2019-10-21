<?php

class Usuario implements Carrito{
  private $nombre;
  private $email;
  private $username;
  private $password;
  private $carro;

  public function __construct($nombre,$email,$username,$password){
    $this->nombre=$nombre;
    $this->email=$email;
    $this->setPassword($password);
    $this->password=$password;
    $this->carro=new Carrito()
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
    $this->username=$username;
  }
  public function setPassword($password){
    $this->password=password_hash($password, PASSWORD_DEFAULT);
  }
  public function getPassword(){
    return $this->password;
  }
  public function agregarProductoAlCarrito(Producto $producto){
    $this->carro->agregarProductos($producto);
  }

}
