// Declarar array global que contendra la lista de categorias
//var arrCategories = []
showCategories()

//LLamar función de jquery para acción click del botón addElement

$("#addElement").click(function (e) {
	//Deshabilitar el envio por Http
	e.preventDefault()

	let idCategory = $("#category").val()
	let nameCategory = $("#category option:selected").text()

	if(idCategory != '') {
		if(typeof existCategory(idCategory) === 'undefined') {			
			//agregar categoria al array
			arrCategories.push({
				'id': idCategory,
				'name': nameCategory
			})
		} else {
			alert("La Categoría ya se Encuentra Seleccionada")
		}
		// Metodo para mostrar en Html el array de las categorias
		showCategories()
	} else {
		alert("Debe Seleccionar una Categoría")
	}
});

function existCategory(idCategory) {
	let existCategory = arrCategories.find(function (category) {
		return category.id == idCategory
	})
	return existCategory
}

function showCategories() {
	$("#list-categories").empty()

	arrCategories.forEach(function (category) {
		$("#list-categories").append('<div class="form-group"><button onclick="removeElement('+category.id+')" class="btn btn-danger">X</button><span>'+category.name+'</span></div>')
	})
}

function removeElement(idCategory) {
	let index = arrCategories.indexOf(existCategory(idCategory))
	arrCategories.splice(index, 1)
	showCategories()
	console.log(arrCategories)
}

//Generar el metodo de envio al backend

$("#submit").click(function (e) {
	//Deshabilitar el envio por Http
	e.preventDefault()

	let url = "?controller=movie&method=save"
	let params = {
		name: 			$("#name").val(),
		description: 	$("#description").val(),
		user_id: 		$("#user_id").val(),
		categories: 	arrCategories
	}

	//metodo post usando ajax para enviar la información al backend
	$.post(url, params, function (response) {
		//Respuesta del Request
		if(typeof response.error !== 'undefined') {
			alert(response.message)
		} else {
			alert("Inserción Satisfactoria")
			//redirección al modulo de listar peliculas
			location.href = "?controller=movie"
		}
	}, 'json').fail(function (error) {
		alert("Inserción Fallida ("+error.responseText+")")
		console.log(error)
	});
	
});

$("#update").click(function (e) {
	//Deshabilitar el envio por Http
	e.preventDefault()

	let url = "?controller=movie&method=update"
	let params = {		
		id: 			$("#id").val(),
		name: 			$("#name").val(),
		description: 	$("#description").val(),
		user_id: 		$("#user_id").val(),
		status_id: 		$("#status_id").val(),
		categories: 	arrCategories
	}

	//metodo post usando ajax para enviar la información al backend
	$.post(url, params, function (response) {
		//Respuesta del Request
		if(typeof response.error !== 'undefined') {
			alert(response.message)
		} else {
			alert("Actualización Satisfactoria")
			//redirección al modulo de listar peliculas
			location.href = "?controller=movie"
		}
	}, 'json').fail(function (error) {
		alert("Actualización Fallida ("+error.responseText+")")
		console.log(error)
	});
	
});