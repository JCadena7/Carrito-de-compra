<?php include_once "header.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php" id= "formulario_nuevo">
		<label for="codigo">Código de barras:</label>
		<input autocomplete="off" class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
		<div id='error_codigo'></div>

		<label for="descripcion">Descripción:</label>
		<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>
		<div id='error_descripcion'></div>

		<label for="precioVenta">Precio de venta:</label>
		<input class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta">
		<div id='error_precioVenta'></div>

		<label for="precioCompra">Precio de compra:</label>
		<input class="form-control" name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra">
		<div id='error_precioCompra'></div>

		<label for="existencia">Existencias:</label>
		<input class="form-control" name="existencias" required type="number" id="existencias" placeholder="Cantidad o existencias">
		<div id='error_existencias'></div>
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "footer.php" ?>