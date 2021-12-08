function confirmaion(e) {
	if (confirmaion("¿Esras seguro que deseas Eliminar este registro?")) {
		return true;
	} else {
		e.preventDefault();
	}
}
let linkDelete =document.querySelectorAll(".delete");

for (var i = 0; i < linkDelete.length; i++) {
	linkDelete[i].addEventListener('click',confirmaion);
}