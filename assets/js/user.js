


let role = document.querySelector('.r')
let resultado = document.getElementById('plan')

role.addEventListener('change', (event) => {

	if (role.value === "2") {
		resultado.innerHTML = `
		<div class="form group col-md-12 mb-2">
		<h5>Inscripción Gimnasio:</h5>
	</div>
   
	<div class="form group col-md-6">
		<label for="fecha_inicial" >Duración</label>
		<select class="custom-select du" data-parsley-required required id="fi" >

		<option class="inputSelect" value="">Seleccionar...</option>
		<option class="inputSelect" value="1">1 mes</option>
		<option class="inputSelect" value="2">2 meses</option>
		<option class="inputSelect" value="3">4 meses</option>
		<option class="inputSelect" value="4">6 meses</option>
		<option class="inputSelect" value="5">1 año</option>
	</select>
	</div>
	<div class="form group col-md-6">	
		<label>Fecha inicial </label> 
		<input type="date" name="fecha_inicial" readonly  id="f_ini"  required class="form-control">
                            
		<label>Fecha final </label> 
		<input type="date" name="fecha_final" readonly id="f_fin"   required class="form-control">
                            

	</div>
	
	
	`
		date();
	} else {
		resultado.innerHTML = ` `;
	}
});

$(document).on("click", ".btnEditar", function () {
	//Recojo los datos de la tabla        
	id = $(this).val();
	url = "?controller=user&method=edit";

	$.post(url, { usuario_id: id }, function (response) {
		let user = JSON.parse(response);
		$("#usuario_id").val(user.usuario_id)
		$("#nombre").val(user.nombre)
		$("#apellido").val(user.apellido)
		$("#cedula").val(user.cedula)
		$("#correo").val(user.correo)
		$("#telefono").val(user.telefono)
	});


});
$(document).ready(function () {

	let correo = $("#email");
	let cedula = $("#newcedula");

	$('#new').parsley();
	$('#editU').parsley();

	window.Parsley.addValidator('checkcedula', {
		validateString: function (value) {
			url = "?controller=user&method=DuplicateEntriesCedula";
			let x = $.ajax({ url,type: "POST", async: false, data: { cedula: value } }).responseText;
			
			return (x == "false")? false: true 
		},
		messages: { es: "El numero de cedula indicado ya esta registrado" }
	});

	Parsley.addValidator('checkemail', {
		validateString: function (value) {
			url = "?controller=user&method=DuplicateEntriesEmail";
			let x = $.ajax({
				url,
				type: "POST",
				async: false,
				data: { email: value }
			}).responseText;
			if (x == "false") {
				return false;
			} else if (x == "true") {
				return true;
			}
		},
		messages: { es: "El correo electronico ya esta en uso" }
	});
});
$(".delete").click(function (e) {
	let url = this.href;
	e.preventDefault();


	Swal.fire({
		title: 'Estas seguro de inactivar este usuario?',
		icon: 'danger',
		showCancelButton: true,
		confirmButtonText: 'Si, inactivelo',
		cancelButtonText: 'Cancelar!',
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

$(".active").click(function (e) {
	let url = this.href;
	e.preventDefault();


	Swal.fire({
		title: 'Estas seguro de activar este usuario?',
		text: "Si lo hace el usuario tendra acceso al sistema",
		icon: 'danger',
		showCancelButton: true,
		confirmButtonText: 'Si, activar',
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

const date = () => { 

	let f_ini = $('#f_ini');
		let f_fin = $('#f_fin');
		let subs = document.querySelector('.du')
		subs.addEventListener('change', (event) => {
			let date = new Date();
			let day = date.getDate();
			let month = date.getMonth() + 1;
			let year = date.getFullYear();
			let today = `${year}-${month}-${day < 10 ? "0" + day : day}`;
			let fin;
			let y = subs.value
			let m = mr(y, month);
			f_ini.val(today)
			if (m > 12) {
				fin = `${year+1}-0${m-12}-${(day < 10 ? "0" + (day + 1) : (day + 1))}`;
			}
			else {
				fin = `${y == "5" ? (year+1) : year}-${m}-${((day < 10 ? "0" + (day + 1) : (day + 1)))}`;
			}
			f_fin.val(fin);
		})
}

const mr = (y,month) => {
	switch(y){
		case '1':  
		m = month+1
		break;
		case '2':  
		m = month+2
		break;
		case '3':  
		m = month+4
		break;
		case '4':  
		m = month+6
		break;
		case '5':  
			m = month;
		break;
		case '':  
		f_ini.val("")
	break;
	}
	return m;
}