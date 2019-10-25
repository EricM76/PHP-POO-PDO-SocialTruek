<?php
include_once("autoload.php");
if (isset($_GET["avatar"])) {
  ArmarRegistro::cambiarAvatar($_GET["id"], $_GET["avatar"],$pdo);
  header("location:registros.php");
}
if ($_POST) {
  ArmarRegistro::eliminarImgPerfil($pdo,$_POST["id"]);
  ArmarRegistro::guardarPerfil($pdo,$_POST["id"],$_FILES);
  header("location:registros.php");
}


?>
