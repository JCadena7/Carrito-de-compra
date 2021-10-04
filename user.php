<?php include_once "header_user.php"?>
<?php
include_once "db/database.php";
$sentencia = $conn->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Productos</h1>
		<br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>imagen</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio de venta</th>
					<th>Existencia</th>
					<th>Carrito</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td> <img src="img/<?php echo $producto->id ?>.jpg" alt=""></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->existencias ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id?>">Agregar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "footer.php" ?>