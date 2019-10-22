<?php
include "init.php";
$nombreOk = "";
$emailOk = "";

//si el formulario viene por POST;

if($_POST && isset($_POST["register"])){
  //tenemos que detectar errores y mostrarlos al usuario.
  $error = validaciones($_POST);
  //var_dump($error);
  $nombreOk = trim($_POST["nombre"]);
  $emailOk = trim($_POST["email"]);

  //Si no hay errores;
  if(!$error){
    //$user = armarUser();
    $user = new Usuario($_POST);
    $baseDatos->guardarUser($user, $file);
    //Subir la imagen de perfil
    guardarAvatar();
    //Redirigirlo a página Exito;
    header("Location:index.php");
    // exit;
    }
}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato|Libre+Baskerville&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="stylesheetboots.css">
    <link rel="stylesheet" href="loginstyle.css"> -->
    <link rel="stylesheet" href="laposta.css">
    <title>Leti's Bakery</title>
  </head>
  <body>
    <header class="">
        <div class="menu">
          <ul>
            <li>
              <a href="index.php">HOME</a>
            </li>
            <li>
              <a href="#">LA COCINA</a>
            </li>
            <li>
              <a href="#">CONTACTO</a>
            </li>
            <li>
              <a href="#">CUENTAS</a>
            </li>
            <!-- <li>
              <a href="#">CHEF's</a>
            </li> -->
          </ul>
        </div>
        <div class="logo">
          <a href="index.php">
            <img src="img/boceto.png" alt="">
          </a>
        </div>
        <div class="redes">
            <ul>
              <li>
                <a id="tw" href="#"><i class="fab fa-twitter"></i></a>
              </li>
              <li>
                <a id="fb" href="#"><i class="fab fa-facebook-f"></i></a>
              </li>
              <li>
                <a id="insta" href="#"><i class="fab fa-instagram"></i></a>
              </li>
            </ul>
        </div>
    </header>
    <section class="formularios">
      <div class="login">
        <h1>Iniciar sesión</h1>
        <div class="new">
            <p>Eres un nuevo usuario?
              <a class="crear" href="registroproyecto.php"><strong>Crear una cuenta</strong></a>
            </p>
        </div>
        <div class="cuadrado1">
          <div class="cuadrado2">
            <form class="log" action="cuentas.php" method="post">
              <div class="form-group">
                <label for="email">Dirección de email</label>
              </div>
              <div class="input email">
                <input id="email" type="text" name="email" value="">
              </div>
                  <div class="form-group">
                    <label for="password">Contraseña</label>
                  </div>
                  <div class="input pass">
                    <input id="password" type="password" name="password" value="">
                  </div>
                  <div class="remember">
                    <input id="recordarme" type="checkbox" name="recordarme" value="">
                    <label for="recordarme">Recordarme</label>
                  </div>
                  <input type="hidden" name="login" value="">
                  <button class="submit" type="submit" name="button">Iniciar sesión</button>
            </form>
          </div>
        </div>
      </div>
      <div class="register">
        <h1>Registro</h1>
        <div class="new">
          <p>¿Ya tienes una cuenta?
              <a class="inicia" href="cuentas.php"><strong>Inicia sesión</strong></a>
          </p>
        </div>
        <div class="cuadrado3">
          <div class="cuadrado4">
            <form class="reg" action="cuentas.php" method="post" enctype="multipart/form-data">
              <div class="name">
                <label for="nombre">Nombre</label>
              </div>
              <div>
                <?php if(!isset($error["nombre"])): ?>
                  <input id="nombre" type="text" name="nombre" value="<?= $nombreOk ?>">
                <?php else : ?>
                  <input id="nombre" type="text" name="nombre" value="">
                <?php endif ?>
              </div>
              <div>
                <small>
                  <?php if(isset($error["nombre"])): ?>
                    <?= $error["nombre"]?>
                  <?php endif?>
                </small>
              </div>
              <div class="email">
                <label for="email">Dirección de email</label>
              </div>
              <div>
                <?php if(!isset($error["email"])): ?>
                  <input id="email" type="email" name="email" value="<?= $emailOk ?>">
                <?php else : ?>
                  <input id="email" type="email" name="email" value="">
                <?php endif ?>
              </div>
              <div>
                <small>
                  <?php if(isset($error["email"])): ?>
                    <?= $error["email"]?>
                  <?php endif?>
                </small>
              </div>
              <div class="phone">
                <label for="phone">Teléfono  (opcional)</label>
              </div>
              <div>
                <input id="phone" type="phonenumber" name="phone" value="">
              </div>
              <div class="picture">
                <label for="avatar">Imagen de perfil</label>
              </div>
              <div>
                <input type="file" id="avatar" class="Picture" name="avatar">
                <span class="small text-danger"></span>
              </div>
              <div>
                <small>
                  <?php if(isset($error["avatar"])): ?>
                    <?= $error["avatar"]?>
                  <?php endif?>
                </small>
              </div>
              <div class="pass">
                <label for="password">Contraseña</label>
              </div>
              <div>
                <input id="password" type="password" name="password" value="">
              </div>
              <div>
                <small>
                  <?php if(isset($error["password"])): ?>
                    <?= $error["password"]?>
                  <?php endif?>
                </small>
              </div>
              <div class="pass2">
                <label for="confirmation">Confirmar Contraseña</label>
              </div>
              <div>
                <input id="confirmation" type="password" name="confirmation" value="">
              </div>
              <div>
                <small>
                  <?php if(isset($error["confirmation"])): ?>
                    <?= $error["confirmation"]?>
                  <?php endif?>
                </small>
              </div>
              <input type="hidden" name="register" value="">
              <button class="submit" type="submit" name="button">Crear cuenta</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer class="submenu">
      <div class="col-12">

      </div>
    </footer>
  </body>
</html>
