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

  public function agregarUsuario(Usuario $usuario): void
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
    if($usuario->getNombre() != ""){
      $this->actualizarCampo('usuarios', 'nombre', $usuario->getNombre(), 'email', $_SESSION['email']);
    }

    if($usuario->getApellido() != ""){
      $this->actualizarCampo('usuarios', 'apellido', $usuario->getApellido(), 'email', $_SESSION['email']);
    }

    if($usuario->getEmail() != ""){
      $this->actualizarCampo('usuarios', 'email', $usuario->getEmail(), 'email', $_SESSION['email']);
      $_SESSION['email'] = $usuario->getEmail();
    }

    if($usuario->getTelefono() != ""){
      $this->actualizarCampo('usuarios', 'telefono', $usuario->getTelefono(), 'email', $_SESSION['email']);
    }

    if($usuario->getFechaNac() != ""){
      $this->actualizarCampo('usuarios', 'fecha_nac', $usuario->getFechaNac(), 'email', $_SESSION['email']);
    }

    if($usuario->getAvatar() != ""){
      $this->actualizarCampo('usuarios', 'avatar', $usuario->getAvatar(), 'email', $_SESSION['email']);
    }
  }

  private function actualizarCampo(string $tabla, string $campo, string $valor, string $campoComparado, string $comparando){
    $query = $this->conexion->prepare("update $tabla set $campo = :valor where $campoComparado = :comparando;");

    $query->bindValue(':valor', $valor);
    $query->bindValue(':comparando', $comparando);

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
    $query = $this->conexion->prepare('select productos.id as id, productos.nombre as nombre, descripcion, precio, imagen, categorias.nombre as categoria from productos inner join categorias on productos.categoria_id = categorias.id where productos.id = :id');
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

  public function agregarProducto(Producto $producto){
    $query = $this->conexion->prepare('insert into productos (nombre, descripcion, precio, imagen, en_oferta, categoria_id) values (:nombre, :descripcion, :precio, :imagen, :oferta, :categoria_id);');

    $categorias = $this->getCategorias();
    foreach($categorias as $categoria){
      if($categoria['nombre'] == $producto->getCategoria()){
        $categoria_id = $categoria['id'];
      }
    }

    $query->bindValue(':nombre', $producto->getNombre());
    $query->bindValue(':descripcion', $producto->getDescripcion());
    $query->bindValue(':precio', $producto->getPrecio());
    $query->bindValue(':imagen', $producto->getImagen());
    $query->bindValue(':oferta', 0);
    $query->bindValue(':categoria_id', $categoria_id);

    $query->execute();
  }

  public function actualizarProducto(Producto $producto){
    if($producto->getNombre() != ""){
      $this->actualizarCampo('productos', 'nombre', $producto->getNombre(), 'nombre', $_SESSION['producto_nombre']);
      $_SESSION['producto_nombre'] = $producto->getNombre();
    }

    if($producto->getDescripcion() != ""){
      $this->actualizarCampo('productos', 'descripcion', $producto->getDescripcion(), 'nombre', $_SESSION['producto_nombre']);
    }

    if($producto->getPrecio() != ""){
      $this->actualizarCampo('productos', 'precio', $producto->getPrecio(), 'nombre', $_SESSION['producto_nombre']);
    }

    if($producto->getImagen() != ""){
      $this->actualizarCampo('productos', 'imagen', $producto->getImagen(), 'nombre', $_SESSION['producto_nombre']);
    }

    if($producto->getCategoria() != ""){
      $query = $this->conexion->prepare('select id from categorias where nombre = :nombre');
      $query->bindValue(':nombre', $producto->getCategoria());
      $query->execute();
      $categoria_id = $query->fetch(PDO::FETCH_ASSOC)['id'];

      $this->actualizarCampo('productos', 'categoria_id', $categoria_id, 'nombre', $_SESSION['producto_nombre']);
    }
  }

  public function modificarProductos($producto){
    $query = $this->conexion->prepare("update productos set nombre = :nombre,descripcion=:descripcion,precio=:precio, categoria_id=:categoria,imagen=:imagen where id = :id;");
    $query->bindValue(':nombre', $_POST["nombre"]);
    $query->bindValue(':descripcion', $_POST["descripcion"]);
    $query->bindValue(':precio', $_POST["precio"]);
    if($_POST["categoria"]=='pantalon'){
      $categoria=1;
    }
    else {
      $categoria=2;
    }
    $query->bindValue(':categoria', $producto);
    $archivo=$_FILES["imagen"];
    $nombre=$_POST["nombre"];
    $query->bindValue(':imagen', guardarImagen($archivo,$nombre));
    $query->bindValue(':id',$producto);
    $query->execute();


  }

  public function agregarProductoConIdAlCarroDeUsuarioConId($id_producto, $id_usuario)
  {
    $query = $this->conexion->prepare('insert into carritos (producto_id, usuario_id) values (:producto_id, :usuario_id);');
    $query->bindValue(':producto_id', $id_producto);
    $query->bindValue(':usuario_id', $id_usuario);
    $query->execute();
  }

  public function eliminarProductoConIdDelCarroDeUsuarioConId($id_producto, $id_usuario)
  {
    $query = $this->conexion->prepare('delete from carritos where producto_id = :producto_id and usuario_id = :usuario_id;');
    $query->bindValue(':producto_id', $id_producto);
    $query->bindValue(':usuario_id', $id_usuario);
    $query->execute();
  }

  public function getProductosDeUsuarioConEmail($email)
  {
    $query = $this->conexion->prepare('select productos.id as id, productos.nombre as nombre, productos.precio as precio, productos.descripcion as descripcion, productos.imagen as imagen from productos inner join carritos on carritos.producto_id = productos.id inner join usuarios on carritos.usuario_id = usuarios.id;');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function vaciarCarroUsuarioConEmail($email)
  {
    $query = $this->conexion->prepare('select id from usuarios where email = :email;');
    $query->bindValue(':email', $email);
    $query->execute();
    $id = $query->fetch(PDO::FETCH_ASSOC)['id'];

    $query = $this->conexion->prepare('delete from carritos where usuario_id = :id;');
    $query->bindValue(':id', $id);
    $query->execute();
  }

}
