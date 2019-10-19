<?php

class Usuario{
  private $nombre;
  private $email;
  private $username;
  private $password;

  public function __construct($nombre,$email,$username,$password){
    $this->nombre=$nombre;
    $this->email=$email;
    $this->username=$username;
    $this->password=$password;
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
    $this->password=$password;
  }
  public function getPassword(){
    return $this->password;
  }
}
