<?php
include("autoload.php");

 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <?php include("head.php")?>
     <title>Nuevo Registro</title>
   </head>
     <?php include("header.php") ?>
   <body>

         <?php
         $dato=$_GET["id"];
         $sql = "SELECT * FROM usuarios WHERE id LIKE '$dato'";
         $query = $pdo->prepare($sql);
         $query->execute();
         $registros = $query->fetchAll(PDO::FETCH_ASSOC);
         ?>
         <?php foreach ($registros as $registro): ?>
           <div class="row">
            <div class="col-2 text-right">
               <h5 class="mt-5">id:</h5>
               <h5 class="">nombre:</h5>
               <h5 class="">apellido:</h5>
               <h5 class="">email:</h5>
               <h5 class="">pass:</h5>
               <h5 class="">fecha:</h5>
               <h5 class="">sexo:</h5>
               <h5 class="">avatar:</h5>
               <h5 class="">perfil:</h5>
               <h5 class="">valoracion:</h5>
             </div>

             <div class="col-10 text-left">
               <h5 class="mt-5"><?=$registro["id"];?></h5>
               <h5 class=""><?=$registro["nombre"]?></h5>
               <h5 class=""><?=$registro["apellido"]?></h5>
               <h5 class=""><?=$registro["email"]?></h5>
               <h5 class=""><?=$registro["pass"]?></h5>
               <h5 class=""><?=$registro["fecha"]?></h5>
               <h5 class=""><?=$registro["sexo"]?></h5>
               <h5 class=""><?=$registro["avatar"]?></h5>
               <h5 class=""><?=$registro["perfil"]?></h5>
               <h5 class=""><?=$registro["val_user"]?></h5>
             </div>
           </div>
           <?php
         endforeach;
         ?>
         <div class="col-4 text-center mt-5">

         <?php if ($registro["id"]>1){?>
          <a href="perfil.php?id=<?=$registro["id"]-1?>">anterior</a>
         <?php }else {?>
          <a href="perfil.php?id=<?=$registro["id"]?>">anterior</a>
         <?php } ?>
         <a> ------ </a>
         <?php
         $sql = "SELECT count(*) AS count FROM usuarios";
         $query = $pdo->prepare($sql);
         $query->execute();
         $contador = $query->fetch(PDO::FETCH_ASSOC);
         $count = $contador["count"];
         if ($registro["id"]<$count){
          ?>
           <a href="perfil.php?id=<?=$registro["id"]+1 ?>">siguiente</a>
         <?php }else{ ?>
           <a href="perfil.php?id=<?=$registro["id"]?>">siguiente</a>
         <?php } ?>
     </div>


     <?php include("javascript.php") ?>
   </body>
 </html>
