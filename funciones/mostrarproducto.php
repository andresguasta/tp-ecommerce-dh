<?php
require_once('funciones/productos.php');

function mostrarpantalon(){
  $productos=damepantalones();
  foreach ($productos as $producto) { ?>
    <article class="producto">
      <div class="imagen-producto">
        <img src="img/<?=$producto['imagen']?>" alt="pantalon">
      </div>
      <div class="nombre-mas-precio">
        <div class="nombre"><h4><?= $producto['nombre'] ?></h4></div>
        <div class="precio"><h4><?=$producto['precio'] ?></h4></div>
      </div>
      <div class="descripcion"><p><?= $producto['descripcion'] ?></p></div>
      <div class="botones">
        <div class="ver-mas"><a href="detalle-producto.php?id=<?=$producto['id'] ?>">Ver mas</a></div>
        <div class="añadir-al-carro"><i class="fas fa-cart-plus"></i> Añadir al carro</div>
      </div>
    </article>

    

  <?php }; ?>
<?php }

function mostrarcamisa(){
  $productos=damecamisas();
  foreach ($productos as $producto) { ?>

    <article class="producto">
      <div class="imagen-producto">
        <img src="img/<?=$producto['imagen']?>"  alt="camisa">
      </div>
      <div class="nombre-mas-precio">
        <div class="nombre"><h4><?=$producto['nombre']?></h4></div>
        <div class="precio"><h4><?=$producto['precio']?></h4></div>
      </div>
      <div class="descripcion"><p><?=$producto['descripcion']?></p></div>
      <div class="botones">
        <div class="ver-mas"><a href="detalle-producto.php?id=<?=$producto['id']?>">Ver mas</a></div>
        <div class="añadir-al-carro"><i class="fas fa-cart-plus"></i> Añadir al carro</div>
      </div>
    </article>
  <?php };

}?>
