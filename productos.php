<?php
include("autoload.php");
 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <?php include("head.php")?>
     <title>Productos</title>
   </head>
   <?php include("header.php") ?>
   <body class="">
     <div class="container-fluid mt-3">
       <?php
       $registros=BaseMySQL::verRegistros($pdo,'productos');
       ?>
       <table class="table table-
       light small">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">titulo</th>
            <th scope="col">descripcion</th>
            <th scope="col">valor</th>
            <th scope="col">categoria</th>
            <th scope="col">fecha</th>
            <th scope="col">foto1</th>
            <th scope="col">foto2</th>
            <th scope="col">foto3</th>
            <th scope="col">valoracion</th>
            <th scope="col">usuario</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($registros as $registro): ?>
        <tr>
          <th scope="row"><?=$registro["id"]?></a></th>
          <td><?=$registro["titulo"]?></td>
          <td><?=$registro["descripcion"]?></td>
          <td><?=$registro["valor"]?></td>
          <td><?=$registro["categoria_id"]?></td>
          <td><?=$registro["fecha_posteo"]?></td>
          <td><?=$registro["foto1"]?></td>
          <td><?=$registro["foto2"]?></td>
          <td><?=$registro["foto3"]?></td>
          <td><?=$registro["val_product"]?></td>
          <td><?=$registro["usuario_id"]?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
     </table>
     </div>
     <?php include("javascript.php") ?>
   </body>
 </html>
