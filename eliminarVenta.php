<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "db/database.php";


$sentencia1 = $conn->prepare("DELETE FROM productos_vendidos WHERE id_venta = ?;");
$resultado1 = $sentencia1->execute([$id]);
if($resultado === TRUE){
	header("Location: ./ventas.php");
	exit;
}else echo "Algo salió mal";

$sentencia = $conn->prepare("DELETE FROM ventas WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	header("Location: ./ventas.php");
	exit;
}
else echo "Algo salió mal";
?>