<?php
include("autoload.php");


 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <?php include("head.php")?>
     <title>Nueva Publicacion</title>
   </head>
     <?php include("header.php") ?>
   <body>
     <div class="container">

      <form class="form-horizontal mt-5" action="producto.php" method="post">
        <div class="row">

        <div class="col-6">
          <!-- Text input-->
          <div class="form-group">
            <label class="control-label" for="titulo">Titulo</label>
            <div class="">
            <input id="titulo" name="titulo" type="text" placeholder="titulo" class="form-control input-md" required="">
            </div>
          </div>

        <div class="form-group">
          <label class="control-label" for="valor">Valor</label>
          <div class="">
          <input id="valor" name="valor" type="number" placeholder="valor en truekoins (1tk = $AR100)" class="form-control input-md" required="">
          </div>
        </div>

        <div class="form-group">
          <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria">
            <?php
            $categorias = BaseMySQL::verCategorias($pdo);
            foreach ($categorias as $categoria) :?>
            <option value=<?=$categoria["id"]?>>
              <?=$categoria["nombre"]?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

        <div class="col-6">
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea class="form-control" id="descripcion" rows="8" placeholder="descripcion detallada del producto a truekear"></textarea>
          </div>
        </div>
      </div>


      <!-- Button -->
      <div class="d-flex justify-content-end">
        <div class="form-group">
          <div class="">
            <a href="<?=$_SERVER["HTTP_REFERER"]?>"><button id="cancelar" name="cancelar" class="btn btn-danger">cancelar</button></a>
            <button id="publicar" name="publicar" class="btn btn-success">Publicar</button>
          </div>
        </div>
      </div>

    </div>
  </form>
     <?php include("javascript.php") ?>
   </body>
 </html>
