<?php
include("autoload.php");
 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <?php include("head.php")?>
     <title>Registros</title>
   </head>
   <?php include("header.php") ?>
   <body class="">
   <div class="container-fluid mt-3">
     <?php
     $registros=BaseMySQL::verRegistros($pdo,'usuarios');
     ?>
     <table class="table table-
     light small">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">nombre</th>
          <th scope="col">apellido</th>
          <th scope="col">email</th>
          <th scope="col">pass</th>
          <th scope="col">fecha</th>
          <th scope="col">sexo</th>
          <th scope="col">avatar</th>
          <th scope="col">perfil</th>
          <th scope="col">valoracion</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($registros as $registro): ?>
      <tr>
        <th scope="row"><a href="perfil.php?id=<?=$registro["id"]?>"><?=$registro["id"]?></a></th>
        <td><?=$registro["nombre"]?></td>
        <td><?=$registro["apellido"]?></td>
        <td><?=$registro["email"]?></td>
        <td><?=$registro["pass"]?></td>
        <td><?=$registro["fecha"]?></td>
        <td><?=$registro["sexo"]?></td>
        <td>
        <?php
          if ($registro["avatar"]!=null) {
            ?>
            <a href="registros.php?id=<?=$registro["id"]?>"><?=$registro["avatar"]?></a>
            <?php
          }else {?>
            <a href="registros.php?id=<?=$registro["id"]?>">agregar</a>

        <?php } ?>
        </td>

        <td>
        <?php
        if ($registro["perfil"]!=null) {
          ?>
          <a href="registros.php?id=<?=$registro["id"]?>"><?=$registro["perfil"]?></a>
          <?php
        }else {?>
          <a href="registros.php?id=<?=$registro["id"]?>">agregar</a>
        <?php } ?>
        </td>

        <td><?=$registro["val_user"]?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
   </table>
   </div>


   <?php
   //codigo de la ventana emergente que permite seleccionar la imagen de avatar o subir la imagen de perfil
   include_once("editarAvatar.php");
   //codigo para habilitar el uso de javascript
   include_once("javascript.php");
   ?>
   <!-- si la pagina vuelve a cargarse recibe el id por $_GET -->
   <?php if (isset($_GET["id"])): ?>
    <!-- funcion en javascript que permite recibir un dato por $_GET y volver a cargar la pagina y abrir una ventana emergente -->
     <script type="text/javascript">
      $(function(){
       $("#avatar").modal();
      });
     </script>
   <?php endif; ?>


   </body>
 </html>
