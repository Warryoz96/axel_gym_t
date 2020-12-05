$(document).on("click", ".btnEditar", function(){		
	//Recojo los datos de la tabla        
    fila = $(this).closest("tr");	        
    musculo_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    nombre = fila.find('td:eq(1)').text();
	
//Asigno los datos a los campos del formulario editar

	let a = $("#musculo_id").val(musculo_id);
    let b = $("#nombre").val(nombre);
	
});
$(document).ready(function () {

	let nombre = $("#name");

	$('#name').parsley();
	nombre.parsley();
	window.Parsley.addValidator('checkname', {
		validateString: function (value) {
			url = "?controller=muscle&method=checkName";
			let x = $.ajax({
				url,
				type: "POST",
				async: false,
				data: { nombre: value }
			}).responseText;
			if (x == "false") {
				return false;
			} else if (x == "true") {
				return true;
			}
		},
		messages: { es: "El numero de cedula indicado ya esta registrado" }
	});
});


$(".delete").click(function(e){
	var url  = this.href;
	e.preventDefault();
	
	  
	  Swal.fire({
        title: 'Estas seguro de eliminar?',
        text: "Si lo hace se eliminara de los ejercicios a los que este asignados",
		icon: 'danger',
		showCancelButton: true,
		confirmButtonText: 'Si, borrar',
		cancelButtonText: 'Cancelar',
		reverseButtons: true
	  }).then((result) => {
		if (result.isConfirmed) {
			$.get(url,function(res){
				if(res =="true"){
					Swal.fire( {title: 'Musculo eliminado correctamente',
					icon: 'success',
					confirmButtonText: 'Ok',
					reverseButtons: true}).then((result)=>{
						if(result.isConfirmed){
							location.href = "?controller=muscle";
						}
					})
				}else{
					Swal.fire({title:"No se puede eliminar este musculo", text: "el musculo se encuentra relacionado con los ejercicios" })
				}
			})

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