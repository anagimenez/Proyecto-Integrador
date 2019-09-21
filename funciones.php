<?php
session_start ();

function validaciones($info){
  $error = [];
  $dato = [];

  foreach ($info as $key => $value) {
    if($key=="nombre" || $key == "email"){
    $dato[$key] = trim($value);
    } else {
      $dato[$key] = $value;
    }
  }
  // VALIDAR NOMBRE ALFABETICO
  if (!ctype_alpha($dato["nombre"])){
    $error["nombre"] = "Por favor, ingrese caracteres alfabéticos";
  }

  // if(UsuarioExistente($dato["email"])) {
  //   $error["email"] = "Este e-mail ya existe. Por favor, registre uno que no este en la base de datos.";
  // }

  if (strlen($dato["password"])<8) {
    $error["password"] = "La contraseña debe tener como minimo 8 caracteres";
  }

  if ($dato["confirmation"] != $dato["password"]){
    $error["confirmation"] = "Las contraseñas son distintas, por favor verifique que sean las mismas";
  }

  return $error;
}

function armarUser(){
  return $usuario = [
    "id" => nextId(),
    "userName" => trim($_POST['userName']),
    "email" => trim($_POST['email']),
    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
  ];

}










 ?>
