<?php

class BDD
{
  private $conexion;
  private $dsn;
  private $user;
  private $pass;

  public function __construct(string $dsn, string $user, string $pass)
  {
    $this->dsn = $dsn;
    $this->user = $user;
    $this->pass = $pass;
  }

  public function iniciarConexion()
  {
    try{
      $this->conexion = new PDO($this->dsn, $this->user, $this->pass);
      $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo 'Error al intentar conectarse a la base de datos';
    }
  }

  public function guardarUsuario(Usuario $usuario): void
  {
    $query = $this->conexion->prepare('insert into usuarios (nombre, apellido, email, password, telefono, fecha_nac, avatar) values (:nombre, :apellido, :email, :password, :telefono, :fecha_nac, :avatar)');

    $query->bindValue(':nombre', $usuario->getNombre(), PDO::PARAM_STR);
    $query->bindValue(':apellido', $usuario->getApellido(), PDO::PARAM_STR);
    $query->bindValue(':email', $usuario->getEmail(), PDO::PARAM_STR);
    $query->bindValue(':password', $usuario->getPassword(), PDO::PARAM_STR);
    $query->bindValue(':telefono', $usuario->getTelefono(), PDO::PARAM_STR);
    $query->bindValue(':fecha_nac', $usuario->getFechaNac(), PDO::PARAM_STR);
    $query->bindValue(':avatar', $usuario->getAvatar(), PDO::PARAM_STR);

    $query->execute();
  }

  public function emailEnUso(string $email)
  {
    $query = $this->conexion->prepare('select * from usuarios where email = "' . $email . '";');
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function getUsuarioConEmail(string $email)
  {
    $query = $this->conexion->prepare('select * from usuarios where email = :email');
    $query->bindValue(':email', $email);
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function actualizarUsuario(Usuario $usuario){
    $usuarioAActualizar = $this->getUsuarioConEmail($_SESSION['email']);

    $query = $this->conexion->prepare('update usuarios set nombre = :nombre, apellido = :apellido, email = :email, telefono = :telefono, fecha_nac = :fecha_nac, avatar = :avatar;');

    if($usuario->getNombre() != ""){
      $this->actualizarCampo('nombre', $usuario->getNombre());
    }

    if($usuario->getApellido() != ""){
      $this->actualizarCampo('apellido', $usuario->getApellido());
    }

    if($usuario->getEmail() != ""){
      $this->actualizarCampo('email', $usuario->getEmail());
      $_SESSION['email'] = $usuario->getEmail();
    }

    if($usuario->getTelefono() != ""){
      $this->actualizarCampo('telefono', $usuario->getTelefono());
    }

    if($usuario->getFechaNac() != ""){
      $this->actualizarCampo('fecha_nac', $usuario->getFechaNac());
    }

    if($usuario->getAvatar() != ""){
      $this->actualizarCampo('avatar', $usuario->getAvatar());
    }
  }

  private function actualizarCampo(string $campo, string $valor){
    $query = $this->conexion->prepare("update usuarios set $campo = :valor where email = :email;");

    $query->bindValue(':valor', $valor);
    $query->bindValue(':email', $_SESSION['email']);

    $query->execute();
  }

  public function getProductos()
  {
    $query = $this->conexion->prepare('select productos.id as id, productos.nombre as nombre, descripcion, precio, imagen, en_oferta, categorias.nombre as categoria from productos inner join categorias on productos.categoria_id = categorias.id order by categorias.nombre;');

    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function eliminarProductoConId(int $id)
  {
    $query = $this->conexion->prepare('delete from productos where id = :id');
    $query->bindValue(':id', $id);
    $query->execute();
  }

  public function getProductoConId(int $id)
  {
    $query = $this->conexion->prepare('select productos.nombre as nombre, descripcion, precio, imagen, categorias.nombre as categoria from productos inner join categorias on productos.categoria_id = categorias.id where productos.id = :id');
    $query->bindValue(':id', $id);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function getCategorias()
  {
    $query = $this->conexion->prepare('select * from categorias');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
  public function agregarProductos(){
    $query=$this->conexion->prepare('insert into productos (nombre, descripcion, precio, imagen, en_oferta, categoria_id) values (:nombre, :descripcion, :precio, :imagen, :oferta, :categoria);');
    $query->bindValue(':nombre', $_POST["nombre"]);
    $query->bindValue(':descripcion', $_POST["descripcion"]);
    $query->bindValue(':precio', $_POST["precio"]);
    $archivo=$_FILES["imagen"];
    $nombre=$_POST["nombre"];
    $query->bindValue(':imagen', guardarImagen($archivo,$nombre));
    $query->bindValue(':oferta', 0);
    if($_POST["categoria"]=='pantalon'){
      $categoria=1;
    }
    else {
      $categoria=2;
    }
    $query->bindValue(':categoria', $categoria);
    $query->execute();
  }


}
