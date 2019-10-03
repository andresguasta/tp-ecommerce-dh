<?php
require_once('funciones/validador.php');
  $seccion = "Login";


   if (isset($_COOKIE['recuerdame'])) {
           $_SESSION['email'] = $_COOKIE['recuerdame'];

       }
//si esta logueado va al perfil
       if(estaElUsuarioLogeado()){
               header('location:perfil.php');
           }
//Aca voy a crear la cokie y validar el login
       $email = '';
       $password = '';
       $errores = [
            'email' => '',
            'password' => ''
        ];
        if ($_POST) {
                $email = trim($_POST['email']);
                $password = $_POST['password'];
                //llamo a la funcion de validar el login que hice en el validador
                $errores = validarLogin($_POST);
                if (!$errores) {
                    $archivo = file_get_contents('archivos/usuarios.json');
                    $usuarios = json_decode($archivo, true);
                    foreach ($usuarios as $usuario) {
                        if ($usuario['email'] == $email && password_verify($password, $usuario['password'])) {
                            //Busca al usuario y lo loguea
                            $_SESSION['email'] = $email;

                            //verifica el chek de la cookie
                            if (isset($_POST['recuerdame'])) {
                                //guardo la cookie
                                setcookie('recuerdame', $email, time() + 60*60*24*7 );
                            }
                            //lo mando al perfil
                            header('location:miPerfil.php');
                        }
                    }
                    //aviso que hay un error
                    $errores['email'] = 'Usuario o clave incorrectos';
                }
            }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php require_once('head.php') ?>

  <head>
    <link rel="stylesheet" href="css/login.css">
  </head>

  <body>

  <div class="container-fluid">

    <?php require_once('header.php'); ?>

    <main>

      <form class="" action="home.php" method="post">

        <div class="contenido-formulario row">

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="email">Email</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="email" id="email" name="" value="<?= $email ?>" required>
                <?= (isset($errores['email']) ? $errores['email'] : '') ?>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="pass">Contraseña</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">
                <input type="password" id="pass" name="" value="" required>
                <?= (isset($errores['pass']) ? $errores['pass'] : '') ?>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-3 col-lg-5 valor-campo">
                <input type="checkbox" id="recuerdame" name="recuerdame" value="" required>
              </div>
              <div class="col-9 col-lg-7 dato-campo">
                <label for="recuerdame">Recordar datos de inicio de sesión</label>

              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 dato-campo">
                <label for=""><a href="home.php">Olvidé mi contraseña</a></label>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 dato-campo">
                <label for=""><a href="registro.php">Registrarse</a></label>
              </div>
            </div>
          </div>

          <div class="col-12 container-botones">
            <div class="row">
              <div class="col-12 container-boton-submit">
                <button class="boton-submit" type="submit" name="button">Enviar</button>
              </div>
            </div>
          </div>

        </div>

      </form>

    </main>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
