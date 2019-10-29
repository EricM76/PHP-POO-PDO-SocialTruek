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
         $id=$_GET["id"];
         //genera una consulta a la bd que devuelve el usuario correpondiente al id proporcionado
         $registro = BaseMySQL::verUsuario($pdo,$id);
         ?>
         <?php foreach ($registro as $dato): ?>
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

             <div class="col-7 text-left">
               <h5 class="mt-5"><?=$dato["id"];?></h5>
               <h5 class=""><?=$dato["nombre"]?></h5>
               <h5 class=""><?=$dato["apellido"]?></h5>
               <h5 class=""><?=$dato["email"]?></h5>
               <h5 class=""><?=$dato["pass"]?></h5>
               <h5 class=""><?=$dato["fecha"]?></h5>
               <h5 class=""><?=$dato["sexo"]?></h5>
               <h5 class=""><?=$dato["avatar"]?></h5>
               <h5 class=""><?=$dato["perfil"]?></h5>
               <h5 class=""><?=$dato["val_user"]?></h5>
             </div>

             <div class="col-3 mt-5 text-center">
               <h5>Avatar</h5>
               <img src="images/avatar/<?=$dato["avatar"]?>" alt="" width="100px">
               <br><br>
               <h5>Imagen de Perfil</h5>
               <img class="" src="images/perfil/<?=$dato["perfil"]?>" alt="" width="100px">

             </div>

           </div>

           <?php
         endforeach;
         ?>
   <div class="row">

     <div class="col-4 text-center mt-5">
       <?php if ($dato["id"]>1){?>
        <a href="perfil.php?id=<?=$dato["id"]-1?>">anterior</a>
       <?php }else {?>
        <a href="perfil.php?id=<?=$dato["id"]?>">anterior</a>
       <?php } ?>
       <a> ------ </a>
       <?php
       //genera una consulta que devuelve la cantidad de usuarios registrados
       $count = BaseMySQL::contarUsuarios($pdo);

       if ($dato["id"]<$count){
        ?>
         <a href="perfil.php?id=<?=$dato["id"]+1 ?>">siguiente</a>
       <?php }else{ ?>
         <a href="perfil.php?id=<?=$dato["id"]?>">siguiente</a>
       <?php } ?>
     </div>
     <div class="col-4">
       <a href="producto.php?id=<?=$dato["id"] ?>"><button class="btn-success" type="button" name="button">PUBLICAR</button> </a>
     </div>
   </div>


     <?php include("javascript.php") ?>
   </body>
 </html>
