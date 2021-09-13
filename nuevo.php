<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["codigo"]) || !isset($_POST["descripcion"]) || !isset($_POST["precioVenta"]) || !isset($_POST["precioCompra"]) || !isset($_POST["existencias"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "db/database.php";
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precioVenta = $_POST["precioVenta"];
$precioCompra = $_POST["precioCompra"];
$existencias = $_POST["existencias"];

$sentencia1 = $conn->prepare("SELECT * FROM productos WHERE codigo =?;");
$resultado1 = $sentencia1->execute([$codigo]);
if($resultado1 === TRUE){
	echo "El codigo ya existe";
	exit;
}


$sentencia = $conn->prepare("INSERT INTO productos(codigo, descripcion, precioVenta, precioCompra, existencias) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$codigo, $descripcion, $precioVenta, $precioCompra, $existencias]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";
?>
<?php include_once "footer.php" ?>