<?php
class RegistrarUsuarios{
//funcion para validar los datos ingresados enviados por $_POST
public function validarDatosUser($datos){
//arrary de errores
    $errores = [];
//validacion de errores
    if ($datos) {
      if (strlen($datos["nombre"])==0) {
        $errores[0] = "El campo nombre se encuentra vacio";
      }
      if (strlen($datos["apellido"])==0) {
        $errores[1] = "El campo apellido se encuentra vacio";
      }
      if (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
        $errores[2] = "El email tiene un formato incorrecto";
      }
      if (strlen($datos["pass"])<8) {
        $errores[3] ="La contraseña tiene menos de 8 caracteres";
      }
    }
    //retorna el array de errores
    return $errores;
  }
//funcion que crea una instancia de la clase usuario para luego guardarla en la base de datos
  public static function crearUsuario($datos){
    //hasheo de contraseña
    $contraHash = password_hash($datos["pass"], PASSWORD_DEFAULT);
    //crea una instancia de la clase usuario con los datos recibidos por $_POST. El avatar, perfil y val_user se pasan como un para luego ser cargados de forma independiente
    $usuario = new Usuario($datos["nombre"], $datos["apellido"], $datos["email"], $contraHash, $datos["fecha"],$datos["sexo"], null, null, null);
    //retorna la instancia de la clase usuario
    return $usuario;
  }
//funcion para guardar un nuevo usuario
  static public function guardarUsuario($pdo, $usuario){
    //genera la consulta sql
      $sql = "INSERT INTO usuarios VALUES(default, :nombre, :apellido, :email, :pass, :fecha, :sexo, :avatar=null, :perfil=null, :val_user=null)";
      //prepara la consulta
      $guardarUsu = $pdo->prepare($sql);
      //bindea los datos
      $guardarUsu->bindValue(':nombre', $usuario->getNombre());
      $guardarUsu->bindValue(':apellido', $usuario->getApellido());
      $guardarUsu->bindValue(':email', $usuario->getEmail());
      $guardarUsu->bindValue(':pass', $usuario->getPass());
      $guardarUsu->bindValue(':fecha', $usuario->getFecha());
      $guardarUsu->bindValue(':sexo', $usuario->getSexo());
      $guardarUsu->bindValue(':avatar', $usuario->getAvatar());
      $guardarUsu->bindValue(':perfil', $usuario->getPerfil());
      $guardarUsu->bindValue(':val_user', $usuario->getVal_user());
      //ejecuta la consulta
      $guardarUsu->execute();
  }
//funcion que permite guardar en la base datos el nombre del archivo del avatar
  public static function cambiarAvatar($id,$avatar,$pdo){
    $sql = "UPDATE usuarios SET avatar ='$avatar' WHERE id ='$id'";
    $query = $pdo->prepare($sql);
    $query->execute();
  }
//funcion que permite guardar la imagen de perfil y actualizarla en la bd
  public static function guardarPerfil($pdo,$id,$imagen){
    $nombre = $imagen["imagen"]["name"];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen["imagen"]["tmp_name"];
    $rutaDestino = dirname(__DIR__);
    $rutaDestino = $rutaDestino."/images/perfil/";
    $nombreImg = uniqid();
    $rutaDestino = $rutaDestino.$nombreImg.".".$ext;
    move_uploaded_file ($archivoOrigen, $rutaDestino);
//hace la consulta para actualizar la bd
    $sql = "UPDATE usuarios SET perfil ='$nombreImg."."$ext' WHERE id ='$id'";
    $query = $pdo->prepare($sql);
    $query->execute();

  }
}
 ?>
