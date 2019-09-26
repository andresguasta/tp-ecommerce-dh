<?php

  $seccion = "Gestor de productos";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php') ?>

  <head>
    <link rel="stylesheet" href="css/gestor.css">
  </head>

  <body>

  <div class="container-fluid">

    <?php require_once('header.php'); ?>

    <main>

      <div class="volver"><a href="home.php"><i class="fas fa-arrow-left"></i>Volver</a></div>

      <div class="titulo-mas-añadir">
        <div class="titulo">
          <h2>Pantalones</h2>
        </div>
        <div class="añadir">
          <button type="button" name="button"><i class="fas fa-plus"></i>Añadir producto a esta seccion</button>
        </div>
      </div>

      <section class="productos">

        <article class="producto">
          <div class="borrar-editar">
            <div class="editar">
              <button type="button" name="button"><i class="fas fa-tools"></i>Modificar publicacion</button>
            </div>
            <div class="borrar">
              <button type="button" name="button"><i class="fas fa-times"></i>Quitar del catalogo</button>
            </div>
          </div>
          <div class="imagen-producto">
            <img src="img/pan-azul.jpg" alt="pantalon">
          </div>
          <div class="nombre-mas-precio">
            <div class="nombre"><h4>Pantalon Azul</h4></div>
            <div class="precio"><h4>$750</h4></div>
          </div>
          <div class="descripcion"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
          <div class="botones">
            <div class="ver-mas"><a href="">Ver mas</a></div>
            <div class="añadir-al-carro"><i class="fas fa-cart-plus"></i> Añadir al carro</div>
          </div>
        </article>

        <article class="producto">
          <div class="borrar-editar">
            <div class="editar">
              <button type="button" name="button"><i class="fas fa-tools"></i>Modificar publicacion</button>
            </div>
            <div class="borrar">
              <button type="button" name="button"><i class="fas fa-times"></i>Quitar del catalogo</button>
            </div>
          </div>
          <div class="imagen-producto">
            <img src="img/pan-beige.jpg" alt="pantalon">
          </div>
          <div class="nombre-mas-precio">
            <div class="nombre"><h4>Pantalon Beige</h4></div>
            <div class="precio"><h4>$800</h4></div>
          </div>
          <div class="descripcion"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
          <div class="botones">
            <div class="ver-mas"><a href="">Ver mas</a></div>
            <div class="añadir-al-carro"><i class="fas fa-cart-plus"></i> Añadir al carro</div>
          </div>
        </article>

        <article class="producto">
          <div class="borrar-editar">
            <div class="editar">
              <button type="button" name="button"><i class="fas fa-tools"></i>Modificar publicacion</button>
            </div>
            <div class="borrar">
              <button type="button" name="button"><i class="fas fa-times"></i>Quitar del catalogo</button>
            </div>
          </div>
          <div class="imagen-producto">
            <img src="img/pan-verde.jpg" alt="pantalon">
          </div>
          <div class="nombre-mas-precio">
            <div class="nombre"><h4>Pantalon Verde</h4></div>
            <div class="precio"><h4>$799</h4></div>
          </div>
          <div class="descripcion"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
          <div class="botones">
            <div class="ver-mas"><a href="">Ver mas</a></div>
            <div class="añadir-al-carro"><i class="fas fa-cart-plus"></i> Añadir al carro</div>
          </div>
        </article>

      </section>

      <div class="titulo-mas-añadir">
        <div class="titulo">
          <h2>Camisas</h2>
        </div>
        <div class="añadir">
          <button type="button" name="button"><i class="fas fa-plus"></i>Añadir producto a esta seccion</button>
        </div>
      </div>

      <section class="productos">

        <article class="producto">
          <div class="borrar-editar">
            <div class="editar">
              <button type="button" name="button"><i class="fas fa-tools"></i>Modificar publicacion</button>
            </div>
            <div class="borrar">
              <button type="button" name="button"><i class="fas fa-times"></i>Quitar del catalogo</button>
            </div>
          </div>
          <div class="imagen-producto">
            <img src="img/camisa1.jpg" alt="camisa">
          </div>
          <div class="nombre-mas-precio">
            <div class="nombre"><h4>Camisa blanca</h4></div>
            <div class="precio"><h4>$800</h4></div>
          </div>
          <div class="descripcion"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
          <div class="botones">
            <div class="ver-mas"><a href="">Ver mas</a></div>
            <div class="añadir-al-carro"><i class="fas fa-cart-plus"></i> Añadir al carro</div>
          </div>
        </article>

        <article class="producto">
          <div class="borrar-editar">
            <div class="editar">
              <button type="button" name="button"><i class="fas fa-tools"></i>Modificar publicacion</button>
            </div>
            <div class="borrar">
              <button type="button" name="button"><i class="fas fa-times"></i>Quitar del catalogo</button>
            </div>
          </div>
          <div class="imagen-producto">
            <img src="img/camisa2.jpg" alt="camisa">
          </div>
          <div class="nombre-mas-precio">
            <div class="nombre"><h4>Camisa blanca y negra</h4></div>
            <div class="precio"><h4>$1200</h4></div>
          </div>
          <div class="descripcion"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
          <div class="botones">
            <div class="ver-mas"><a href="">Ver mas</a></div>
            <div class="añadir-al-carro"><i class="fas fa-cart-plus"></i> Añadir al carro</div>
          </div>
        </article>

        <article class="producto">
          <div class="borrar-editar">
            <div class="editar">
              <button type="button" name="button"><i class="fas fa-tools"></i>Modificar publicacion</button>
            </div>
            <div class="borrar">
              <button type="button" name="button"><i class="fas fa-times"></i>Quitar del catalogo</button>
            </div>
          </div>
          <div class="imagen-producto">
            <img src="img/camisa3.jpg" alt="camisa">
          </div>
          <div class="nombre-mas-precio">
            <div class="nombre"><h4>Camisa Hawaiana</h4></div>
            <div class="precio"><h4>$1400</h4></div>
          </div>
          <div class="descripcion"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
          <div class="botones">
            <div class="ver-mas"><a href="">Ver mas</a></div>
            <div class="añadir-al-carro"><i class="fas fa-cart-plus"></i> Añadir al carro</div>
          </div>
        </article>

      </section>

      <div class="volver"><a href="home.php"><i class="fas fa-arrow-left"></i>Volver</a></div>

    </main>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
