<?php
include("autoload.php");
if ($_POST) {
  $errores=[];
  $registro = BaseMySQL::buscarRegistro($pdo,'categorias','nombre',$_POST["categoria"]);

  if ($registro != null) {
    $errores[] = "La categoria ya existe";

  } else {
    $registro = ArmarRegistro::armarCategoria($_POST);
    BaseMySQL::guardarCategoria($pdo, $registro);
}
}
 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <?php include("head.php")?>
     <title></title>
   </head>
   <?php include("header.php")?>
   <body>
     <!-- Modal -->
     <div class="modal-body">
       <form class="" action="categoria.php" method="post">
         <div class="row d-flex justify-content-center">
           <div class="form-group col-4">
             <label class="control-label" for="categoria">Nueva Categoria</label>
             <div class="">
             <input id="categoria" name="categoria" type="text" placeholder="categoria" class="form-control input-md" required="true" autofocus>
             </div>
           </div>
         </div>
           <div class="modal-footer col-12 d-flex justify-content-center">
             <a href="index.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
             <button type="submit" class="btn btn-primary">Guardar</button>
           </div>
       </form>

     </div>
     <?php include("javascript.php") ?>
   </body>
 </html>
