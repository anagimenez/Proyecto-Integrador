<?php
//include "funciones.php";
include "init.php";

if($auth->usuarioLogueado()){
  header("Location:index.php");
  exit;
}
$error = [];

if($_POST){
  $error = Validator::validarLogin($_POST);

if(!error){
  $auth->loguearUsuario($_POST['email']);
  header("Location:index.php");
  exit;
}
} ?>

<!DOCTYPE html>
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
    <header class="">
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
                <li><a href="recetas.html">Recetas</a></li>
                <li><a href="contacto.html">Contacto</a></li>
              </ul>
        </div>
      </nav>
    </header>

    <div class="container">
      <section class="column">
        <div class="form">
          <h1>Iniciar sesión</h1>
          <div class="new">
              <p>Eres un nuevo usuario?
                <a class="crear" href="registroproyecto.php"><strong>Crear una cuenta</strong></a>
              </p>
          </div>
          <form class="login" action="loginproyecto.php" method="get">
              <div class="form-group">
                <label for="email">Dirección de correo electrónico</label>
              </div>
              <div class="input email">
                <input id="email" type="text" name="email" value="" required>
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
              </div>
              <div class="input pass">
                <input id="password" type="password" name="password" value="" required>
              </div>
              <div class="remember">
                <input id="recordarme" type="checkbox" name="recordarme" value="">
                <label for="recordarme">Recordarme</label>
              </div>
                <button class="submit" type="submit" name="button">Iniciar sesión</button>
            </form>
        </div>
      </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>


</html>
