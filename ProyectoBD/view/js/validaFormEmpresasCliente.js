function validar(){
	var nombre = document.getElementById('nombre').value;
	var descripcion = document.getElementById('descripcion').value;
	var direccion = document.getElementById('direccion').value;
	var responsable = document.getElementById('responsable').value;

	if(nombre == ""){
		alert("Rellena el campo nombre");
		return false;
	}

	if(descripcion ==""){
		alert("Rellena el campo descripcion");
		return false;
	}

	if(direccion == ""){
		alert("Rellena el campo direccion");
		return false;
	}

	if(responsable == ""){
		alert("Rellena el campo responsable");
		return false;
	}
}