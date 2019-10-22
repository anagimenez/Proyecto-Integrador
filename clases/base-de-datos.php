<?php
abstract class Db
{
  abstract public function guardarUser(Usuario $user, string $file = null);
  abstract public function userExist(string $email);
}
 ?>
