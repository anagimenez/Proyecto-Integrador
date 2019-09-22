<?php
include "funciones.php";
$errores = [];
$nombreOk = "";
$emailOk = "";

//si el formulario viene por POST;

if($_POST){

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
    //Redirigirlo a página Exito;
    header("Location:index.php");
    // exit;
    }
}
?>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="loginstyle.css">
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato|Libre+Baskerville&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <meta name=”viewport” content=”width=device-width, initial-scale=1.0, shrink-to-fit=no”>
</head>
  <body>
    <header class="register">
        <nav class="toggle-nav">
         <div class="container_menu">
                <ul class="menu">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="cocina.php">La cocina</a></li>
                  <li class="logo">
                    <a class="logo" href="index.php">
                    <img src="img/boceto.png" alt="Imagen logo">
                  </a>
                    <a href="#" class="toggle-nav">
                      <span class="fa fa-bars"></span>
                    </a>
                  </li>
                  <li><a href="recetas.php">Recetas</a></li>
                  <li><a href="contacto.html">Contacto</a></li>
                </ul>
              </div>
             </nav>

        </header>

    <div class="container">
      <section class="column">
        <div class="form">
          <h1>Registro</h1>
          <div class="new">
            <p>¿Ya tienes una cuenta?
                <a class="inicia" href="loginproyecto.php"><strong>Inicia sesión</strong></a>
            </p>
          </div>
          <form class="login" action="registroproyecto.php" method="post">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <?php if(!isset($error["nombre"])): ?>
                <input id="nombre" type="text" name="nombre" value="<?= $nombreOk ?>" required>
              <?php else : ?>
                <input id="nombre" type="text" name="nombre" value="" required>
              <?php endif ?>
              <small>
                <?php if(isset($error["nombre"])): ?>
                  <?= $error["nombre"]?>
                <?php endif?>
              </small>
            </div>
            <div class="form-group">
              <label for="email">Dirección de correo electrónico</label>
              <?php if(!isset($error["email"])): ?>
                <input id="email" type="email" name="email" value="<?= $emailOk ?>" required>
              <?php else : ?>
                <input id="email" type="email" name="email" value="" required>
              <?php endif ?>
              <small>
                <?php if(isset($error["email"])): ?>
                  <?= $error["email"]?>
                <?php endif?>
            </div>
            <div class="form-group">
              <label for="phone">Teléfono  (opcional)</label>
              <input id="phone" type="phonenumber" name="phone" value="">
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input id="password" type="password" name="password" value="" required>
              <small>
                <?php if(isset($error["password"])): ?>
                  <?= $error["password"]?>
                <?php endif?>
              </small>
            </div>
            <div class="form-group">
              <label for="confirmation">Confirmar contraseña</label>
              <input id="confirmation" type="password" name="confirmation" value="" required>
              <small>
                <?php if(isset($error["confirmation"])): ?>
                  <?= $error["confirmation"]?>
                <?php endif?>
              </small>
            </div>
            <button class="submit" type="submit" name="button">Crear cuenta</button>
          </form>
        </div>
      </section>
    </div>
  </body>
</html>
