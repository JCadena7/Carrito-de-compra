const formulario_login = document.getElementById('formulario_login');
const inputs = document.querySelectorAll('#formulario_login input');
var error = document.getElementById('error');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos. 
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/

}
const validarFormulario = (e) => {
	var mensajeError =[];
    switch (e.target.name) {
		case "password":
			if(!expresiones.password.test(e.target.value)){
                mensajeError.push('contraseña no valida');
            }
		break;
		case "usuario":
			if(!expresiones.correo.test(e.target.value)){
                mensajeError.push('usuario no valido');
            }
		break;
	}
    error.innerHTML= mensajeError.join(' o ');
}
inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});