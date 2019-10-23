<?php
include "clases/dbjson.php";
include "clases/patovica.php";

include "clases/usuarios.php";

//$auth = new Auth;
// var_dump($auth);

$file = "usuarios.json";
$baseDatos = new DbJson($file);
?>
