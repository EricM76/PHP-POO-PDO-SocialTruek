<?php
class Producto{
  //declaracion de atributos
  private $titulo;
  private $descripcion;
  private $valor;
  private $val_product;
  private $fecha_posteo;
  private $foto1;
  private $foto2;
  private $foto3;
  private $categoria_id;
  private $usuario_id;

  //funcion constructora
  public function __construct($titulo, $descripcion, $valor, $val_product, $fecha_posteo, $foto1, $foto2, $foto3, $categoria_id, $usuario_id){
      $this->titulo = $titulo;
      $this->descripcion = $descripcion;
      $this->valor = $valor;
      $this->val_product = $val_product;
      $this->fecha_posteo = $fecha_posteo;
      $this->foto1 = $foto1;
      $this->foto2 = $foto2;
      $this->foto3 = $foto3;
      $this->categoria_id = $categoria_id;
      $this->usuario_id = $usuario_id;
  }
//geters y seters
  public function getTitulo()  {
      return $this->titulo;
}

  public function setTitulo($titulo)  {
      $this->titulo = $titulo;

      return $this;
  }

  public function getDescripcion()  {
      return $this->descripcion;
  }

  public function setDescripcion($descripcion)  {
      $this->descripcion = $descripcion;

      return $this;
  }

  public function getValor()  {
      return $this->valor;
  }

  public function setValor($valor)  {
      $this->valor = $valor;

      return $this;
  }

  public function getVal_product()  {
      return $this->val_product;
  }

  public function setVal_product($val_product)  {
      $this->val_product = $val_product;

      return $this;
  }

  public function getFecha_posteo()  {
      return $this->fecha_posteo;
  }

  public function setFecha_posteo($fecha_posteo)  {
      $this->fecha_posteo = $fecha_posteo;

      return $this;
  }

  public function getFoto1()  {
      return $this->foto1;
  }

  public function setFoto1($foto1)  {
      $this->foto1 = $foto1;

      return $this;
  }

  public function getFoto2()  {
      return $this->foto2;
  }

  public function setFoto2($foto2)  {
      $this->foto2 = $foto2;

      return $this;
  }

  public function getFoto3()  {
      return $this->foto3;
  }

  public function setFoto3($foto3)  {
      $this->foto3 = $foto3;

      return $this;
  }

  public function getCategoria_id()  {
      return $this->categoria_id;
  }

  public function setCategoria_id($categoria_id)  {
      $this->categoria_id = $categoria_id;

      return $this;
  }

  public function getUsuario_id()  {
      return $this->usuario_id;
  }

  public function setUsuario_id($usuario_id)  {
      $this->usuario_id = $usuario_id;

      return $this;
  }
}

 ?>
