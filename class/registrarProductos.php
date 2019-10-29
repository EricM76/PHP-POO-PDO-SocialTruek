<?php
class RegistrarProductos {
//funcion que valida los datos ingresados por $_POST
  public function validarDatos($datos){
//array de errores
    $errores = [];
//validacion de errores
    if ($datos) :
      if (strlen($datos["titulo"])==0) {
        $errores[0] = "El campo 'titulo' se encuentra vacio";
      }
      if (strlen($datos["descripcion"])==0) {
        $errores[1] = "El campo 'descripcion' se encuentra vacio";
      }
      if (strlen($datos["valor"])==0) {
        $errores[2] = "El campo 'valor' se encuentra vacio";
      }
    endif;
//retorna el array de errores
    return $errores;
  }
//funcion para validar las fotos subidas por $_FILES
  public static function validarFotos($foto1,$foto2,$foto3){
//array de errores
    $errores = [];
//extrae el nombre y la extension de los archivos subidos
    $nomFoto1 = $foto1["name"];
    $extFoto1 = pathinfo($nomFoto1,PATHINFO_EXTENSION);
    $nomFoto2 = $foto2["name"];
    $extFoto2 = pathinfo($nomFoto2,PATHINFO_EXTENSION);
    $nomFoto3 = $foto3["name"];
    $extFoto3 = pathinfo($nomFoto3,PATHINFO_EXTENSION);
//verifica si se subió un archivo y si este tiene la extensión correcta
    if ($foto1['name'] == null){
      $errores[3] = "Tiene que subir una imagen";
      if ($extFoto1!=null && $extFoto1 != "jpg" && $extFoto1 != "jpeg" && $extFoto1 != "png") :
        $errores[3] = "La extension del archivo es incorrecto";
      endif;
        }
    if ($foto2['name'] == null){
      $errores[4] = "Tiene que subir una imagen";
      if ($extFoto2!=null && $extFoto2 != "jpg" && $extFoto2 != "jpeg" && $extFoto2 != "png") :
        $errores[4] = "La extension del archivo es incorrecto";
      endif;
        }
    if ($foto3['name'] == null){
      $errores[5] = "Tiene que subir una imagen";
      if ($extFoto3!=null && $extFoto3 != "jpg" && $extFoto3 != "jpeg" && $extFoto3 != "png") :
        $errores[5] = "La extension del archivo es incorrecto";
      endif;
        }
//devuelve el array de errores
      return $errores;
    }
//funcion para guardar las fotos
  public static function guardarFotos($foto){
    //extrae el nombre
    $nombre = $foto["name"];
    //extrae la extensión
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    //extrae el lugar temporal
    $archivoOrigen = $foto["tmp_name"];
    //determina la carpeta de destino
    $rutaDestino = dirname(__DIR__);
    //determina la carpeta final
    $rutaDestino = $rutaDestino."/images/productos/";
    //genera un nombre aleatorio
    $nombreImg = uniqid();
    //determina la carpeta y el archivo final
    $rutaDestino = $rutaDestino.$nombreImg.".".$ext;
    //genera una variable con el nombre final del archivos
    $imagen = $nombreImg.".".$ext;
    //guarda el archivo en la carpeta defininda
    move_uploaded_file ($archivoOrigen, $rutaDestino);
    //devuelve el nombre final de archivo para luego guardar el dato en la base de datos
    return $imagen;
  }

//funcion que crea una instancia de la clase  producto, para luego guardarlo en la base de datos
  public static function crearProducto($datos,$foto1,$foto2,$foto3){
    //crea una instancia de la clase producto con los datos que vienen por $_POST y $_FILES luego de verificarlos
    $producto = new Producto($datos['titulo'], $datos['descripcion'], $datos['valor'], null, date('Y-m-d H:i:s'), $foto1, $foto2, $foto3, $datos['categoria'], $datos['id']);
    //retorna la instancia de la clase producto
    return $producto;
  }
//funcion para guardar un nuevo registro en la tabla producto
  static public function guardarProducto($pdo, $producto){
      //genera la consulta sql
      $sql = "INSERT INTO productos VALUES(default, :titulo, :descripcion, :valor, :val_product=null, :fecha_posteo, :foto1, :foto2, :foto3, :categoria_id, :usuario_id)";
      //prepara la consulta
      $guardarProd = $pdo->prepare($sql);
      //bindea los datos
      $guardarProd->bindValue(':titulo', $producto->getTitulo());
      $guardarProd->bindValue(':descripcion', $producto->getDescripcion());
      $guardarProd->bindValue(':valor', $producto->getValor());
      $guardarProd->bindValue(':val_product', $producto->getVal_product());
      $guardarProd->bindValue(':fecha_posteo', $producto->getFecha_posteo());
      $guardarProd->bindValue(':foto1', $producto->getFoto1());
      $guardarProd->bindValue(':foto2', $producto->getFoto2());
      $guardarProd->bindValue(':foto3', $producto->getFoto3());
      $guardarProd->bindValue(':categoria_id', $producto->getCategoria_id());
      $guardarProd->bindValue(':usuario_id', $producto->getUsuario_id());
      //executa la consulta
      $guardarProd->execute();
  }
}

 ?>
