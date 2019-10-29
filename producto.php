<?php
include("autoload.php");

if ($_GET) {
  //genera una variable con el id del usuario recibido por $_GET
  $id=$_GET['id'];
}

if ($_POST) {
  //genera una variable con el id del usuario recibido por $_POST
  $id=$_POST['id'];
  //valida los datos recibidos por $_POST
  $errores = $validadorProducto->validarDatos($_POST);
  //si no hay errores continúa la registración
  if (count($errores) == 0) {

    $errores = $validadorProducto->validarFotos($_FILES["imagen1"],$_FILES["imagen2"],$_FILES["imagen3"]);
      if (count($errores) == 0) {
        //guarda las fotos subidas
        $foto1 = RegistrarProductos::guardarFotos($_FILES["imagen1"]);
        $foto2 = RegistrarProductos::guardarFotos($_FILES["imagen2"]);
        $foto3 = RegistrarProductos::guardarFotos($_FILES["imagen3"]);
        //genera una instancia de productos enviando los datos y las imagenes
        $producto = RegistrarProductos::crearProducto($_POST,$foto1,$foto2,$foto3);
        RegistrarProductos::guardarProducto($pdo, $producto);

      }else{
        //devuelve los errores de la carga de fotos
        var_dump($errores);
      }

    }else{
      //devuelve los errores de la carga de datos
      var_dump($errores);
    }

}
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

      <form class="form-horizontal mt-5" action="producto.php" method="post" enctype="multipart/form-data">
        <div class="row">

        <div class="col-6">
          <div class="form-group">
            <label class="control-label" for="titulo">Titulo</label>
            <div class="">
            <input id="titulo" name="titulo" type="text" placeholder="titulo" class="form-control input-md" >
            </div>
          </div>

        <div class="form-group">
          <label class="control-label" for="valor">Valor</label>
          <div class="">
          <input id="valor" name="valor" type="number" placeholder="valor en truekoins (1tk = $AR100)" class="form-control input-md" >
          </div>
        </div>

        <div class="form-group">
          <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria">
            <?php
            $categorias = BaseMySQL::verCategorias($pdo);
            foreach ($categorias as $categoria) :?>
            <option value=<?=$categoria["id"]?>>
              <?=$categoria["nombre"]?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="custom-file">
          <label class="" for="imagen">Subir 3 fotos del producto (formato jpg/png)</label><br>
          <label for="">Foto 1: </label>
          <input type="file" class="" id="imagen" name="imagen1"><br>
          <label for="">Foto 2: </label>
          <input type="file" class="" id="imagen" name="imagen2"><br>
          <label for="">Foto 3: </label>
          <input type="file" class="" id="imagen" name="imagen3"><br>
        </div>

      </div>

        <div class="col-6">
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea class="form-control" name="descripcion" rows="8" placeholder="descripcion detallada del producto a truekear" ></textarea>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end">
        <div class="form-group">
          <div class="">
            <a href="<?=$_SERVER["HTTP_REFERER"]?>"><button id="cancelar" name="cancelar" class="btn btn-danger">cancelar</button></a>
            <button value=<?=$id?> name=id class="btn btn-success">Publicar</button>
          </div>
        </div>
      </div>

    </div>
  </form>
     <?php include("javascript.php") ?>
   </body>
 </html>
