<?php include_once "header_user.php" ?>
<?php
session_start();
include_once "db/database.php";
$id_usuario = $_SESSION["user_id"];
$sentencia = $conn->prepare("Select ventas.id, usuarios.usuario,ventas.fecha,ventas.total from ventas,usuarios where ventas.id_user = ? AND ventas.id_user=usuarios.id;");
$sentencia->execute([$id_usuario]);
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Ventas</h1>
		<div>
			<a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Número</th>
                    <th>Usuario</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($ventas as $venta){ ?>
                <tr>
                    <td><?php echo $venta->id ?></td>
                    <td><?php echo $venta->usuario ?></td>
                    <td><?php $porciones = explode(" ", $venta->fecha); echo $porciones[0] ?></td>
                    <td> 
                    <?php 
                        $sentencia2 = $conn->prepare("select productos.codigo, productos.descripcion,productos_vendidos.cantidad  from ventas,productos_vendidos, productos where ventas.id = ? AND productos_vendidos.id_venta= ventas.id AND productos_vendidos.id_producto= productos.id;");
                        $sentencia2->execute([$venta->id]);
                        $producto2 = $sentencia2->fetchAll(PDO::FETCH_OBJ);
                    ?>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($producto2 as $prod){?>
                                        <tr>
                                            <th><?php echo $prod->codigo?></th>
                                            <th><?php echo $prod->descripcion?></th>
                                            <th><?php echo $prod->cantidad?></th>
                                        </tr>
                                <?php }?>
                            </tbody>
                            
                        </table>
                        
                    </td>
                    <td><?php echo $venta->total ?></td>
                     <td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id?>" onclick="return confirmarDelete()">Eliminar</a></td>
                </tr>
            <?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "footer.php" ?>