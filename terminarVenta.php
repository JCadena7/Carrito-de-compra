<?php
if(!isset($_POST["total"])) exit;

session_start();

$total = $_POST["total"];
include_once "db/database.php";

//$now = date("Y-m-d H:i:s");
$now = date("d-m-Y"); //SQLsrv
$id_usuario = $_SESSION["user_id"];
$sentencia = $conn->prepare("INSERT INTO ventas(id_user,fecha, total) VALUES (?,convert(datetime,?), ?);");
$sentencia->execute([$id_usuario,$now, $total]);

$sentencia = $conn->prepare("SELECT TOP 1 id FROM ventas ORDER BY id DESC;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;

$conn->beginTransaction();
$sentencia = $conn->prepare("INSERT INTO productos_vendidos(id_producto, id_venta, cantidad) VALUES (?, ?, ?);");
$sentenciaExistencia = $conn->prepare("UPDATE productos SET existencias = existencias - ? WHERE id = ?;");


foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
    //insert a tabla productos_vendidos
	$sentencia->execute([$producto->id, $idVenta, $producto->cantidad]);
    //descuenta existencias
	$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
}
$conn->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vender.php?status=1");
?>