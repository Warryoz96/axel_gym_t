

$("#instructor").selectpicker();



$(document).on("click", ".btnEditar", function () {
	//Recojo los datos de la tabla        
	fila = $(this).closest("tr");
	// 1.recojo id de la tabla         
	hora_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            

	url = '?controller=schedule&method=edit';

	$.post(url, { hora_id: hora_id }, function (response) {

		let data = JSON.parse(response)
		//Asigno los datos a los campos del formulario editar
		$("#hora_id").val(data.hora_id);
		$("#dia").val(data.dia);
		$("#hora_inicial").val(data.hora_inicio);
		$("#hora_final").val(data.hora_final);
		$("#clase_id").val(data.clase_id);
		$("#usua_id").val(data.usua_id);
	});
});


$(".delete").click(function (e) {
	var url = this.href;
	e.preventDefault();


	Swal.fire({
		title: 'Estas seguro de borrar este horario?',
		icon: 'danger',
		showCancelButton: true,
		confirmButtonText: 'Si, borrar',
		cancelButtonText: 'Cancelar',
		reverseButtons: true
	}).then((result) => {
		if (result.isConfirmed) {
			location.href = url

		} else if (
			/* Read more about handling dismissals below */
			result.dismiss === Swal.DismissReason.cancel
		) {
			swalWithBootstrapButtons.fire(
				'Cancelado',
			)
		}
	})
})

$("#dia").datepicker({ minDate: 0, maxDate: "+1Y" })




$.datepicker.regional['es'] = {
	closeText: 'Cerrar',
	prevText: '< Ant',
	nextText: 'Sig >',
	currentText: 'Hoy',
	monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
	dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
	dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
	weekHeader: 'Sm',
	dateFormat: 'yy/mm/dd',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);



$("#newTimeButton").click(function (e) {
	//Deshabilitar el envio por Http
	$('#dia').parsley().validate()
	$('#instructor').parsley().validate()
	$('#class').parsley().validate()
	$('#inicio').parsley().validate()
	$('#fin').parsley().validate()
	if ($('#dia').parsley().isValid() && $('#instructor').parsley().isValid() && $('#class').parsley().isValid() &&
		$('#inicio').parsley().isValid() && $('#fin').parsley().isValid()) {
		e.preventDefault();
		let url = "?controller=clase&method=checkTime";

		var form = {
			"dia": $('#dia').val(),
			"clase": $('#class').val(),
			"usua_id": $('#instructor').val(),
			"inicio": $('#inicio').val(),
			"fin": $("#fin").val()
		}
		$.post({
			url: url,
			type: 'POST',
			data: form,
			success: function (res) {
				if (res == "true") {
					$.post('?controller=schedule&method=saveSchedule', form, (res) => {
						if (res == "true") {
							Swal.fire({
								title: 'Inserción exitosa',
								icon: 'danger',
								confirmButtonText: 'Si, activar',
								reverseButtons: true
							}).then((result) => {
								if (result.isConfirmed) {
									location.href = "?controller=home"

								}
							})
						}
					})
				} else {
					Swal.fire("Este instructor ya tiene un horario asignado en esa fecha")
				}

			}

		});
	}
});
