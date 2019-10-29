<?php
include_once("autoload.php");
// recibe el nombre del archivo del avatar y el id por $_GET
if (isset($_GET["avatar"])) {
  //llama a la funcion 'cambiarAvatar' pasando los datos correspondientes
  RegistrarUsuarios::cambiarAvatar($_GET["id"], $_GET["avatar"],$pdo);
  //vuelve a cargar la pagina de registros
  header("location:registros.php");
}
//recibe el nombre del archivo de la imagen de perfil y el id por $_POST
if ($_POST) {
  //llama a la funcion 'eliminarImgPerfil' que busca el nombre del archivo de la imagen de perfil y la borra del disco
  BaseMySQL::eliminarImgPerfil($pdo,$_POST["id"]);
  //llama a la funcion 'guardarPerfil' que guarda la nueva imagen y la registra en la tabla.
  RegistrarUsuarios::guardarPerfil($pdo,$_POST["id"],$_FILES);
  //vuelve a cargar la pagina de registros
  header("location:registros.php");
}


?>
