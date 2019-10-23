<?php

class BaseMySQL extends BaseDatos{
    static public function conexion($host,$db_nombre,$usuario,$password,$puerto,$charset){
        try {
            $dsn = "mysql:host=".$host.";"."dbname=".$db_nombre.";"."port=".$puerto.";"."charset=".$charset;
            $baseDatos = new PDO($dsn,$usuario,$password);
            $baseDatos->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $baseDatos;
        } catch (PDOException $errores) {
            echo "No me pude conectar a la BD ". $errores->getmessage();
            exit;
        }
    }

    static public function buscarPorEmail($email,$pdo,$tabla){
        $sql = "select * from $tabla where email = :email";
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }

    static public function guardarUsuario($pdo, $usuario){
        $sql = "INSERT INTO usuarios VALUES(default, :nombre, :apellido, :email, :pass, :fecha, :sexo, :avatar=null, :perfil=null, :val_user=null)";

        $guardarUsu = $pdo->prepare($sql);
        $guardarUsu->bindValue(':nombre', $usuario->getNombre());
        $guardarUsu->bindValue(':apellido', $usuario->getApellido());
        $guardarUsu->bindValue(':email', $usuario->getEmail());
        $guardarUsu->bindValue(':pass', $usuario->getPass());
        $guardarUsu->bindValue(':fecha', $usuario->getFecha());
        $guardarUsu->bindValue(':sexo', $usuario->getSexo());
        $guardarUsu->bindValue(':avatar', $usuario->getAvatar());
        $guardarUsu->bindValue(':perfil', $usuario->getPerfil());
        $guardarUsu->bindValue(':val_user', $usuario->getVal_user());

        $guardarUsu->execute();
    }

    public function leer(){
        //A futuro trabajaremos en esto
    }
    public function actualizar(){
        //A futuro trabajaremos en esto
    }
    public function borrar(){
        //A futuro trabajaremos en esto
    }
    public function guardar($usuario){
        //Este fue el método usao para json
    }

  static public function verRegistros(){
    $sql = "select * from usuarios order by id";
    $query = $pdo->prepare($sql);
    $query->execute();
    $registros = $query->fetch(PDO::FETCH_ASSOC);
    return $registros;

  }
}


 ?>
