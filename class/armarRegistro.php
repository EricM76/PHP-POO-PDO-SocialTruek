<?php

class ArmarRegistro{

  public static function armarUsuario($datos, $imagen){
    $contraHash = password_hash($datos["pass"], PASSWORD_DEFAULT);

    $usuario = new Usuario($datos["nombre"], $datos["apellido"], $datos["email"], $contraHash, $datos["fecha"],$datos["sexo"], null, null, null);

    return $usuario;
  }

  public static function armarCategoria($datos){

    $categoria = new Categoria($datos["categoria"]);

    return $categoria;
  }

  public static function cambiarAvatar($id,$avatar,$pdo){
    $sql = "UPDATE usuarios SET avatar ='$avatar' WHERE id ='$id'";
    $query = $pdo->prepare($sql);
    $query->execute();
  }

  public static function eliminarImgPerfil($pdo,$id){
    $sql = "SELECT perfil FROM usuarios WHERE id LIKE $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    $perfil = $query->fetch(PDO::FETCH_ASSOC);
    unlink("images/perfil/".$perfil["perfil"]);
  }

  public static function guardarPerfil($pdo,$id,$imagen){
    $nombre = $imagen["imagen"]["name"];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen["imagen"]["tmp_name"];
    $rutaDestino = dirname(__DIR__);
    $rutaDestino = $rutaDestino."/images/perfil/";
    $nombreImg = uniqid();
    $rutaDestino = $rutaDestino.$nombreImg.".".$ext;
    move_uploaded_file ($archivoOrigen, $rutaDestino);

    $sql = "UPDATE usuarios SET perfil ='$nombreImg."."$ext' WHERE id ='$id'";
    $query = $pdo->prepare($sql);
    $query->execute();



  }
}

 ?>
