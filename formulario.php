<?php include_once "header.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php" id= "formulario_nuevo">
		<div class="mb-3">
			<label for="codigo" class = "from-label">Código de barras:</label>
			<input autocomplete="off" class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
			<div id='error_codigo' class = "form-text"></div>
		</div>

		<div class="mb-3">
			<label for="descripcion" class = "from-label">Descripción:</label>
			<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>
			<div id='error_descripcion' class = "from-label"></div>
		</div>

		<div class = "mb-3">
			<label for="precioVenta" class = "from-label">Precio de venta:</label>
			<input class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta">
			<div id='error_precioVenta' class = "from-label"></div>
		</div>
		<div class="mb-3">
		<label for="precioCompra" class = "from-label">Precio de compra:</label>
		<input class="form-control" name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra">
		<div id='error_precioCompra' class = "from-label"></div>
		</div>

		<div class="mb-3">
			<label for="existencia" class = "from-label">Existencias:</label>
			<input class="form-control" name="existencias" required type="number" id="existencias" placeholder="Cantidad o existencias">
			<div id='error_existencias' class = "from-label"></div>
		</div>
		<br><br><input class="btn btn-success" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "footer.php" ?>