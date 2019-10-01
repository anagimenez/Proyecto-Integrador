<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato|Libre+Baskerville&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <meta name=”viewport” content=”width=device-width, initial-scale=1.0, shrink-to-fit=no”>
  <link rel="stylesheet" href="styleproyecto.css">
  <link rel="stylesheet" href="loginstyle.css">
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
 <!-- foto home y parrafo de bienvenida -->
      <section class="img_wel">
        <div class="img_container">
          <img class="image_home" src="img/masadepan.jpg" alt="Imagen home">
        </div>
        <div class="welcome">
          <h1>Bienvenido!</h1>
          <br>
          <p class="text">Nuestra pasión es cocinar y queremos que nuestros comensales se sientan a gusto.</p>
          <br>
          <p>Te invitamos a descubrir nuestras delicias!</p>
          <br>
          <a class="pedido" href="cocina.php">Haga su pedido</a>
        </div>
      </section>
 <!-- Productos destacados -->
      <div class="featured">
        <h1>PRODUCTOS DESTACADOS</h1>
      </div>
      <section class="featured-products">
        <!-- <h1>PRODUCTOS DESTACADOS</h1> -->
        <article class="product">
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
      </section>
 <!-- Footer -->
      <footer>
       <ul class="main-footer">
        <li><a href="index.php">Home</a></li>
        <li><a href="lacocina.php">La cocina</a></li>
        <li><a href="recetas.php">Recetas</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
     </footer>
  </body>
</html>