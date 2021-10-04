const formulario_nuevo = document.getElementById('formulario_nuevo');
const inputs2 = document.querySelectorAll('#formulario_nuevo input');
var error_codigo = document.getElementById('error_codigo');
var error_descripcion = document.getElementById('error_descripcion');
var error_precioVenta = document.getElementById('error_precioVenta');
var error_precioCompra = document.getElementById('error_precioCompra');
var error_existencias = document.getElementById('error_existencias');
const expresiones = {
	codigo: /^\d{4,14}$/, // 7 a 14 numeros.
	descripcion: /^[a-zA-ZÀ-ÿ\s]{1,100}$/, // Letras y espacios, pueden llevar acentos.
	cantidad: /^\d{1,5}$/, // 4 a 12 numeros. 
}
const validarFormulario = (e) => {
	error_codigo.innerHTML='';
	error_descripcion.innerHTML='';
	error_precioCompra.innerHTML='';
	error_precioVenta.innerHTML='';
	error_existencias.innerHTML='';

    switch (e.target.name) {
		case "codigo":
			if(!expresiones.codigo.test(e.target.value)){
                error_codigo.innerHTML= " codigo no valido";
            }
		break;
		case "descripcion":
			if(!expresiones.descripcion.test(e.target.value)){
                error_descripcion.innerHTML='descripción no valido';
            }
		break;
		case "precioVenta" :
			if(!expresiones.codigo.test(e.target.value)){
                error_precioVenta.innerHTML='precio venta no valido';
            }
		break;
		case "precioCompra":
			if(!expresiones.codigo.test(e.target.value)){
                error_precioCompra.innerHTML='precio compra no valido';
            }
		break;
		case "existencias":
			if(!expresiones.cantidad.test(e.target.value)){
                error_existencias.innerHTML='existencias no valido';
            }
		break;
	}
}
inputs2.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});


function alertaSubmit(){
	var respuesta = confirm('Esta seguro de modificar el producto?');
	if(respuesta == true ){
		console.log('true submit si');
		return true;
	}else{
		console.log('false')
		return false;
	}
}
function confirmarDelete(){
	var respuesta = confirm('Esta seguro de eliminar la venta?');
	if(respuesta == true ){
		return true;
	}else{
		return false;
	}
}

function confirmarCancelar(){
	var respuesta = confirm('Esta seguro que desea cancelar la venta?');
	if(respuesta == true ){
		return true;
	}else{
		return false;
	}
}
function confirmBorrar(){
	var respuesta = confirm('Se borrara el producto del carrito, Esta seguro?');
	if(respuesta == true ){
		return true;
	}else{
		return false;
	}
}
