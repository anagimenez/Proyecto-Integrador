<?php

include "base-de-datos.php";

class Dbjson extends Db {  
  private $baseDatos;

  function __construct(string $file){
    if(!file_exists($file)){
      $data = ['usuarios'=>[]]; // En caso de que el archivo no exista vamos a encodear al formato incial del .json para que no rompa el login.
      $this->baseDatos = json_encode($data);
    } else {
      $this->baseDatos = file_get_contents($file);
    }
  }

  function newUserId (){ //busca los usuarios existentes para generar un nuevo ID.
    //$baseDatos = file_get_contents("usuarios.json");
    $array = json_decode($this->baseDatos, true);
    $ultimoUser = array_pop($array['usuarios']);
    $ultimaId = $ultimoUser['id'];
    return $ultimaId + 1;
  }

  public function guardarUser(usuario $newUser, string $file = null){//Guardar un usuario en la base de datos.
    //$baseDatos = file_get_contents("usuarios.json");
    $array = json_decode($this->baseDatos, true);
        //Pasar el usuario de Objeto a Array.
        $usuario = [
          "id" => $newUser->getId(),
          "name" => $newUser->getNombre(),
          "email" => $newUser->getEmail(),
          "password" =>$newUser->getPassword(),
        ];

    $array['usuarios'][] = $newUser;
    $baseDatos = json_encode($array,JSON_PRETTY_PRINT);
    file_put_contents("usuarios.json", $baseDatos);
  }

  public function UserExist(string $email){
    //$baseDatos = file_get_contents("usuarios.json");
    $array = json_decode($this->baseDatos, true);
    foreach ($array['usuarios'] as $userData) {
      if($userData['email'] === $email){
        $userObj = new Usuario($userData);
        return $userObj;
      }
    }
    return null;
  }
}

 ?>
