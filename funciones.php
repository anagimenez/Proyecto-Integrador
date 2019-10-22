<?php
session_start (); //INICIA SESSION del USUARIO

// function validaciones($info){ //verifica que no halla errores
//   $error = [];
//   $dato = [];
//
//   foreach ($info as $key => $value) { //limpia el nombre y mail de posibles espacios
//     if($key=="nombre" || $key == "email"){
//     $dato[$key] = trim($value);
//     } else {
//       $dato[$key] = $value;
//     }
//   }
//   // VALIDA NOMBRE ALFABETICO
//   if (strlen($dato["nombre"])==0) {
//     $error["nombre"] = "Este campo no puede estar vacio";
//   } else if (!ctype_alpha($dato["nombre"])){
//     $error["nombre"] = "Por favor, ingrese caracteres alfabéticos";
//   }
//   // VERIFICA QUE NO EXISTA EL MAIL EN LA BASE DE DATOS
//   if (strlen($dato["email"])==0) {
//     $error["email"] = "Este campo no puede estar vacio";
//   } else if(userExist($dato["email"])!=null) {
//     $error["email"] = "Este e-mail ya esta registrado. Por favor, ingrese uno nuevo.";
//   }
//   //VALIDA QUE LA IMAGEN SE SUBA SIN ERRORES
//   if($_FILES["avatar"]["error"]===UPLOAD_ERR_OK){
//     $error["avatar"] = "Hubo un problema con la carga. Intente nuevamente";
//   } else {
//     $ext = pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION);
//     if (!$ext == "jpg" && $ext == "jpeg" && $ext == "png"){
//       $error["avatar"] = "El archivo debe ser una imagen.";
//     }
//   }
//
//   //VALIDA CARACTERES DE LA PASS
//   if (strlen($dato["password"])==0) {
//     $error["password"] = "Este campo no puede estar vacio";
//   } else if (strlen($dato["password"])<8) {
//     $error["password"] = "La contraseña debe tener como minimo 8 caracteres";
//   }
//   //CONFIRMA QUE SEA LA CONTRASEÑA CORRECTA
//   if ($dato["confirmation"] != $dato["password"]){
//     $error["confirmation"] = "Las contraseñas son distintas, por favor verifique que sean las mismas";
//   }
//   return $error;
// }

// function newUserId (){ //busca los usuarios existentes para generar un nuevo ID.
//   $json = file_get_contents("usuarios.json");
//   $array = json_decode($json, true);
//   $ultimoUser = array_pop($array['usuarios']);
//   $ultimaId = $ultimoUser['id'];
//   return $ultimaId + 1;
// }

// function armarUser(){
//   return $user = [
//     "id" => newUserId(),
//     "nombre" => trim($_POST['nombre']),
//     "email" => trim($_POST['email']),
//     "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
//   ];
// }

// function guardarUser($newUser){//Guardar un usuario en la base de datos.
//   $json = file_get_contents("usuarios.json");
//   $array = json_decode($json, true);
//   $array['usuarios'][] = $newUser;
//   $json = json_encode($array,JSON_PRETTY_PRINT);
//   file_put_contents("usuarios.json", $json);
// }

// function guardarAvatar (){
//   $nombre = $_FILES["avatar"]["name"];
//   $archivo = $_FILES["avatar"]["tmp"];
//   $ext = pathinfo($nombre, PATHINFO_EXTENSION);
//   $guardado = "avatares/". $_POST["email"] . $ext;
//   move_uploaded_file($archivo,$guardado);
// }

// function UserExist($dato){
//   $json = file_get_contents("usuarios.json");
//   $array = json_decode($json, true);
//   foreach ($array['usuarios'] as $userData) {
//     if($userData['email'] === $dato){
//       return $userData;
//     }
//   }
//   return null;
// }

//login

function validarLogin($dato){
  $error = [];

//email
if(strlen($dato["email"]) == 0){
  $errores["email"] = "Este campo no puede estar vacio";
} else if(!filter_var($dato["email"], FILTER_VALIDATE_EMAIL)){
  $error["email"] = "Por favor, ingrese un email con formato valido.";
} else if(!UserExist($dato["email"])){
  $error["email"] = "El usuario no existe. Por favor registrese";
}

//password
if(strlen($dato["password"]) == 0){
  $error["password"] = "Este campo no puede estar vacio";
} else {
  $usuario = UserExist($dato["email"]);
  if(!password_verify($dato["password"], $usuario["password"])){
    $error["password"] = "La contraseña es incorrecta.";
  }
}
return $error;
}

function loguearUsuario(){
  $_SESSION["email"] = $_POST["email"];
}

function usuarioLogueado(){
  return isset($_SESSION["email"])
}



 ?>
