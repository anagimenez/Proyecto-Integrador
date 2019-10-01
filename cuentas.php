<?php
include "funciones.php";
$nombreOk = "";
$emailOk = "";

//si el formulario viene por POST;

if($_POST && isset($_POST["register"])){
  //tenemos que detectar errores y mostrarlos al usuario.
  $error = validaciones($_POST);
  var_dump($error);
  $nombreOk = trim($_POST["nombre"]);
  $emailOk = trim($_POST["email"]);

  //Si no hay errores;
  if(!$error){
    $user = armarUser();
    guardarUser($user);
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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="loginstyle.css">
    <meta name="viewport" content="width">
    <meta charset="utf-8">
    <title>Leti's Bakery</title>
  </head>
  <body>
    <header>
     <nav class="toggle-nav">
      <div class="container_menu">
             <ul class="menu">
               <li><a href="index.php">Home</a></li>
               <li><a href="cocina.php">La cocina</a></li>
               <li><a href="recetas.php">Recetas</a></li>
               <li class="logo">
                 <img src="img/boceto.png" alt="Imagen logo">
                 <a href="#" class="toggle-nav">
                   <span class="fa fa-bars"></span>
                 </a>
               </li>
               <li><a href="contacto.php">Contacto</a></li>
               <li><a href="loginproyecto.php">Login</a></li>
               <li><a href="registroproyecto.php">Registrate</a></li>
             </ul>
           </div>
          </nav>
    </header>
    <section class=>
      <div class="login">
        <div class="cuadrado1">
          <div class="cuadrado2">
            <form class="" action="cuentas.php" method="post">
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
        <div class="cuadrado3">
          <div class="cuadrado4">
            <form class="reg" action="cuentas.php" method="post" enctype="multipart/form-data">
              <div class="Name">
                <label for="nombre">Nombre</label>
                <?php if(!isset($error["nombre"])): ?>
                  <input id="nombre" type="text" name="nombre" value="<?= $nombreOk ?>">
                <?php else : ?>
                  <input id="nombre" type="text" name="nombre" value="">
                <?php endif ?>
                <small>
                  <?php if(isset($error["nombre"])): ?>
                    <?= $error["nombre"]?>
                  <?php endif?>
                </small>
              </div>
              <div class="Email">
                <label for="email">Dirección de email</label>
                <?php if(!isset($error["email"])): ?>
                  <input id="email" type="email" name="email" value="<?= $emailOk ?>">
                <?php else : ?>
                  <input id="email" type="email" name="email" value="">
                <?php endif ?>
                <small>
                  <?php if(isset($error["email"])): ?>
                    <?= $error["email"]?>
                  <?php endif?>
                </small>
              </div>
              <div class="Phone">
                <label for="phone">Teléfono  (opcional)</label>
                <input id="phone" type="phonenumber" name="phone" value="">
              </div>
              <div class="Picture">
                <label for="avatar">Imagen de perfil</label>
                <input type="file" id="avatar" class="Picture" name="avatar">
                <span class="small text-danger"></span>
                <small>
                  <?php if(isset($error["avatar"])): ?>
                    <?= $error["avatar"]?>
                  <?php endif?>
                </small>
              </div>
              <div class="Pass">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" value="">
                <small>
                  <?php if(isset($error["password"])): ?>
                    <?= $error["password"]?>
                  <?php endif?>
                </small>
              </div>
              <div class="Pass2">
                <label for="confirmation">Confirmar Contraseña</label>
                <input id="confirmation" type="password" name="confirmation" value="">
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

  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  </body>
</html>
