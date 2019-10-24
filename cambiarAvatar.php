<?php
include_once("autoload.php");
if (isset($_GET["avatar"])) {
  // $avatar=$_GET["avatar"];
  // $id=$_GET["id"];
  // $sql = "UPDATE usuarios SET avatar ='$avatar' WHERE id ='$id'";
  // $query = $pdo->prepare($sql);
  // $query->execute();
  // header("location:registros.php");
  ArmarRegistro::cambiarAvatar($_GET["id"], $_GET["avatar"],$pdo);
  header("location:registros.php");
}
  // $id = $_POST["id"];
  // $sql = "SELECT perfil FROM usuarios WHERE id LIKE $id";
  // $query = $pdo->prepare($sql);
  // $query->execute();
  // $perfil = $query->fetch(PDO::FETCH_ASSOC);
  // unlink("images/perfil/.".$perfil["perfil"]);
  // exit;
  ArmarRegistro::eliminarImgPerfil($pdo,$_POST["id"]);
  ArmarRegistro::guardarPerfil($pdo,$_POST["id"],$_FILES);
  header("location:registros.php");

?>
