<?php
class Autenticacion{
  public static function inicioSesion($usuario){

    $_SESSION["email"] = $usuario[0]["nombre"];
  }
}

 ?>
