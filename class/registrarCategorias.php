<?php
class RegistrarCategorias{

  public static function crearCategoria($datos){

    $categoria = new Categoria($datos["categoria"]);

    return $categoria;
  }

  static public function guardarCategoria($pdo, $categoria){
      $sql = "INSERT INTO categorias VALUES(default, :nombre)";

      $guardarCat = $pdo->prepare($sql);
      $guardarCat->bindValue(':nombre', $categoria->getNombre());
      $guardarCat->execute();
  }

}

 ?>
