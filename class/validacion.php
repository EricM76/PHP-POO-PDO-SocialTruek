<?php
class Validacion{

    public function validarLogin($datos, $usuario){

      if(password_verify($datos["pass"], $usuario["pass"]) == false){
        $errores[] = "El usuario/contrasenia es incorrecto";
      }
      // La funcion retorna los errores
      return $errores;
    }
}

 ?>
