<?php

include "db.php";

class DbMysql extends Db {
  private $dbMysql;

  public function __construct()
  {
    $dsn = "mysql:host=127.0.0.1;dbname=db;port=3306";
    $user = "root";
    $pass = "root";
try {
      $this->dbMysql = new PDO($dsn, $user, $pass);
      $this->dbMysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\Exception $e) {
        var_dump($e->getMessage());
        $baseDatos = null;
    }
  }
  public function guardarUser(Usuario $user, string $file = null){
    $stmt = $this->dbMysql->prepare("INSERT INTO usuarios VALUES(default, :nombre, :email, :password)");
    $stmt->bindValue(":nombre", $user->getNombre());
    $stmt->bindValue(":email", $user->getEmail());
    $stmt->bindValue(":password", $user->getPassword());
    $stmt->execute();
  }
  public function UserExist(string $email){
    $stmt = $this->dbMysql->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    $usuarioarray = $stmt->fetch(PDO::FETCH_ASSOC);
    if($usuarioarray){
        $usuario = new Usuario($usuarioarray);
    } else {
      $usuario = null;
    }
    return $usuario;
  }
}
