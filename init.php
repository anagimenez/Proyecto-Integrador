<?php
include "clases/dbjson.php";
include "clases/patovica.php";

include "clases/usuarios.php";
include "clases/auth.php";

//$auth = new Auth;
// var_dump($auth);
$auth = new Auth;

$file = "usuarios.json";
$baseDatos = new DbJson($file);
?>
