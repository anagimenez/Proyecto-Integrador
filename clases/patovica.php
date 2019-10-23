<?php

class Validator{

  public function validaciones($info){ //verifica que no halla errores
    global $baseDatos;

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
    if (strlen($dato["nombre"])==0) {
      $error["nombre"] = "Este campo no puede estar vacio";
    } else if (!ctype_alpha($dato["nombre"])){
      $error["nombre"] = "Por favor, ingrese caracteres alfabéticos";
    }
    // VERIFICA QUE NO EXISTA EL MAIL EN LA BASE DE DATOS
    if (strlen($dato["email"])==0) {
      $error["email"] = "Este campo no puede estar vacio";
    } else if($baseDatos->userExist($dato["email"])!=null) {
      $error["email"] = "El e-mail ya esta registrado. Por favor, use uno nuevo.";
    }
    //VALIDA QUE LA IMAGEN SE SUBA SIN ERRORES
    if($_FILES["avatar"]["error"]===UPLOAD_ERR_OK){
      $error["avatar"] = "Hubo un problema con la carga. Intente nuevamente";
    } else {
      $ext = pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION);
      if (!$ext == "jpg" && $ext == "jpeg" && $ext == "png"){
        $error["avatar"] = "El archivo debe ser una imagen.";
      }
    }

    //VALIDA CARACTERES DE LA PASS
    if (strlen($dato["password"])==0) {
      $error["password"] = "Este campo no puede estar vacio";
    } else if (strlen($dato["password"])<8) {
      $error["password"] = "La contraseña debe tener como minimo 8 caracteres";
    }
    //CONFIRMA QUE SEA LA CONTRASEÑA CORRECTA
    if ($dato["confirmation"] != $dato["password"]){
      $error["confirmation"] = "Las contraseñas son distintas, por favor verifique que sean las mismas";
    }
    return $error;
  }
}

//login
public function validarLogin($info){
  global $baseDatos;
  $error = [];

  //email
  if(strlen($info["email"]) == 0){
    $error["email"] = "Este campo no puede estar vacio";
  } else if(!filter_var($info["email"], FILTER_VALIDATE_EMAIL)){
    $error["email"] = "Por favor, ingrese un email con formato valido.";
  } else if(!$baseDatos->UserExist($info["email"])){
    $error["email"] = "El usuario no existe. Por favor registrese";
  }

  //password
  if(strlen($info["password"]) == 0){
    $error["password"] = "Este campo no puede estar vacio";
  } else if($baseDatos->UserExist($info["email"])){
    $usuario = $baseDatos->UserExist($info["email"]);

    if(!password_verify($info["password"], $usuario->getPassword())){
      $error["password"] = "La contraseña es incorrecta.";
    }
  }
  return $error;
  }
}
 ?>
