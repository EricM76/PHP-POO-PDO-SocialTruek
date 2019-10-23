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
       $sql = "SELECT * FROM usuarios";
       $query = $pdo->prepare($sql);
       $query->execute();
       $registros = $query->fetchAll(PDO::FETCH_ASSOC);
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
            <th scope="row"><?=$registro["id"]?></th>
            <td><?=$registro["nombre"]?></td>
            <td><?=$registro["apellido"]?></td>
            <td><?=$registro["email"]?></td>
            <td><?=$registro["pass"]?></td>
            <td><?=$registro["fecha"]?></td>
            <td><?=$registro["sexo"]?></td>
            <td><?=$registro["avatar"]?></td>
            <td><?=$registro["perfil"]?></td>
            <td><?=$registro["val_user"]?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
       </table>
     </div>
     <?php include("javascript.php") ?>
   </body>
 </html>
