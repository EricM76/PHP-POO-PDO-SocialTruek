<?php
session_start();

require_once("class/baseDeDatos.php");
require_once("class/armarRegistro.php");
require_once("class/autenticacion.php");
require_once("class/baseMySQL.php");
require_once("class/producto.php");
require_once("class/usuario.php");
require_once("class/validacion.php");


$host = "localhost";
$bd = "socialtruek";
$usuario = "root";
$password = "";
$puerto = "3306";
$charset = "utf8mb4";

$pdo = BaseMySQL::conexion($host,$bd,$usuario,$password,$puerto,$charset);

$validador = new Validacion();
 ?>
