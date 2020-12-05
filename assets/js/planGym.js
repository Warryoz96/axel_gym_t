$(document).on("click", ".btnEditar", function(){
    //Recojo los datos de la tabla
    fila = $(this).closest("tr");
    detalle_plan_gym_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID
    fecha_inicial = fila.find('td:eq(1)').text();
    fecha_final = fila.find('td:eq(2)').text();
    
    //Asigno los datos a los campos del formulario editar
    $("#detalle_plan_id").val(detalle_plan_gym_id);
    $("#fecha_inicial").val(fecha_inicial);
	$("#fecha_final").val(fecha_final);
	

});


$(".delete").click(function(e){
	var url  = this.href;
	e.preventDefault();
	
	  
	  Swal.fire({
        title: 'Estas seguro de borrar este plan?',
        text: "si lo hace es posible que el usuario no pueda acceder al sistema",
		icon: 'danger',
		showCancelButton: true,
		confirmButtonText: 'Si, Borrar',
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
