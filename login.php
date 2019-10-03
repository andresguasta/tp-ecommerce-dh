<?php
require_once('funciones/validador.php');
  $seccion = "Login";


  /* Correcion: para hacer un codigo mas prolijo tabular espacios con la tecla tab, y no con espacios
   * Si bien está bien dejar líneas en blanco entre dos líneas de código, es preferible, en este caso
   * Dejarla la línea entre la declaracion de la funcion y la primer linea de la funcion, en vez de entre la linea
   * de la funcion y la llave de cierre
   */
   if (isset($_COOKIE['recuerdame'])) {
           $_SESSION['email'] = $_COOKIE['recuerdame'];

       }
  /* Correcion: mal tabulado y no hay espacio entre las declaraciones de funciones
   */
//si esta logueado va al perfil
       if(estaElUsuarioLogeado()){
               header('location:perfil.php');
           }
  /* Correcion: mal tabulado y no hay espacio entre las declaraciones de funciones
   */
//Aca voy a crear la cokie y validar el login
       $email = '';
       $password = '';

       /* Correcion: No hace falta setear la variable $errores aca, ya que la estas seteando en la linea 43
        * Al hacer esto acá va hacer que la variable $errores este siempre seteada y nunca va se va a verificar como
        * true la condicion de la linea 50, por ende nunca se logeará al usuario, lo que nos lleva a otra cosa, probar que el codigo
        * anda antes de darlo por hecho, y si no anda tratar de encontrar el por qué y arreglarlo
        */
       $errores = [
            'email' => '',
            'password' => ''
        ];
        /* Correcion: dejar lineas en blanco entre las lineas de codigo hace el codigo mas legible
         */
        if ($_POST) {
                $email = trim($_POST['email']);
                /* Correcion: si hace trim del email deberia tambien hacerse trim de la password y todos los elementos que lleguen por $_POST */
                $password = $_POST['password'];
                //llamo a la funcion de validar el login que hice en el validador
                $errores = validarLogin($_POST);

                /* Recomendacion: checkear los recursos que tenemos
                 * En el archivo validador.php hay una funcion hayErrores que checkea si los
                 * elementos de un array de errores estan vacios o no, que podria ser util para este caso
                 * en vez de checkear si !$errores que es ambiguo o poco preciso
                 */
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
                            /* Correcion: esta bien mandarlo al final una vez que encontro el usuario y se inicio la session y se seteo
                             * la cookie, pero no existe en nuestro proyecto el archivo miPerfil.php, sino que para nosotros es perfil.php
                             * Cuidado con el copy paste
                             */
                            //lo mando al perfil
                            /* header('location:miPerfil.php'); */
                            header('location.perfil.php');
                        }
                    }
                    /* Correcion: no corresponde setear un error para el email en este contexto, ya que los errores son seteados en
                     * la funcion validarLogin() que se llama en la linea 42
                     * En todo caso corresponde a esa funcion/contexto checkear si el email ingresado es correcto o no y lo mismo para la clave
                     */
                    //aviso que hay un error
                    $errores['email'] = 'Usuario o clave incorrectos';
                }
            }

  /* Recomendacion: dividir el codigo de procesos largos como esté para volidar el login en funciones y ponerlas en un archivo */

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

      <!-- El formulario deberia redirigir a login.php para poder hacer las validaciones correspondientes -->
      <form class="" action="home.php" method="post">

        <div class="contenido-formulario row">

          <div class="col-12 campo">
            <div class="row">
              <div class="col-12 col-lg-6 dato-campo">
                <label for="email">Email</label>
              </div>
              <div class="col-12 col-lg-6 valor-campo">

                <!-- Correcion: El input no tiene nada en el campo name, entonces como vamos a anlizar lo que nos llega por $_POST
                     Si no seteamos el campo name nunca va existir $_POST["email"], por lo tanto no podremos validarlo
                -->
                <input type="email" id="email" name="" value="<?= $email ?>" required>

                <!-- Correcion: Esta bien el checkeo para ver si esta seteado el error email. Personalmente agregaría
                     el checkceo de si ademas de estar seteado el error si el error no es un string vacio ($errores['email'] != "")
                     Además, seria bueno poner el error en un div con clase eror para poder darle estilo al error, como texto rojo o algo
                     Por ej:

                     <?php if(isset($errores['email']) && $errores['email'] != "") { ?>
                       <div class="error">
                        <?=$errores['email']?>
                       </div>
                    <?php } ?>

                 -->
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

                <!-- Correcion: El input no tiene nada en el campo name, entonces como vamos a anlizar lo que nos llega por $_POST
                     Si no seteamos el campo name nunca va existir $_POST["password"], por lo tanto no podremos validarlo
                -->
                <input type="password" id="pass" name="" value="" required>
                <?= (isset($errores['pass']) ? $errores['pass'] : '') ?>
              </div>
            </div>
          </div>

          <div class="col-12 campo">
            <div class="row">
              <div class="col-3 col-lg-5 valor-campo">

                <!-- El campo recuerdame no deberia ser requerido (required), ya que es opcional -->
                <input type="checkbox" id="recuerdame" name="recuerdame" value="" required>
              </div>
              <div class="col-9 col-lg-7 dato-campo">
                <!--
                   Esta bien el seteo de la cookie y el nombre, el problema es que la label no deberia ser
                  "Recordar datos de inicio de sesion" sino que deberia ser "No cerrar sesion", debido a que no
                  estamos persistiendo los datos de inicio de sesion sino que logeando al usuario automaticamente sin
                  que tenga que logearse
                -->
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
