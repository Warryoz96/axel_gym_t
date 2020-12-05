// input de la fecha
$(() => {$("#dia").datepicker({ minDate: -0,  maxDate: "+1Y"});});
$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant',
 nextText: 'Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'yy/mm/dd',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
 $("#cliente").selectpicker();
$("#routine").selectpicker();


showRoutines();
// Declarar array global que contendra la lista de categorias
// var arrRoutines = []


//LLamar función de jquery para acción click del botón addElement

$("#addElement").click(function (e) {
	//Deshabilitar el envio por Http
	e.preventDefault()

	let idRoutine = $("#routine").val()
	let nameRoutine = $("#routine option:selected").text()
	let dia = $("#dia").val()


	if (idRoutine != "" && dia != "") {
		if (typeof existroutine(idRoutine) === 'undefined') {
			//agregar categoria al array
			arrRoutines.push({
				'id': idRoutine,
				'name': nameRoutine,
				'dia': dia
			})
		} else {
			Swal.fire("La rutina ya se encuentra seleccionada")
		}
		// Metodo para mostrar en Html el array de las categorias
		showRoutines()
	} else {
		Swal.fire("Debe seleccionar una rutina con el día")
	}
});

function existroutine(idRoutine) {
	let existroutine = arrRoutines.find(function (routine) {
		return routine.id == idRoutine
	})
	return existroutine
}

function showRoutines() {
	$("#list-Routines").empty()

	arrRoutines.forEach(function (routine) {
		$("#list-Routines").append(
			`<tr><td>${routine.name}</td> 
            <td>${routine.dia}</td> 
			<td> <button onclick="removeElement('${routine.id}')" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></button></td><tr>`)
	})
}

function removeElement(idRoutine) {
	let index = arrRoutines.indexOf(existroutine(idRoutine))
	arrRoutines.splice(index, 1)
	showRoutines()
	console.log(arrRoutines)
}

//Generar el metodo de envio al backend

$("#submit").click(function (e) {
	//Deshabilitar el envio por Http
	$("#objetivo").parsley().validate()
	$("#porcentaje_inicial").parsley().validate()
	$("#peso_inicial").parsley().validate()
	$("#cliente").parsley().validate()
	$("#nombre").parsley().validate()
	$("#dia").parsley().validate()
	if ($('#objetivo').parsley().isValid() &&  $('#dia').parsley().isValid() && $('#porcentaje_inicial').parsley().isValid() && $('#peso_inicial').parsley().isValid() && $('#cliente').parsley().isValid()
	 && $('#nombre').parsley().isValid() && $('#peso_final').parsley().isValid() && $('#porcentaje_final').parsley().isValid() ) {

		e.preventDefault();
		let url = "?controller=training&method=save"
		let params = {
			nombre: $("#nombre").val(),
			cliente: $("#cliente").val(),
			peso_inicial: $("#peso_inicial").val(),
			peso_final: $("#peso_final").val(),
			porcentaje_inicial: $("#porcentaje_inicial").val(),
			porcentaje_final: $("#porcentaje_final").val(),
			objetivo: $("#objetivo").val(),
			routines: arrRoutines
		}

		//metodo post usando ajax para enviar la información al backend
		$.post(url, params, function (response) {
			//Respuesta del Request
			if (typeof response.error !== 'undefined') {
				alert(response.message)
			} else {
				Swal.fire({
					title: 'Inserción satisfactoria',
					icon: 'success',
					confirmButtonText: 'ok',
					reverseButtons: true
				  }).then((result) => {
					if (result.isConfirmed) {
						location.href = "?controller=training"
			
					} else if (
					  /* Read more about handling dismissals below */
					  result.dismiss === Swal.DismissReason.cancel
					) {
					  swalWithBootstrapButtons.fire(
						'Cancelado',
					  )
					}
				  })			}
		}, 'json').fail(function (error) {
			Swal.fire("Inserción Fallida (" + error.responseText + ")")
			console.log(error)
		});


	}


});

$("#update").click(function (e) {
	//Deshabilitar el envio por Http
	$("#objetivo").parsley().validate()
	$("#porcentaje_inicial").parsley().validate()
	$("#peso_inicial").parsley().validate()
	$("#cliente").parsley().validate()
	$("#nombre").parsley().validate()
	$("#dia").parsley().validate()

	if ($('#objetivo').parsley().isValid() && $('#dia').parsley().isValid() && $('#porcentaje_inicial').parsley().isValid() && $('#peso_inicial').parsley().isValid() && $('#cliente').parsley().isValid()
	 && $('#nombre').parsley().isValid() && $('#peso_final').parsley().isValid() && $('#porcentaje_final').parsley().isValid() ) {
		e.preventDefault();

		let url = "?controller=training&method=update"
		let params = {
			plan_id: $("#plan").val(),
			nombre: $("#nombre").val(),
			cliente: $("#cliente").val(),
			peso_inicial: $("#peso_inicial").val(),
			peso_final: $("#peso_final").val(),
			porcentaje_inicial: $("#porcentaje_inicial").val(),
			porcentaje_final: $("#porcentaje_final").val(),
			objetivo: $("#objetivo").val(),
			routines: arrRoutines
		}

		//metodo post usando ajax para enviar la información al backend
		$.post(url, params, function (response) {
			//Respuesta del Request
			if (typeof response.error !== 'undefined') {
				Swal.fire(response.message)
			} else {
				Swal.fire({
					title: 'Actualizacíon satisfactoria',
					icon: 'danger',
					confirmButtonText: 'ok',
					reverseButtons: true
				  }).then((result) => {
					if (result.isConfirmed) {
						location.href = "?controller=training"
			
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
			alert("Actualización Fallida (" + error.responseText + ")")
			console.log(error)
		});

	}

});



// datepicker english to spanish 

