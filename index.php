<?php
include "init.php";

//loguear usuario si tengo cookie
if(isset($_COOKIE['email'])){
  $auth->loguearUsuario($_COOKIE['email']);
}
if($auth->usuarioLogueado()){
  $usuario = $baseDatos->UserExist($_SESSION['email']);

} else {
  $usuario = "";
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="widht=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato|Libre+Baskerville&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="stylesheetboots.css">
  <link rel="stylesheet" href="loginstyle.css"> -->
  <link rel="stylesheet" href="laposta.css">
</head>
  <body>
    <header class="">
        <div class="menu">
          <ul>
            <li>
              <a href="#">HOME</a>
            </li>
            <li>
              <a href="cocina.php">LA COCINA</a>
            </li>
            <li>
              <a href="#">CONTACTO</a>
            </li>
            <li>
              <a href="cuentas.php">CUENTAS</a>
            </li>
            <!-- <li>
              <a href="#">CHEF's</a>
            </li> -->
          </ul>
        </div>
        <div class="logo">
          <a href="#">
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
                      <button type="button" class="btn btn-light d-md-none" name="button"><i class="fas fa-bars"></i></button>
        </div>
    </header>
    <div class="webbody">
      <main>
        <section class="image">
          <img src="img/masadepan.jpg" alt="">
        </section>
        <aside class="welcome">
          <div class="cuadradoa">
            <div class="cuadradob">
            <h1>Bienvenidos a nuestra cocina!</h1>
            <p>
              Nuestra pasión es cocinar y queremos que nuestros comensales se sientan a gusto.<br>
              Te invitamos a descubrir nuestras delicias!<br>
            </p>
            <button type="" name="button">
              <a href="#">Haga su Pedido</a>
            </button>
            </div>
          </div>
        </aside>
      </main>
      <div class"separador">
        <img src="" alt="">
      </div>
    </div>
 <!-- Productos destacados -->
      <!-- <div class="featured">
        <h1>PRODUCTOS DESTACADOS</h1>
      </div>
      <section class="featured-products"> -->
        <!-- <h1>PRODUCTOS DESTACADOS</h1> -->
        <!-- <article class="product">
          <div class="photo-container">
            <img class="photo" src="img/tortadenuez.jpg" alt="producto 1">
          </div>
          <h2 class="home">Torta de Nuez</h2>
        </article>
        <div class="mid">
          <article class="product2">
            <div class="photo-containera">
              <img class="photo2" src="img/pandeajo.jpg" alt="producto 2">
            </div>
            <h2 class="home">Pan de Ajo y Parmesano</h2>
          </article>
          <article class="product2">
            <div class="photo-container">
              <img class="photo2" src="img/sconesdequeso.jpg" alt="producto 3">
            </div>
            <h2 class="home">Scones de Queso</h2>
          </article>
        </div>
        <article class="product">
          <div class="photo-container">
          <img class="photo3" src="img/alfajoresdemani.jpg" alt="producto 4">
        </div>
        <h2 class="home">Alfajores de Maní</h2>
        </article>
      </section> -->
 <!-- Footer -->
      <!-- <footer>
       <ul class="main-footer">
        <li><a href="index.php">Home</a></li>
        <li><a href="lacocina.php">La cocina</a></li>
        <li><a href="recetas.php">Recetas</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
     </footer> -->
  </body>
</html>
