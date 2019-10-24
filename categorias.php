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
     <div class="container-fluid mt-3 col-6">
       <?php
       $sql = "SELECT * FROM categorias";
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
          </tr>
        </thead>
        <tbody>
          <?php foreach ($registros as $registro): ?>
          <tr>
            <th scope="row"><?=$registro["id"]?></th>
            <td><?=$registro["nombre"]?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
       </table>
     </div>
     <?php include("javascript.php") ?>
   </body>
 </html>
