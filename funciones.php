<?php
session_start (); //INICIA SESSION del USUARIO

function validaciones($info){ //verifica que no halla errores
  $error = [];
  $dato = [];

  foreach ($info as $key => $value) { //limpia el nombre y mail de posibles espacios
    if($key=="nombre" || $key == "email"){
    $dato[$key] = trim($value);
    } else {
      $dato[$key] = $value;
    }
  }
  // VALIDA NOMBRE ALFABETICO
  if (!ctype_alpha($dato["nombre"])){
    $error["nombre"] = "Por favor, ingrese caracteres alfabéticos";
  }
  // VERIFICA QUE NO EXISTA EL MAIL EN LA BASE DE DATOS
  if(userExist($dato["email"])!=null) {
    $error["email"] = "Este e-mail ya esta registrado. Por favor, ingrese uno que no se encuentre en la base de datos.";
  }
  //VALIDA CARACTERES DE LA PASS
  if (strlen($dato["password"])<8) {
    $error["password"] = "La contraseña debe tener como minimo 8 caracteres";
  }
  //CONFIRMA QUE SEA LA CONTRASEÑA CORRECTA
  if ($dato["confirmation"] != $dato["password"]){
    $error["confirmation"] = "Las contraseñas son distintas, por favor verifique que sean las mismas";
  }
  return $error;
}

function newUserId (){ //busca los usuarios existentes para generar un nuevo ID.
  $json = file_get_contents("usuarios.json");
  $array = json_decode($json, true);
  $ultimoUser = array_pop($array['usuarios']);
  $ultimaId = $ultimoUser['id'];
  return $ultimaId + 1;
}

function armarUser(){
  return $user = [
    "id" => newUserId(),
    "nombre" => trim($_POST['nombre']),
    "email" => trim($_POST['email']),
    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
  ];

}

function guardarUser($newUser){//Guardar un usuario en la base de datos.
  $json = file_get_contents("usuarios.json");
  $array = json_decode($json, true);
  $array['usuarios'][] = $newUser;
  $json = json_encode($array,JSON_PRETTY_PRINT);
  file_put_contents("usuarios.json", $json);
}

function UserExist($dato){
  $json = file_get_contents("usuarios.json");
  $array = json_decode($json, true);
  foreach ($array['usuarios'] as $userData) {
    if($userData['email'] === $dato){
      return $userData;
    }
  }
  return null;
}






 ?>
