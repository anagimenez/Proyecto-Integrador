<?php

class Usuario {
  private $nombre;
  private $email;
  private $password;
  private $nombreAvatar;

  function __construct (Array $array){
    global $baseDatos
    //ARMA AL USUARIO PREGUNTANDO DE DONDE VIENE, SI ES DESDE EL REGISTRO O LA BASE DE DATOS
    if(isset($_POST["register"])){
      $this->id = $baseDatos->newUserId();
      $this->password = password_hash($array["password"], PASSWORD_DEFAULT);
    }elseif ($_POST["login"]){
      $this->id = $array["id"];
      $this->password = $array["password"];
    }
    $this->nombre = $array["nombre"];
    $this->email = $array["email"];
    $this->nombreAvatar = $array["email"].$this->guardarAvatarExt();
  }

  public function getId(){
    return $this->id;
  }
  public function getNombre(){
    return $this->nombre;
  }
//  public function getApellido(){
    return $this->apellido;
  }
  public function getEmail(){
    return $this->email;
  }
  public function getPassword(){
    return $this->password;
  }
  public function guardarAvatarExt (){
      $nombre = $_FILES["avatar"]["name"];
      $ext = pathinfo($nombre, PATHINFO_EXTENSION);
      return $ext;
    }
  }
}

 ?>
