// Declarar array global que contendra la lista de categorias
// var arrExercises = []
$("#ejercicio").selectpicker();
showExercises()


//LLamar función de jquery para acción click del botón addElement

$("#addElement").click(function (e) {
	//Deshabilitar el envio por Http
	e.preventDefault()

	let idExercise = $("#ejercicio").val()
    let nameEjercicio = $("#ejercicio option:selected").text()
    let series = $("#series").val()
    let reps = $("#repeticiones").val()

	if(idExercise != '' && series !='' && reps !='') {
		if(typeof existExercise(idExercise) === 'undefined') {			
			//agregar categoria al array
			arrExercises.push({
				'id': idExercise,
                'name':nameEjercicio,
                'series':series,
                'reps': reps
			})
		} else {
			Swal.fire("El  Ejercicio ya se Encuentra Seleccionado")
		}
		// Metodo para mostrar en Html el array de las categorias
		showExercises()
	} else {
		Swal.fire("Debe Seleccionar un ejercicio con las series y repeticiones")
	}
});

function existExercise(idExercise) {
	let existExercise= arrExercises.find(function (exercise) {
		return exercise.id == idExercise
	})
	return existExercise
}

function showExercises() {
	$("#list-exercises").empty()

	arrExercises.forEach(function (exercise) {
		$("#list-exercises").append(
		
			`<tr><td>${exercise.name}</td> 
			<td>${exercise.series}</td>
			<td>${exercise.reps}</td>
			<td> <button onclick="removeElement('${exercise.id}')" class="btn btn-danger btn-sm "><i class="fa fa-minus"></i></button></td><tr>`)
	})
}

function removeElement(idExercise) {
	let index = arrExercises.indexOf(existExercise(idExercise))
	arrExercises.splice(index, 1)
	showExercises()
	console.log(arrExercises)
}

//Generar el metodo de envio al backend

$("#submit").click(function (e) {
	//Deshabilitar el envio por Http
	
	$("#nombre").parsley().validate()
	$("#series").parsley().validate()
	$("#repeticiones").parsley().validate()
	let url = "?controller=routine&method=save"
	let params = {
        nombre: 	$("#nombre").val(),
		exercises: arrExercises
	}
	if($("#nombre").parsley().isValid()){
			//metodo post usando ajax para enviar la información al backend
	$.post(url, params, function (response) {
		//Respuesta del Request
		if(typeof response.error !== 'undefined') {
			alert(response.message+ response.nombre)
		} else {
			alert("Inserción Satisfactoria")
			//redirección al modulo de listar peliculas
			location.href = "?controller=routine"
		}
	}, 'json').fail(function (error) {
		alert("Inserción Fallida ("+error.responseText+")")
		console.log(error)
	});
	}

	
});




$("#update").click(function (e) {
	//Deshabilitar el envio por Http
	$("#nombre").parsley().validate()
	$("#series").parsley().validate()
	$("#repeticiones").parsley().validate()
	if($("#nombre").parsley().isValid()){
		e.preventDefault()

	let url = "?controller=routine&method=update"
	let params = {
		rutina_id : $("#id").val(),
        nombre: 	$("#nombre").val(),
		exercises: arrExercises
	}

	//metodo post usando ajax para enviar la información al backend
	$.post(url, params, function (response) {
		//Respuesta del Request
		if(typeof response.error !== 'undefined') {
			Swal.fire(response.message+ response.nombre)
		} else {
	
			  
			  Swal.fire({
				title: 'Actualizacíon satisfactoria',
				icon: 'danger',
				confirmButtonText: 'ok',
				reverseButtons: true
			  }).then((result) => {
				if (result.isConfirmed) {
					location.href = "?controller=routine"
		
				} else if (
				  /* Read more about handling dismissals below */
				  result.dismiss === Swal.DismissReason.cancel
				) {
				  swalWithBootstrapButtons.fire(
					'Cancelado',
				  )
				}
			  })

		}
	}, 'json').fail(function (error) {
		Swal.fire("Actualizacion Fallida ("+error.responseText+")")
		console.log(error)
	});
	
	}
	
});

$(".swal2-confirm swal2-styled").click(function (e) {
	location.href = "?controller=routine"
})



