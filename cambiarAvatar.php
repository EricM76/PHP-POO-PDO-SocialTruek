<?php
include_once("autoload.php");
if (isset($_GET["avatar"])) {
  $avatar=$_GET["avatar"];
  $id=$_GET["id"];
  $sql = "UPDATE usuarios SET avatar ='$avatar' WHERE id ='$id'";
  $query = $pdo->prepare($sql);
  $query->execute();
  header("location:registros.php");
}
varDump($_GET);
?>
