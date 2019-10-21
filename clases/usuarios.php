<?php

class Usuario {
  private $nombre;
  private $email;
  private $password;

  function __construct (Array $array){
    global $json

    if(isset($_POST["register"])){
      $this->id = $json->newUserId();
      $this->password = password_hash($array["password"], PASSWORD_DEFAULT);
    }elseif ($_POST["login"]){
      $this->id = $array["id"];
      $this->password = $array["password"];
    }
    $this->name = $array["nombre"];
    $this->email = $array["email"];
  }

  public function getId(){
    return $this->id;
  }
  public function getNombre(){
    return $this->nombre;
  }
  public function getApellido(){
    return $this->apellido;
  }
  public function getEmail(){
    return $this->email;
  }
  public function getPassword(){
    return $this->password;
  }

}

 ?>
